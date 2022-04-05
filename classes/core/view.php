<?php

class View
{ 

    public $template = "views/template/index.php";
    public $pages = "views/pages";

    public function render($view, $params = [])
    {

        $layoutContent = $this->layout($params);        
        $viewContent = $this->view($view, $params);
        
        $layoutContent = str_replace('{{VIEW}}', $viewContent, $layoutContent);
        echo $layoutContent;
    }

    protected function layout($params=[])
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }                 
        
        ob_start();      
        include_once $this->template;               
        return ob_get_clean();
    }

    protected function view($view, $params=[])
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once "views/pages/$view/view.php";
        return ob_get_clean();
    }   
}