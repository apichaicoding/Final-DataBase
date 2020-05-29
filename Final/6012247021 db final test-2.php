<center>
<?php
    include "inc/ConnModule.php" ;

    $sqlCount = " SELECT COUNT(i_customerid) AS Count
    FROM tb_customers
    WHERE ( c_customername OR c_contactname LIKE '%".$_POST["Textname"]."%' ) " ;

    if($_POST["CustCity"] == "")
    {  }
    else
    { $sqlCount .= "and c_city IN ('".$_POST["CustCity"]."') "; }

    if($_POST["CustCountry"] == "")
    { }
    else
    { $sqlCount .= "and c_country IN ('".$_POST["CustCountry"]."') "; }


//query
    $query=mysqli_query($ConnDB,$sqlCount);
	$row = mysqli_fetch_row($query);

  $rows = $row[0];

	$page_rows = 15;  //จำนวนข้อมูลที่ต้องการให้แสดงใน 1 หน้า  ตย. 5 record / หน้า 

	$last = ceil($rows/$page_rows);

	if($last < 1){
		$last = 1;
	}

	$pagenum = 1;

	if(isset($_GET['pn'])){
		$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
	}

	if ($pagenum < 1) {
		$pagenum = 1;
	}
	else if ($pagenum > $last) {
		$pagenum = $last;
	}

    $limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
    $sqlTable = " SELECT i_customerid AS CusID ,c_customername AS CusName ,c_contactname AS CusCon ,c_city AS CusCity,c_country AS CusCoun,c_postalcode AS CusPost 
                FROM tb_customers
                WHERE ( c_customername LIKE '%".$_POST["Textname"]."%' OR c_contactname LIKE '%".$_POST["Textname"]."%' ) " ;

                if($_POST["CustCity"] == "")
                {  }
                else
                { $sqlTable .= "and c_city IN ('".$_POST["CustCity"]."') "; }

                if($_POST["CustCountry"] == "")
                { }
                else
                { $sqlTable .= "and c_country IN ('".$_POST["CustCountry"]."') "; }

    $sqlTable .= " $limit " ;

	$nquery=mysqli_query($ConnDB,$sqlTable);

	$paginationCtrls = '';

	if($last != 1){
        if ($pagenum > 1) {
            $previous = $pagenum - 1;
            $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'" class="btn btn-info">Previous</a> &nbsp; &nbsp; ';

            for($i = $pagenum-4; $i < $pagenum; $i++){
                if($i > 0){
                    $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-primary">'.$i.'</a> &nbsp; ';
                }
            }
        }

        $paginationCtrls .= ''.$pagenum.' &nbsp; ';

        for($i = $pagenum+1; $i <= $last; $i++){
            $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-primary">'.$i.'</a> &nbsp; ';
            if($i >= $pagenum+4){
                break;
            }
        }

        if ($pagenum != $last) {
            $next = $pagenum + 1;
            $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'" class="btn btn-info">Next</a> ';
            }
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ตารางลูกค้า</title>

    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
        body{
            font-size:100%;font-family: 'Kanit', sans-serif;
            padding: 0;
            margin: 0;
            margin-top: 25;
            background-color: #EDFEFC;
            }

        input[type=text], select {
            width: 60%;
            padding: 10px 15px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size:100%;font-family: 'Kanit', sans-serif;
            border-radius: 20px;
            text-align: center ; 
            text-align-last:center;
        }

        input[type=submit],input[type=reset] {
            /* width: 50%; */
            background-color: #4CAF50;
            color: back;
            padding: 10px 15px;
            margin: 5px 0;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size:100%;font-family: 'Kanit', sans-serif;
        }

        input[type=submit]:hover,input[type=reset]:hover {
            background-color: #45a049;
        }

        div {
            border-radius: 5px;
            /* background-color: #f2f2f2; */
            padding: 20px;
        }


    </style>

    <style>
        #tbList {
            font-family: 'Kanit', sans-serif;
            border-collapse: collapse;
            border: 2px solid #000;
            padding: 10px;
            background-color: #f2f2f2;
        }
                
        #tbList td, #tbList th {
            padding: 10px;
            border: 2px solid #000;
            /* text-align: center ; */
            padding-left: 20px;
            padding-right: 20px;
        }
                
        #tbList tr:nth-child(even){background-color: #CACACA;}
                
        #tbList tr:hover {
            background-color: #ddd;
            }
                
        #tbList th {
            padding-top: 20px;
            padding-bottom: 20px;
            /* text-align: center; */
            border: 2px solid #000;
            background-color: #4CAF50;
            color: back;
        }

        #CGG {
            font-family: 'Kanit', sans-serif;
            border-collapse: collapse;
            border: 5px solid #000;
            padding: 10px;
            background-color: #fff;
            text-align: center ;
        }
                
        #CGG td, #CGG th {
            border: 0px solid #000;
            padding: 10px;
            border: 0px solid #000;
            /* text-align: center ; */
            padding-left: 20px;
            padding-right: 20px;
        }
                
        #CGG tr:nth-child(even){background-color: #fff;}
                
        #CGG tr:hover {
            background-color: #ddd;
            }
                
        #CGG th {
            padding-top: 20px;
            padding-bottom: 20px;
            /* text-align: center; */
            background-color: #4CAF50;
            color: back;
            border: 0px solid #000;
        }
    </style>

    <style>
        a{
            text-decoration:none ;
            color: #F7F7F7;
            background-color: #AEA8A2 ;
            padding: 10 50 ;
            margin-left: 10 ;
            border-radius: 5px;
        }

        a:hover{
            background-color: #7C7A78;
            color: #000000;
        }
    </style>


