<center>
<?php
    include "inc/ConnModule.php" ; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ตารางยอดขาย</title>

    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <script>
        function ChkPriceMin()
        {
            var PriceValMin = document.getElementById("Min").value;
            if(isNaN(PriceValMin))
            {alert('กรุณากรอกราคาเป็นตัวเลข');}   
            else
            {} 
        };
    </script>

    <script>
        function ChkPriceMax()
        {
            var PriceValMax = document.getElementById("Max").value;
            if(isNaN(PriceValMax))
            {alert('กรุณากรอกราคาเป็นตัวเลข');}    
            else
            {}
        };
    </script>

    <style>
        #timeToRender {
		position:absolute; 
		top: 10px; 
		font-size: 20px; 
		font-weight: bold; 
		background-color: #d85757;
		padding: 0px 4px;
		color: #ffffff;
	    }
        body{
            font-size:100%;font-family: 'Kanit', sans-serif;
            padding: 0px;
            margin: 0px;
            background-color: #EDFEFC;
        }

        input[type=text], select {
            /* width: 60%; */
            padding: 10px 2%;
            margin: 5px 10;
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
            width: 30%;
            background-color: #4CAF50;
            color: back;
            padding: 10px 2%;
            margin: 5px 10;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size:100%;font-family: 'Kanit', sans-serif;
        }

        input[type=submit]:hover,input[type=reset]:hover {
            background-color: #45a049;
        }

        div {
            padding: 5px    ;
        }
        #tbList {
            font-family: 'Kanit', sans-serif;
            border-collapse: collapse;
            padding: 10px;
            background-color: #f2f2f2;
        }
                
        #tbList td, #tbList th {
            border: 0px solid #000;
            padding: 10px; 
            border: 1px solid #000;
            text-align: center ;
            padding-left: 20px;
            padding-right: 20px;
            
        }
                
        #tbList tr:nth-child(even){background-color: #7C7A78;}
                
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

