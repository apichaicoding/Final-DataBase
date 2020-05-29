<center>
<?php
    include "inc/ConnModule.php" ; 
    // echo $_POST["IDCustom"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ข้อมูลการซื้อขาย</title>
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	

    <style>
        body{
            font-size:100%;font-family: 'Kanit', sans-serif;
            padding: 0 ;
            margin-top: 2% ;
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
        }

        input[type=submit],input[type=reset] {
            width: 60%;
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
            /* border-radius: 5px; */
            /* background-color: #f2f2f2; */
            padding: 20px;
        }
        #tbList {
            font-family: 'Kanit', sans-serif;
            border-collapse: collapse;
            /* border: 1px solid #000; */
            padding: 10px;
            
            background-color: #f2f2f2;
            /* width: 100%; */
        }
                
        #tbList td, #tbList th {
            border: 0px solid #000;
            font-size:16;
            padding: 10px; */
            /* border: 1px solid #000; */
            /* text-align: center ; */
            padding-left: 20px;
            padding-right: 20px;
        }
                
        #tbList tr:nth-child(even){background-color: #D7D7D7;}
                
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
            padding: 10px 50px ;
            margin-left: 2% ;
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
    <a href="6012247021 db final test-2.php" style="width:100%;"><i class="fa fa-angle-left"></i> Back</a>
    <center>
    <form action="6012247021 db final test-3.php" method="post">
    <p style="color: #006A11; background-color: #5AFF75; width:100%;  padding:30 ; font-size:45; border: 2px solid #006A11; ">ข้อมูลการซื้อขาย</p>
        <table width=100% id=tbList>
            <tr>
                <th>  เลขที่ใบสั่งซื้อ    </th>
                <th>  วันที่สั่งซื้อ    </th>
                <th>  จำนวนรายการ  </th>
                <th>  ยอดซื้อรวม  </th>
            </tr>
        
        <?php
            $sql = " SELECT tb_orders.i_OrderID AS OderID,tb_orders.c_OrderDate AS OrderDate,tb_orderdetails.i_Quantity AS Quantity,(tb_products.i_Price*tb_orderdetails.i_Quantity) AS Total
            FROM tb_orders INNER JOIN tb_orderdetails
            ON tb_orders.i_OrderID = tb_orderdetails.i_OrderID
            INNER JOIN tb_products
            ON tb_orderdetails.i_ProductID = tb_products.i_ProductID
            INNER JOIN tb_customers
            ON tb_orders.i_CustomerID = tb_customers.i_customerid
            WHERE tb_customers.i_customerid = ".$_POST["IDCustom"]."
            GROUP BY OderID
            ORDER BY Total DESC " ;

            $ResultSet = mysqli_query($ConnDB,$sql) ;
            $ChartData ="";
            while($Row = mysqli_fetch_array($ResultSet))
            {
                echo "<tr align=center id=tbList >";
                    echo "<td>".$Row["OderID"]."</td>";
                    echo "<td>".$Row["OrderDate"]."</td>";
                    echo "<td>".$Row["Quantity"]."</td>";
                    echo "<td>".number_format($Row["Total"],2)."</td>";
                echo "</tr>";
                $ChartData .= "['".$Row["OderID"]."', ".$Row["Total"]." ],";
            }

            $sql2 = " SELECT tb_orders.i_OrderID AS OderID,tb_orders.c_OrderDate AS OrderDate,tb_orderdetails.i_Quantity AS Quantity,(tb_products.i_Price*tb_orderdetails.i_Quantity) AS Total
            FROM tb_orders INNER JOIN tb_orderdetails
            ON tb_orders.i_OrderID = tb_orderdetails.i_OrderID
            INNER JOIN tb_products
            ON tb_orderdetails.i_ProductID = tb_products.i_ProductID
            INNER JOIN tb_customers
            ON tb_orders.i_CustomerID = tb_customers.i_customerid
            WHERE tb_customers.i_customerid = ".$_POST["IDCustom"]."
            GROUP BY OderID
            ORDER BY Total ASC " ;

            $ResultSet2 = mysqli_query($ConnDB,$sql2) ;
            $ChartData2 ="";
            while($Row2 = mysqli_fetch_array($ResultSet2))
            {
                $ChartData2 .= "['".$Row2["OderID"]."', ".$Row2["Total"]." , 'red'],";
            }
            
            
        ?>
        </table>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
            var data = new google.visualization.arrayToDataTable([
                <?php 
                    echo "['ยอดซื้อรวม', 'เลขที่ใบสั่งซื้อ']," ;
                    echo $ChartData ;
                ?>
               
            ]);

            var options = {
            width: 800,
            legend: { position: 'none' },
            chart: {
                title: 'ข้อมูลลูกค้า'},
            axes: {
                x: {
                0: { side: 'top', label: 'เลขที่ใบสั่งซื้อ'} // Top x-axis.
                }
            },
            bar: { groupWidth: "90%" }
            };

            var chart = new google.charts.Bar(document.getElementById('top_x_div'));
            // Convert the Classic options to Material options.
            chart.draw(data, google.charts.Bar.convertOptions(options));
        };
        </script>

    

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['ยอดซื้อรวม', 'เลขที่ใบสั่งซื้อ',{ role: 'style' }],
                <?php echo $ChartData2 ; ?>
            ]);

            var options = {
                title: 'ข้อมูลลูกค้า',
                curveType: '0',
                legend: { position: 'bottom' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        }
    </script>

        <?php if($ChartData != "" || $ChartData2 != "") {?>
            <div id="top_x_div" style="width: 900px; height: 500px;"></div>
            <div id="curve_chart" style="width: 900px; height: 500px"></div>
        <?php 
            }else
            { ?>
                
                <table style="width:100%; " >
                    <tr>
                        <td width=50% align="right" ><i class="w3-jumbo w3-spin fa fa-refresh"></i></td>
                        <td width=50% align="left" ><p  style="font-size:100%;font-family: 'Kanit', sans-serif; font-size:35; " >No Data</p></td>
                    </tr>
                </table>
        <?php    }
        ?>
        
    </form>
</html>