</head>
<body>
        
    </center>
    <a href="6012247021 db final test-1.php"><i class="fa fa-angle-left"></i> Button</a>
    <center>

   <form action="6012247021 db final test-2.php" method="post">
   <p style="color: #006A11; background-color: #5AFF75; width:100%;  padding:30 ; font-size:45; border: 2px solid #006A11; ">ตารางลูกค้า</p>
   <table width="70%" id=CGG>
        <tr>
            <td width="50%" >ชื่อลูกค้า & ชื่อผู้ติดต่อ</td>
            <td width="50%" ><input type="text" name="Textname" placeholder="ชื่อลูกค้า & ชื่อผู้ติดต่อ"></td>
        </tr>
        <tr>
            <td>เมืองของลูกค้า</td>
            <td>
                <select name="CustCity">
                <option value="">  โปรดเลือกเมืองของลูกค้า </option>
                <?php
                    $sql = " SELECT DISTINCT c_city FROM tb_customers ";
                    $ResultSet = mysqli_query($ConnDB,$sql) ;
                    while($Row = mysqli_fetch_array($ResultSet))
                    {
                        echo "<option value=".$Row["c_city"].">".$Row["c_city"]."</option>" ;
                    }
                ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>ประเทศของลูกค้า</td>
            <td>
                <select name="CustCountry">
                <option value="">  โปรดเลือกประเทศของลูกค้า </option>
                <?php
                    $sql = " SELECT DISTINCT c_country FROM tb_customers ";
                    $ResultSet = mysqli_query($ConnDB,$sql) ;
                    while($Row = mysqli_fetch_array($ResultSet))
                    {
                        echo "<option value=".$Row["c_country"].">".$Row["c_country"]."</option>" ;
                    }
                ?>
                </select>
            </td>
        </tr>
        <tr>
            <td align="right"><input type="submit" value=" SAVE " style="width:40%" ></td>
            <td align="left" ><input type="reset" value=" CLEAR "  style="width:40%" ></td>
        </tr>
   </table>
   </form>

            <?php

                echo "</center><u><p style='padding:1; margin-left: 20 ; font-size:25;'>Showing rows ".$rows."</p></u><center>" ;

                $CharData = "" ;

                $sql = " SELECT i_customerid AS CusID ,c_customername AS CusName ,c_contactname AS CusCon ,c_city AS CusCity,c_country AS CusCoun,c_postalcode AS CusPost 
                FROM tb_customers
                WHERE ( c_customername LIKE '%".$_POST["Textname"]."%' OR c_contactname LIKE '%".$_POST["Textname"]."%' ) " ;

                if($_POST["CustCity"] == "")
                {  }
                else
                { $sql .= "and c_city IN ('".$_POST["CustCity"]."') "; }

                if($_POST["CustCountry"] == "")
                { }
                else
                { $sql .= "and c_country IN ('".$_POST["CustCountry"]."') "; }

                $ResultSet = mysqli_query($ConnDB,$sql) ;

                echo "<table width=100% id=tbList>" ;
                    echo "<tr>";
                        echo "<th>  รหัสลูกค้า    </th>";
                        echo "<th>  ชื่อลูกค้า    </th>";
                        echo "<th>  ชื่อผู้ติดต่อ  </th>";
                        echo "<th>  ชื่อเมือง  </th>";
                        echo "<th>  ชื่อประเทศ  </th>";
                        echo "<th>  รหัสไปรษณีย์  </th>";
                        echo "<th>  ลิงค์ที่รหัสลูกค้า  </th>";
                    echo "</tr>";
                    while($crow = mysqli_fetch_array($nquery))
                    {
                        echo "<tr align=center>";
                            echo "<td>".$crow["CusID"]."</td>";
                            echo "<td>".$crow["CusName"]."</td>";
                            echo "<td>".$crow["CusCon"]."</td>";
                            echo "<td>".$crow["CusCity"]."</td>";
                            echo "<td>".$crow["CusCoun"]."</td>";
                            echo "<td>".$crow["CusPost"]."</td>";
                            echo "<td> \n " 
                                . " <form action='6012247021 db final test-3.php' method=post> \n "
                                . " <input type=hidden name=IDCustom value=".$crow["CusID"]." > \n "
                                . " <input type=submit value=ข้อมูลการสั่งซื้อ name =".$crow["CusID"]. " style=width:100% > \n "
                                . " </form> \n "
                            . " </td> " ;
                        echo "</tr>";
                        $CharData .= $crow["CusID"].$crow["CusName"].$crow["CusCon"].$crow["CusCity"].$crow["CusCoun"].$crow["CusPost"] ;
                    }
                echo " </table><br><br><br> ";
                echo $paginationCtrls."<br><br><br><br><br>";
                if($CharData == "")
                { ?>
                    <table style="width:100%; " >
                        <tr>
                            <td width=50% align="right" ><i class="w3-jumbo w3-spin fa fa-refresh"></i></td>
                            <td width=50% align="left" ><p  style="font-size:100%;font-family: 'Kanit', sans-serif; font-size:35; " >No Data</p></td>
                        </tr>
                    </table>
                <?php 
                } else{}
            ?>
</body>
</html>