<p style="color: #006A11; background-color: #5AFF75; width:100%;  padding:45 ; font-size:45; border: 2px solid #006A11; ">ตารางยอดขายและจำนวนสินค้า ในแต่ล่ะเดือน</p>
    <form action="6012247021 db final test-4.php" method="post">
    </center>
        <p>
            <li style="padding: 10px 2%; font-size:20; ">Year   
            <select name="Years" style="width:10% ;">
                <option value="0">ALL</option>
                <option value="1996">1996</option>
                <option value="1997">1997</option>
            </select>
            </li>   
        </p>
        <p style="font-size:20; padding: 5px 2%;">
            Month : (MIN - MAX)
        </p>
        <p>
            <select name="MonthMin"  style="width:15%;">
                <option value="1">  January </option>
                <option value="2">  February    </option>
                <option value="3">  March   </option>
                <option value="4">  April   </option>
                <option value="5">  May </option>
                <option value="6">  June    </option>
                <option value="7">  July    </option>
                <option value="8">  August  </option>
                <option value="9">  September   </option>
                <option value="10"> October </option>
                <option value="11"> November    </option>
                <option value="12"> December    </option>
            </select>
            <select name="MonthMax" style="width:15%;">
                <option value="1">  January </option>
                <option value="2">  February    </option>
                <option value="3">  March   </option>
                <option value="4">  April   </option>
                <option value="5">  May </option>
                <option value="6">  June </option>
                <option value="7">  July    </option>
                <option value="8">  August  </option>
                <option value="9">  September   </option>
                <option value="10"> October </option>
                <option value="11"> November    </option>
                <option value="12"> December    </option>
            </select>
        </p>
        <p style="font-size:20; padding: 5px 2%;">ช่วงของราคา</p>
        <p>
            <input type="text" name="Min" id="Min" onfocusout="ChkPriceMin()" placeholder="Min" style="width:15%;"value="">
            :
            <input type="text" name="Max" id="Max" onfocusout="ChkPriceMax()" placeholder="Max" style="width:15%;"value="">
        </p>
        <p style="font-size:20; padding: 5px 10%; text-align: Right ; ">
            เรียงจาก
        </p>
        <p style="font-size:20; padding: 0px 9%; text-align: Right ; ">
            <select name="Dec" style="width:25%;" >
                <option value="0">-- เลือกเรียงลำดับ --</option>
                <option value="1">น้อยไปมาก</option>
                <option value="2">มากไปน้อย</option>
            </select>
        </p>
        <p>
            <center>
                <input type="submit" style="width:20%; " value="RESULT">
            </center>
        </p>
        </form>
        <br><br>

        <center>
            <?php

                if($_POST["Years"] != 0)
                { $Data = "ปี : ".$_POST["Years"]  ; }
                else
                { $Data = "ปี : ทั้งหมด" ;}

                if($_POST["MonthMin"] == "" && $_POST["MonthMax"] == "")
                {$Data2 = "เดือน : ทั้งหมด" ;}
                else
                { $Data2 = "เดือน : ".$_POST["MonthMin"]." ถึง ".$_POST["MonthMax"]  ; }

                if ($_POST["Min"] != "" && $_POST["Max"] != "")
                { $Data3 = "ช่วงของราคา : (".$_POST["Min"]." ถึง ".$_POST["Max"].")" ; }
                else
                { $Data3 = " ช่วงของราคา : ทั้งหมด " ;}

                if($_POST["Dec"] == 2)
                {
                    $Data4 = " เรียงจาก : มากไปน้อย " ; 
                }
                else if($_POST["Dec"] == 1)
                {
                    $Data4 = " เรียงจาก : น้อยไปมาก " ;
                }
                else
                {}

                echo "<h4>".$Data." <br> ".$Data2." <br> ".$Data3." <br> ".$Data4."</h4>" ;

                $ChartData = '' ; 

                // Data
                $sql = " SELECT tb_categories.c_CategoryName AS CategoryName,
				tb_orderdetails.i_Quantity AS Quantity,
                (tb_orderdetails.i_Quantity * tb_products.i_Price) AS Total,
                MONTH(STR_TO_DATE(tb_orders.c_OrderDate,'%d/%m/%Y')) as Month,
                YEAR(STR_TO_DATE(tb_orders.c_OrderDate,'%d/%m/%Y')) as Year
                FROM tb_orders
                INNER JOIN tb_customers
                ON tb_orders.i_CustomerID = tb_customers.i_customerid
                INNER JOIN tb_orderdetails
                ON tb_orderdetails.i_OrderID = tb_orders.i_OrderID
                INNER JOIN tb_products
                ON tb_orderdetails.i_ProductID = tb_products.i_ProductID
                INNER JOIN tb_categories
                ON tb_products.i_CategoryID = tb_categories.i_CategoryID
                GROUP BY CategoryName, Month
                HAVING (Month BETWEEN ".$_POST["MonthMin"]." AND ".$_POST["MonthMax"].") " ;

                if($_POST["Years"] != 0)
                {
                    $sql .= " AND (Year = ".$_POST["Years"].") " ; 
                }
                else
                {}
                if ($_POST["Min"] != "" && $_POST["Max"] != "")
                {
                    $sql .= " AND (Total BETWEEN ".$_POST["Min"]." AND ".$_POST["Max"].") " ;
                }
                else{}

                $sql .= " ORDER BY  Year  ASC , Month ASC  " ;

                if($_POST["Dec"] == 2)
                {
                    $sql .= ", Total DESC " ; 
                }
                else if($_POST["Dec"] == 1)
                {
                    $sql .= ", Total ASC " ;
                }
                else
                {}

                echo " <table id=tbList style=width:100%;  > ";
                    echo " <tr> ";
                        echo " <th width=20% > CategoryName </th> " ;
                        echo " <th width=15%> Quantity </th> " ;
                        echo " <th width=15%> Total </th> " ;
                        echo " <th width=15%> Month </th> " ;
                        echo " <th width=15%> Year </th> " ;
                    echo " </tr> "; 
                    $ResultSet = mysqli_Query($ConnDB,$sql) ;
                    while($Row = mysqli_fetch_array($ResultSet))
                    {
                        if($Row["Month"] == 1)
                        {$month =  'January' ;}
                        else if($Row["Month"] == 2)
                        { $month =  'February' ;}
                        else if($Row["Month"] == 3)
                        { $month =  'March' ;}
                        else if($Row["Month"] == 4)
                        { $month =  'April' ;}
                        else if($Row["Month"] == 5)
                        { $month =  'May' ;}
                        else if($Row["Month"] == 6)
                        { $month =  'June' ;}
                        else if($Row["Month"] == 7)
                        { $month =  'July' ;}
                        else if($Row["Month"] == 8)
                        { $month =  'August' ;}
                        else if($Row["Month"] == 9)
                        { $month =  'September' ;}
                        else if($Row["Month"] == 10)
                        { $month =  'October' ;}
                        else if($Row["Month"] == 11)
                        { $month =  'November' ;}
                        else
                        { $month =  'December' ;}

                        echo " <tr> ";
                            echo " <td> ".$Row["CategoryName"]." </td> " ;
                            echo " <td> ".$Row["Quantity"]." </td> " ;
                            echo " <td> ".number_format($Row["Total"],2)." </td> " ;
                            echo " <td> ".$month." </td> " ;
                            echo " <td> ".$Row["Year"]." </td> " ;
                        echo " </tr> ";
                    }
                echo " </table><br><br> ";
                

                //Grap
                $sqlGrap = " SELECT tb_categories.c_CategoryName AS CategoryName,
                tb_orderdetails.i_Quantity AS Quantity, " ;
                if($_POST["Dec"] == 2)
                { $sqlGrap .= " MAX(tb_orderdetails.i_Quantity * tb_products.i_Price) AS Total, " ; }
                else if ($_POST["Dec"] == 1)
                { $sqlGrap .= " MIN(tb_orderdetails.i_Quantity * tb_products.i_Price) AS Total, " ; }
                else
                { $sqlGrap .= " AVG(tb_orderdetails.i_Quantity * tb_products.i_Price) AS Total, " ; }

                $sqlGrap .= " MONTH(STR_TO_DATE(tb_orders.c_OrderDate,'%d/%m/%Y')) as Month,
                YEAR(STR_TO_DATE(tb_orders.c_OrderDate,'%d/%m/%Y')) as Year
                FROM tb_orders
                INNER JOIN tb_customers
                ON tb_orders.i_CustomerID = tb_customers.i_customerid
                INNER JOIN tb_orderdetails
                ON tb_orderdetails.i_OrderID = tb_orders.i_OrderID
                INNER JOIN tb_products
                ON tb_orderdetails.i_ProductID = tb_products.i_ProductID
                INNER JOIN tb_categories
                ON tb_products.i_CategoryID = tb_categories.i_CategoryID
                GROUP BY Month
                HAVING (Month BETWEEN ".$_POST["MonthMin"]." AND ".$_POST["MonthMax"].") " ;

                if($_POST["Years"] != 0)
                {
                    $sqlGrap .= " AND (Year = ".$_POST["Years"].") " ; 
                }
                else
                {}
                if ($_POST["Min"] != "" && $_POST["Max"] != "")
                {
                    $sqlGrap .= " AND (Total BETWEEN ".$_POST["Min"]." AND ".$_POST["Max"].") " ;
                }
                else{}

                $sqlGrap .= " ORDER BY  Year  ASC , Month ASC  " ;

                if($_POST["Dec"] == 2)
                {
                    $sqlGrap .= ", Total DESC " ; 
                }
                else if($_POST["Dec"] == 1)
                {
                    $sqlGrap .= ", Total ASC " ;
                }
                else
                {}

                    $ResultSetGrap = mysqli_Query($ConnDB,$sqlGrap) ;
                    while($RowGrap = mysqli_fetch_array($ResultSetGrap))
                    {
                        if($RowGrap["Month"] == 1)
                        {$month =  'January' ; }
                        else if($RowGrap["Month"] == 2)
                        { $month =  'February' ;}
                        else if($RowGrap["Month"] == 3)
                        { $month =  'March' ;}
                        else if($RowGrap["Month"] == 4)
                        { $month =  'April' ;}
                        else if($RowGrap["Month"] == 5)
                        { $month =  'May' ;}
                        else if($RowGrap["Month"] == 6)
                        { $month =  'June' ;}
                        else if($RowGrap["Month"] == 7)
                        { $month =  'July' ;}
                        else if($RowGrap["Month"] == 8)
                        { $month =  'August' ;}
                        else if($RowGrap["Month"] == 9)
                        { $month =  'September' ;}
                        else if($RowGrap["Month"] == 10)
                        { $month =  'October' ;}
                        else if($RowGrap["Month"] == 11)
                        { $month =  'November' ;}
                        else
                        { $month =  'December' ;}

                        $ChartData .= "['".$RowGrap["CategoryName"]."',".$RowGrap["Total"]."]," ;
                    }

                //Quantity
                $a = $_POST["MonthMin"] ;
                while($a <= $_POST["MonthMax"])
                {
                    $sqlQuantity = " SELECT
                    tb_categories.c_CategoryName AS CategoryName,
                     tb_orderdetails.i_Quantity AS Quantity,
                     (tb_orderdetails.i_Quantity * tb_products.i_Price) AS Total,
                    MONTH(STR_TO_DATE(tb_orders.c_OrderDate,'%d/%m/%Y')) as Month,
                    YEAR(STR_TO_DATE(tb_orders.c_OrderDate,'%d/%m/%Y')) as Year 
                    FROM tb_orders
                    INNER JOIN tb_orderdetails ON tb_orderdetails.i_OrderID = tb_orders.i_OrderID 
                    INNER JOIN tb_products ON tb_orderdetails.i_ProductID = tb_products.i_ProductID 
                    INNER JOIN tb_categories ON tb_products.i_CategoryID = tb_categories.i_CategoryID 
                    GROUP BY CategoryName, Month 
                    HAVING (Month BETWEEN $a AND $a) " ;
                    if($_POST["Years"] != 0)
                    {
                        $sqlQuantity .= " AND (Year = ".$_POST["Years"].") " ; 
                    }
                    else
                    {}
                    $sqlQuantity .= " ORDER BY  Year  ASC , Month ASC " ;
                    if($_POST["Dec"] == 2)
                    {
                         $sqlQuantity .= ", Total DESC " ; 
                    }
                    else if($_POST["Dec"] == 1)
                    {
                        $sqlQuantity .= ", Total ASC " ;
                    }
                    else
                    {}

                    $ResultSet2 = mysqli_Query($ConnDB,$sqlQuantity) ;
                    while($Row2 = mysqli_fetch_array($ResultSet2))
                    {
                        $Quantity[$a] .= $Row2["Quantity"].",";
                        $Quantity2[$a] .= "'".$Row2["CategoryName"]."',";
                        
                    }
                    $a++ ;
                   
                }

                //Month
                $b = $_POST["MonthMin"] ;
                while($b <= $_POST["MonthMax"])
                {
                    if($b == 1)
                    {$month =  'January' ; }
                    else if($b == 2)
                    { $month =  'February' ;}
                    else if($b == 7)
                    { $month =  'July' ;}
                    else if($b == 8)
                    { $month =  'August' ;}
                    else if($b == 9)
                    { $month =  'September' ;}
                    else if($b == 10)
                    { $month =  'October' ;}
                    else if($b == 11)
                    { $month =  'November' ;}
                    else if($b == 12)
                    { $month =  'December' ;}
                    else
                    {$month = "" ;}

                    $Month[$b] .= $month;

                    $b++ ;
                    
                }
            
                
            ?>
