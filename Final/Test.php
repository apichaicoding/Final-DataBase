<?php
    include "inc/ConnModule.php" ; 

    $sql = " SELECT MONTH(STR_TO_DATE(tb_orders.c_OrderDate,'%d/%m/%Y'))
    FROM tb_orders
    WHERE (MONTH(STR_TO_DATE(tb_orders.c_OrderDate,'%d/%m/%Y'))) BETWEEN 1 AND 7
    GROUP BY MONTH(STR_TO_DATE(tb_orders.c_OrderDate,'%d/%m/%Y')) " ;

    $qq=mysqli_query($ConnDB,$sql);

    while($qwe = mysqli_fetch_array($qq))
    {
        if($qwe["MONTH(STR_TO_DATE(tb_orders.c_OrderDate,'%d/%m/%Y'))"] == 1)
        { $mon1 = 8 ;}
        else if($qwe["MONTH(STR_TO_DATE(tb_orders.c_OrderDate,'%d/%m/%Y'))"] == 2)
        { $mon2 = 8 ;}
        else if($qwe["MONTH(STR_TO_DATE(tb_orders.c_OrderDate,'%d/%m/%Y'))"] == 7)
        { $mon3 = 8 ;}
        else if($qwe["MONTH(STR_TO_DATE(tb_orders.c_OrderDate,'%d/%m/%Y'))"] == 8)
        { $mon4 = 8 ;}
        else if($qwe["MONTH(STR_TO_DATE(tb_orders.c_OrderDate,'%d/%m/%Y'))"] == 9)
        { $mon5 = 8 ;}
        else if($qwe["MONTH(STR_TO_DATE(tb_orders.c_OrderDate,'%d/%m/%Y'))"] == 11)
        { $mon6 = 8 ;}
        else if($qwe["MONTH(STR_TO_DATE(tb_orders.c_OrderDate,'%d/%m/%Y'))"] == 12)
        { $mon7 = 8 ;}
        else
        {}
            $month = $mon1+$mon2+$mon3+$mon4+$mon5+$mon6+$mon7 ;
    }
    echo $month ;


	$page_rows = 10;  //จำนวนข้อมูลที่ต้องการให้แสดงใน 1 หน้า  ตย. 5 record / หน้า 

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
    
    $sqlTable = " SELECT tb_categories.c_CategoryName AS CategoryName,
    tb_orderdetails.i_Quantity AS Quantity,
    (tb_orderdetails.i_Quantity * tb_products.i_Price) AS Total, 
    MONTH(STR_TO_DATE(tb_orders.c_OrderDate,'%d/%m/%Y')) as Month, 
    YEAR(STR_TO_DATE(tb_orders.c_OrderDate,'%d/%m/%Y')) as Year 
    FROM tb_orders 
    INNER JOIN tb_customers ON tb_orders.i_CustomerID = tb_customers.i_customerid 
    INNER JOIN tb_orderdetails ON tb_orderdetails.i_OrderID = tb_orders.i_OrderID 
    INNER JOIN tb_products ON tb_orderdetails.i_ProductID = tb_products.i_ProductID 
    INNER JOIN tb_categories ON tb_products.i_CategoryID = tb_categories.i_CategoryID 
    GROUP BY CategoryName, Month 
    HAVING (Month BETWEEN 1 AND 11) 
    AND (Year = 1997) 
    AND (Total BETWEEN 0 AND 10000) ORDER BY Year ASC , Month ASC , Total ASC $limit " ;

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
<html>
	<head>
		
  <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


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
    </style>

    <style>
        body{
            font-size:100%;font-family: 'Kanit', sans-serif;
            padding: 5px;
            margin: 0px;
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
            /* border-radius: 10px; */
            /* background-color: #f2f2f2; */
            padding: 5px    ;
        }


    </style>

    <style>
        #tbList {
            font-family: 'Kanit', sans-serif;
            border-collapse: collapse;
            /* border: 1px solid #000; */
            padding: 10px;
            /* width: 100%; */
        }
                
        #tbList td, #tbList th {
            border: 0px solid #000;
            padding: 10px; 
            border: 1px solid #000;
            text-align: center ;
            padding-left: 20px;
            padding-right: 20px;
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
    <form action="Test.php" method="post">
        <input type="text" name="ID">
        <input type="submit">
    </form>
		<table width="80%" id=tbList>
			<tr>
        <th>customerid</th>
        <th>customername</th>
        <th>contactname</th>
        <th>address</th>
        <th>city</th>
        <th>postalcode</th>
        <th>country</th>
			</tr>
			<?php
                echo $_POST["ID"] ;
				while($crow = mysqli_fetch_array($nquery)){
			?>
			<tr>
				<td><?php echo $crow['i_customerid']; ?></td>
                <td><?php echo $crow['c_customername']; ?></td>
				<td><?php echo $crow['c_contactname']; ?></td>
				<td><?php echo $crow['c_address']; ?></td>
				<td><?php echo $crow['c_city']; ?></td>
                <td><?php echo $crow['c_postalcode']; ?></td>
                <td><?php echo $crow['c_country']; ?></td>
			</tr>
			<?php
					}
			?>
		</table>
    <?php echo $paginationCtrls; ?>
	</body>
</html>