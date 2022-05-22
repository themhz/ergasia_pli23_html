<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html> 
    <head>
        <!-- Ένα style για την επικεφαλίδα του πίνακα -->
        <style>
            tr th{
                color:#CE0980;
            }
        </style>
    </head>
<body >
    <h1 style="text-align:center; background-color:#182234;color:#CE0980;padding:10px;">Αναφορά XSL-XML</h1>
    <!-- Συνολικός αριθμός των προγραμματισμένων ραντεβού -->
    <table style="width:800px;margin-left: auto;margin-right: auto;" >  
        <tr>
            <td align="center">
                <table border="1" style="width:100%;">
                    <tr><th colspan="2">Συνολικός αριθμός των προγραμματισμένων ραντεβού: <span style="color:blue;"><xsl:value-of select="count(//apointment)"/></span></th></tr>
                </table>
                <br/>
            </td>
        </tr>
        <!-- Ποσοστό ολοκληρωμένων εμβολιασμών -->
        <tr>
            <td align="center">
                <table border="1" style="width:100%;">
                    <tr><th colspan="2">Ποσοστό ολοκληρωμένων εμβολιασμών: <span style="color:blue;"><xsl:value-of select="round(sum(//status) div count(//status) * 100) div 100 * 100"/>%</span></th></tr>
                </table>
                <br/>
            </td>
        </tr>
        <tr>
            <td align="center">
                <table border="1" style="width:100%;">
                    <tr bgcolor="#182234"><th colspan="2">Στοιχεία γιατρού:</th></tr>
                    <tr><th>Ονοματεπώνυμο:</th><td><xsl:value-of select="//fullname"/></td></tr>
                    <tr><th>Αρ.Ταυτότητας:</th><td><xsl:value-of select="//artaftotita"/></td></tr>
                    <tr><th>E-mail:</th><td><xsl:value-of select="//email"/></td></tr>
                                        
                </table>
                <br/>
            </td>
        </tr>
        <tr>
            <td align="center">
                <table border="1" style="width:100%;">
                    <tr bgcolor="#182234"><th colspan="2">Εμβολιαστικό Κέντρο:</th></tr>
                    <tr><th>Διεύθυνση:</th><td><xsl:value-of select="//address"/></td></tr>
                    <tr><th>Τ.Κ:</th><td><xsl:value-of select="//tk"/></td></tr>
                    <tr><th>Τηλέφωνο:</th><td><xsl:value-of select="//phone"/></td></tr>
                                        
                </table>
                <br/>
            </td>
        </tr>
        <!-- Πίνακας με τα ραντεβού -->        
        <tr>
            <td align="center">
                <table border="1" style="width:100%;">        
                    <tr>
                        <th colspan="5" bgcolor="#182234" style="height:50px;">Προγραμματισμένα ραντεβού</th>
                    </tr>            
                    <tr bgcolor="#182234">                                        
                    
                    <th style="text-align:left">Ημεροηνία εμβολιασμού</th>
                    <th style="text-align:left">Όνοματεπώνυμο</th>
                    <th style="text-align:left">ΑΜΚΑ</th>
                    <th style="text-align:left">Ηλικία</th>                    
                    <th style="text-align:left">Κατάσταση</th>                    
                    </tr>                         
                    <xsl:for-each select="//apointment">          
                    <xsl:sort select="datetime" order="ascending"/>                                            
                            <tr>                                
                                <td style="text-align:center"><xsl:value-of select="datetime"/></td>
                                <td style="text-align:center"><xsl:value-of select="fullname"/></td> 
                                <td style="text-align:center"><xsl:value-of select="amka"/></td>
                                <td style="text-align:center"><xsl:value-of select="age"/></td>                                
                                <td style="text-align:center"><xsl:value-of select="status"/></td> 
                            </tr>                                                                
                    </xsl:for-each>
                </table>                     
            </td>            
        </tr>        
    </table>
        
</body>
</html>
</xsl:template>
</xsl:stylesheet>
