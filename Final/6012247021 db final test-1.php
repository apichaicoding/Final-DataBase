<center>
<?php
    include "inc/ConnModule.php";
    if(isset($_POST["CustName"]))
    { 
        $num = $_POST["CustName"] ;
        $Check = " SELECT c_customername FROM `tb_customers` WHERE c_customername = '".$num."' " ; 
        $result = mysqli_query($ConnDB,$Check);
        
        if(mysqli_fetch_array($result) > 0)
        { 
            echo " <p style='color:Green; border: 1px solid #EEFE0D; background-color: #EEF682;' >Username already exists</p>";  
            $FORM = " 6012247021 db final test-1.php " ;
        }
        else
        {
            if($_POST["CustName"] != "" && $_POST["Contact"] != "" && $_POST["Address"] != "" && $_POST["CustCity"] != "" && $_POST["PostalCode"] != "" && $_POST["Country"] != "" )
            {
                $SqlInsert = " insert into tb_customers value ( " ;
                $SqlInsert .= $_POST["CustID"]." , '".$_POST["CustName"]."' ,    ";
                $SqlInsert .= "'".$_POST["Contact"]."' , '".$_POST["Address"]."' ,    ";
                $SqlInsert .= "'".$_POST["CustCity"]."' , '".$_POST["PostalCode"]."',   ";
                $SqlInsert .= "'".$_POST["Country"]."' )" ;
                mysqli_query($ConnDB,$SqlInsert);
                echo " <p style='color:Green; border: 1px solid #2E8B57; background-color: #98FB98;' >Login created successfully</p><br><br>"; 

                $FORM =  " 6012247021 db final test-2.php " ;

                $sql = " SELECT i_customerid AS CusID ,c_customername AS CusName ,c_contactname AS CusCon ,c_city AS CusCity,c_country AS CusCoun,c_postalcode AS CusPost 
                FROM tb_customers
                WHERE c_customername = '".$_POST["CustName"]."' " ;

                $ResultSet = mysqli_query($ConnDB,$sql) ;

                echo "<table width=80% > " ;
                    echo "<tr>";
                        echo "<td align=right > <u>NEW</u> <td>";
                        echo "<td align=center >";
                            echo " <table width=50% id=tbList>" ;
                                echo "<tr>";
                                    echo "<th>  รหัสลูกค้า    </th>";
                                    echo "<th>  ชื่อลูกค้า    </th>";
                                    echo "<th>  ชื่อผู้ติดต่อ  </th>";
                                    echo "<th>  ชื่อเมือง  </th>";
                                    echo "<th>  ชื่อประเทศ  </th>";
                                    echo "<th>  รหัสไปรษณีย์  </th>";
                                echo "</tr>";
                                while($crow = mysqli_fetch_array($ResultSet))
                                {
                                    echo "<tr align=center>";
                                        echo "<td>".$crow["CusID"]."</td>";
                                        echo "<td>".$crow["CusName"]."</td>";
                                        echo "<td>".$crow["CusCon"]."</td>";
                                        echo "<td>".$crow["CusCity"]."</td>";
                                        echo "<td>".$crow["CusCoun"]."</td>";
                                        echo "<td>".$crow["CusPost"]."</td>";
                                    echo "</tr>";
                                }
                            echo " </table> ";
                            echo " <form action='6012247021 db final test-2.php' method=post> " ;
                                echo " <input type=submit style='width:30%' value=ตารางลูกค้า> " ;
                            echo " </form><br><br><br> " ;
                        echo "</td>";
                    echo "</tr>";
                echo " </table> " ;
            }
            
            else
            { 
                echo " <p style='color:red; background-color: #FDF5E6; border: 2px solid #FF4500;' >Not specified</p>  "; 
                $FORM = " 6012247021 db final test-1.php " ;
            }
        }
    }
    else
    {
        
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>เพิ่มข้อมูลลูกค้า</title>

    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">

    <style>
        body{
            font-size:100%;font-family: 'Kanit', sans-serif;
            padding: 0;
            margin: 0;
            /* background-color: #D8E4E3; */
        }

        p{
            text-decoration:none ;
            width: 20%;
            color: #000;
            padding: 25px 100px;
            margin: 5px 0;
            border-radius: 5px;
            cursor: pointer;
            font-size:100%;font-family: 'Kanit', sans-serif;
        }

        
        a{
            text-decoration:none ;
            width: 50%;
            background-color: #4CAF50;
            color: #000;
            padding: 10px 120px;
            margin: 5px 0;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size:100%;font-family: 'Kanit', sans-serif;
        }

        a:hover {
            background-color: #45a049;
        }



        input[type=text], select {
            width: 50%;
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

        textarea {
            width: 80%;
            padding: 10px 15px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size:100%;font-family: 'Kanit', sans-serif;
            border-radius: 20px;
        }

        input[type=submit],input[type=reset] {
            width: 50%;
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
            /* border: 1px solid #000; */
            padding: 10px;
            /* width: 100%; */
            background-color: #ffffff;
        }
                
        #tbList td, #tbList th {
            border: 0px solid #000;
            padding: 10px; */
            /* border: 1px solid #000; */
            /* text-align: center ; */
        }
                
        #tbList tr:nth-child(even){background-color: #f2f2f2;}
                
        #tbList tr:hover {
            background-color: #ddd;
            }
                
        #tbList th {
            padding-top: 20px;
            padding-bottom: 20px;
            text-align: center;
            background-color: #4CAF50;
            color: back;
            border: 1px solid #000;
        }
    </style>