<br><br>
        
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                ['Month','<?php if($_POST["Dec"] == 2){ echo "Total MAX" ;} else if ($_POST["Dec"] == 1){ echo "Total Min" ;}else{ echo "Total AVG" ;} ?>',],
                <?php echo $ChartData ; ?>
                ]);

                var options = {
                title: 'ยอดรวมสินค้า ที่ขายได้ในแตล่ะเดือน',
                hAxis: {title: 
                    '<?php 
                        if($_POST["Years"] == 0)
                        { echo "Year 1996-1997";}
                        else if($_POST["Years"] == 1996)
                        { echo "Year 1996";}
                        else
                        { echo "Year 1997";}
                    ?>',
                    titleTextStyle: {color: '#000'}
                },
                vAxis: {minValue: 0}
                };

                var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
            </script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            [
                '<?php 
                        if($_POST["Years"] == 0)
                        { echo "Year 1996-1997";}
                        else if($_POST["Years"] == 1996)
                        { echo "Year 1996";}
                        else
                        { echo "Year 1997";}
                ?>',
                <?php echo $Quantity2[1] ; ?>
            ],


            <?php 
                $c = $_POST["MonthMin"] ;
                while($c <= $_POST["MonthMax"])
                {
                    if($Month[$c] != "")
                    {
                        if($_POST["Years"] == 1996)
                        {
                            if($c != 1 && $c != 2)
                            {
                                echo "['".$Month[$c]."',".$Quantity[$c]."],";
                            }
                            else
                            {}
                        }
                        else if($_POST["Years"] == 1997)
                        {
                            if($c == 1 || $c == 2)
                            {
                                echo "['".$Month[$c]."',".$Quantity[$c]."],";
                            }
                            else
                            {}
                        }
                        else
                        {echo "['".$Month[$c]."',".$Quantity[$c]."],";}
                    }
                    else
                    {}
                    $c++ ;
                }
            ?>
        ]);

        var options = {
          chart: {
            title: 'จำนวนสินค้า ที่ขายได้ในแต่ล่ะเดือน',
            subtitle: '<?php 
                        if($_POST["Years"] == 0)
                        { echo "8 Slot : Year 1996-1997";}
                        else if($_POST["Years"] == 1996)
                        { echo "8 Slot : Year 1996";}
                        else
                        { echo "8 Slot : Year 1997";}
                    ?>',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    <?php
        if($ChartData == "")
            { ?> 
                <table style="width:100%; " >
                    <tr>
                        <td width=50% align="right" ><i class="w3-jumbo w3-spin fa fa-refresh"></i></td>
                        <td width=50% align="left" ><p  style="font-size:100%;font-family: 'Kanit', sans-serif; font-size:35; " >No Data Grap1</p></td>
                    </tr>
                </table><br><br><br>
            
            <?php }
            else
            {
        ?>
            <table style="width:100%; " >
                <tr><div id="chart_div" style="width: 60%; height: 350;"></div></tr>   
            </table>
        <?php 
            }   
        ?>

<?php
            if($Quantity2[1] == "")
            { ?> 
                <table style="width:100%; " >
                    <tr>
                        <td width=50% align="right" ><i class="w3-jumbo w3-spin fa fa-refresh"></i></td>
                        <td width=50% align="left" ><p  style="font-size:100%;font-family: 'Kanit', sans-serif; font-size:35; " >No Data Grap2</p></td>
                    </tr>
                </table>
            
            <?php }
            else
            {
        ?>
            <table style="width:100%; " >   
                <tr><div id="columnchart_material" style="width: 60%; height: 350px;"></div></tr>
            </table>
        <?php 
            }   
        ?>
    </center>
    <p style="padding: 0px 20; color: #4CAF50; font-size:100%;font-family: 'Kanit', sans-serif; font-size:27 ; ">Data only July 1996 - February 1997</p>
</body>
</html>