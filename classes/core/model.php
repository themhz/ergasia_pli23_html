<?php

//Μια κλάση που έχω φτιάξει για να μπορώ να διαχειριστώ την sql.
class Model
{

    protected $__tablename;
    
    public function __construct(string $tablename)
    {
        $this->__tablename = $tablename;        
    }

    public function loadData($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                if (isset($value)) {
                    $this->{$key} = $value;                    
                }
            }
        }
    }

    //Η μέθοδος αυτή χρησιμποιητε για να κάνω select
    //Η παράμετρος είναι για να κάνω το where ποιο δυναμικό.. το order για να κάνει ταξινόμιση και το debug για να εμφανίω το query
    public function select(array $params = [], array $order=[], $debug = false): array
    {
        $first = true;
        $db = Database::getInstance();
        $sql = "select * from $this->__tablename ";

        foreach ($params  as $key => $value) {
            if ($first == true) {
                $first = false;
                $sql .= " where $key ";
            } else {

                $sql .= " and $key ";
            }

            if (is_numeric($value)) {
                $sql .= $value;
            } else {
                $sql .= "'" . $value . "'";
            }
        }

        
        $first = true;
        
        foreach ($order  as $key => $value) {
            if ($first == true) {
                $first = false;
                $sql .= " order by $key ";
                $sql .= " $value ";
            } else {

                $sql .= " ,$key ";
                $sql .= " $value ";
            }                            
            
        }


        if($debug == true){
            echo $sql;
            die();
        }
        $sth = $db->dbh->prepare($sql);
        $sth->execute();
        $results = $sth->fetchAll(\PDO::FETCH_OBJ);

        return $results;
    }

    //Σε περίπτωση που δεν μπορώ να κάνω σωστό select έχω το custom για να κάνω το join
    public function customselect($sql, $params = []): array
    {


        $db = Database::getInstance();

        $sth = $db->dbh->prepare($sql);

        $sth->execute($params);

        $results = $sth->fetchAll(\PDO::FETCH_OBJ);

        return $results;
    }

    //Μέθοδος για update
    public function update($update = [], $debug=false): array
    {
        $db = Database::getInstance();
        $sql = "update $this->__tablename set ";

        $params = array();
        $first = true;

        foreach ($this as $key => $value) {
            if ($key != 'id' && $key != '__tablename' && in_array($key, $update)) {
                $params += [$key => $value];

                if ($first == true) {
                    $sql .= "$key = :$key ";
                    $first = false;
                } else {
                    $sql .= ",$key = :$key ";
                }
            }
        }

        if (empty($this->id)) {
            return ['result' => false];
        }

        $params['id'] = $this->id;
        $sql .= "where id = :id ";
        if($debug == true){
            echo $sql;
            die();
        }
        $sth = $db->dbh->prepare($sql);
        $sth->execute($params);

        $count = $sth->rowCount();

        if ($count == '0') {
            return ['result' => false];
        } else {
            return ['result' => true];
        }
    }

    //Μέθοδος για το insert
    public function insert($debug=false): int
    {
        $db = Database::getInstance();
        $sql = "INSERT INTO $this->__tablename (";
        $sqlValues = " values (";

        $params = array();
        $first = true;
        foreach ($this as $key => $value) {
            if ($this->filterInsert($key, $value)) {
                $params += [$key => $value];

                if ($first == true) {
                    $sql .= "$key ";
                    $sqlValues .= ":$key ";
                    $first = false;
                } else {
                    $sql .= ",$key";
                    $sqlValues .= ",:$key ";
                }
            }
        }
        $sql .= ', regdate)';
        $sqlValues .= ' , :regdate)';
        $sql = $sql . $sqlValues;
        if($debug == true){
            echo $sql;
            die();
        }
        $sth = $db->dbh->prepare($sql);
        $params['regdate'] = date("Y-m-d H:i:s");

        $sth->execute($params);

        return $db->dbh->lastInsertId();
    }


    //Μέθοδος για να παίρνω
    public function getRegdate()
    {
            $date = new DateTime();
            return $date->format('Y/m/d H:i:s');
    }

    //Μια μέθοδος για να μετράω τις εγγραφές
    public function counter($sql, $params){
        $db = Database::getInstance();  

        $sql = "select count(*) totalrows from ( ". $sql .") as selector";
        $sth = $db->dbh->prepare($sql);
        $sth->execute($params);        
        $results = $sth->fetchColumn();

        return $results;

    }


    //Και μια μέθοδος για να διαγράφω
    public function delete(Array $params=[], $debug=false){
        $db = Database::getInstance();
        $sql = "DELETE from $this->__tablename ";
        $first = true;
        foreach ($params  as $key => $value) {
            if ($first == true) {
                $first = false;
                $sql .= " where $key ";
            } else {

                $sql .= " and $key ";
            }

            if (is_numeric($value)) {
                $sql .= $value;
            } else {
                $sql .= "'" . $value . "'";
            }
        }

        if($debug == true){
            echo $sql;
            //die();
        }

        $sth = $db->dbh->prepare($sql);

        $sth->execute();

        $count = $sth->rowCount();

        if ($count == '0') {
            return ['result' => false];
        } else {
            return ['result' => true];
        }


    }


    //Και μια μέθοδος για να κάνω truncate τον πίνακα
    public function truncate($debug = false){
        $db = Database::getInstance();
        $sql = "truncate $this->__tablename ";
        

        if($debug == true){
            echo $sql;
            //die();
        }
        $sth = $db->dbh->prepare($sql);
        $sth->execute();
        $count = $sth->rowCount();

        if ($count == '0') {
            return ['result' => false];
        } else {
            return ['result' => true];
        }
    }



    public function filterInsert($key, $value) : bool{
        return !empty($value) &&
            $key != '__tablename' &&
            $key != 'rules'  &&
            $key != 'id'
            ;
    }

}