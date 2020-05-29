<?php
        error_reporting(0);
        $DBHost     = "localhost" ;
        $DBName     = 'db_northwind_cpe6001';
        $DBUserName = 'root' ;
        $DBUserPwd  = '' ;

        $PHP_Ver = (float)phpversion();

        // echo $PHP_Ver ; 
        if ($PHP_Ver >= 7.0) 
            {
                $ConnDB = mysqli_connect($DBHost,$DBUserName,$DBUserPwd) ; 
                if(!$ConnDB){ die('Could not connect Database Server, Please contact administrator.');}  
                mysqli_select_db($ConnDB,$DBName) or die('Could not found database, Please contact administrator.<br>Error:'.mysqli_error() ) ;
                mysqli_set_charset($ConnDB,"utf8");   
                //echo "Connect Database Complete<BR>" ;  
            }
        else 
            {
                $ConnDB = mysql_connect($DBHost,$DBUserName,$DBUserPwd) ; 
                if(!$ConnDB){ die('Could not connect Database Server');}  
                mysql_select_db($DBName,$ConnDB) or die('Could not found database.<br>Error:'.mysql_error() ) ;
                mysql_set_charset("utf8", $ConnDB);     
                //echo "Connect Database Complete<BR>" ;
            }       
?>