</head>

<body>
    
   <form action="<?=$FORM ?>" method="post">
    <table id=tbList width="100%">
            <tr>
                <th align=center >เพิ่มข้อมูลลูกค้า</th>
            </tr>
    </table>
    <table id=tbList width="100%">
            <tr>
                <td width="50%" align=center >รหัสลูกค้า      :    </td>
                <td width="50%" align=center ><input type="text" name="CustID" readonly value="<?= GetNewProdID($ConnDB);?>"></td>
            </tr>
            <tr>
                <td align="center" >ชื่อลูกค้า     :    </td>
                <td align="center" ><input type="text" name="CustName" placeholder="ชื่อลูกค้า"></td>
            </tr>
            <tr>
                <td align="center" >ชื่อผู้ติดต่อ      :    </td>
                <td align="center" ><input type="text" name="Contact" placeholder="ชื่อผู้ติดต่อ"></td>
            </tr> 
            <tr>
                <td align="center" >เมืองของลูกค้า  :   </td>
                <td align="center" >
                    <select name="CustCity">
                    <option value="">โปรดเลือกเมืองของลูกค้า</option>
                        <?php
                            $Sqlcity = " SELECT DISTINCT c_city FROM tb_customers " ; 
                            $ResultSetcity = mysqli_query($ConnDB,$Sqlcity) ;
                            while($Rowcity = mysqli_fetch_array($ResultSetcity))
                            {
                                echo  "<option value=".$Rowcity["c_city"].">".$Rowcity["c_city"]."</option>" ;
                            }
                        ?>
                    </select>
                </td>
            </tr> 
            <tr> 
                <td align=center >ประเทศของลูกค้า  :   </td>
                <td align=center > 
                    <select name="Country">
                    <option value="">โปรดเลือกประเทศของลูกค้า</option>
                        <?php
                            $Sqlcity = " SELECT DISTINCT c_country FROM tb_customers " ; 
                            $ResultSetcity = mysqli_query($ConnDB,$Sqlcity) ;
                            while($Rowcity = mysqli_fetch_array($ResultSetcity))
                            {
                                echo  "<option value=".$Rowcity["c_country"].">".$Rowcity["c_country"]."</option>" ;
                            }
                        ?>
                    </select>
                </td> 
            </tr>
            <tr>
                <td align=center >รหัสไปรษณีย์      :    </td> 
                <td align=center ><input type="text" name="PostalCode" placeholder="รหัสไปรษณีย์"></td>
            </tr> 
            <tr>
                <td align="center" >ที่อยู่      :    </td>
                <td align="center" ><textarea rows="3" name="Address" placeholder="โปรดระบุที่อยู่"></textarea></td>
            </tr>
            <tr> 
                <td align="right"><input type="submit" value=" SAVE " ></td>
                <td align="left"><input type="reset" value=" CLEAR " ></td>
            </tr>
        </table>
    </form>
</body>
</html>


<?php
    function GetNewProdID($DB)
    {
        $ID = '' ;
        $Sql = " SELECT Max(i_customerid)+1 AS NewID FROM tb_customers " ; 
        $ResultSet = mysqli_query($DB,$Sql) ;
            while($Row = mysqli_fetch_array($ResultSet))
            {$ID = $Row["NewID"];}
            return $ID ;
    }
    
?>