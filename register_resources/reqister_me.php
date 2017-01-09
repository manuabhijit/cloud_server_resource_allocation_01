
<style>
body{background-image:url(bg.png)}.datagrid table{border-collapse:collapse;text-align:left;width:100%}.datagrid{font:normal 12px/150% Arial,Helvetica,sans-serif;background:#fff;overflow:hidden;border:2px solid #E5703D}.datagrid table td,.datagrid table th{padding:1px 10px}.datagrid table thead th{background:-webkit-gradient(linear,left top,left bottom,color-stop(0.05,#E5703D),color-stop(1,#E56739));background:-moz-linear-gradient(center top,#E5703D 5%,#E56739 100%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#E5703D',endColorstr='#E56739');background-color:#E5703D;color:#FFF;font-size:23px;font-weight:700;border-left:1px solid #E5703D}.datagrid table thead th:first-child{border:none}.datagrid table tbody td{color:#00496B;border-left:1px solid #E5703D;font-size:16px;font-weight:400}.datagrid table tbody .alt td{background:#E5D6D3;color:#00496B}.datagrid table tbody td:first-child{border-left:none}.datagrid table tbody tr:last-child td{border-bottom:none}.datagrid table tfoot td div{border-top:1px solid #E5703D;background:#E1EEF4}.datagrid table tfoot td{padding:0;font-size:18px}.datagrid table tfoot td div{padding:2px}.datagrid table tfoot td ul{margin:0;padding:0;list-style:none;text-align:right}.datagrid table tfoot li{display:inline}.datagrid table tfoot li a{text-decoration:none;display:inline-block;padding:2px 8px;margin:1px;color:#FFF;border:1px solid #E5703D;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;background:-webkit-gradient(linear,left top,left bottom,color-stop(0.05,#E56842),color-stop(1,#E5703D));background:-moz-linear-gradient(center top,#E56842 5%,#E5703D 100%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#E56842',endColorstr='#E5703D');background-color:#E56842}.datagrid table tfoot ul.active,.datagrid table tfoot ul a:hover{text-decoration:none;border-color:#E5703D;color:#FFF;background:none;background-color:#00557F}div.dhtmlx_window_active,div.dhx_modal_cover_dv{position:fixed!important}input[type=email]{width:100%;padding:12px 20px;margin:8px 0;box-sizing:border-box}input[type=text]{width:100%;padding:12px 20px;margin:8px 0;box-sizing:border-box}button{background-color:#4CAF50;border:none;color:#fff;padding:15px 32px;text-align:center;text-decoration:none;display:inline-block;font-size:16px;margin:4px 2px;cursor:pointer;width:100%}
</style>


<?php

	/*
		Registers users with new email Id and allocates resources base on round robin algorithm.
		
		File Properties:
		1. Procedural Programming Approach
		2. First come first serve seat allocation system.
		3. My SQL Database 
		4. Clean Code
	*/


	// Form Handling 
	$var1=$_POST['email'];
	$var2=$_POST['db1'];
	$var3=$_POST['db2'];
	$var4=$_POST['p1'];
	$var5=$_POST['p2'];
	$var6=$_POST['day'];
	
	// Database Connection
	$host="localhost";
	$username="root";
	$password="";
	$database="dill";
			
	mysql_connect($host,$username,$password);
	@mysql_select_db($database) or die( "Unable to select database");
	
	
	// Round Robin 1
	$block=5;
	$query="select * from resourses where 1";
	$run=mysql_query($query);
	
	$i=0;
	while ($row=mysql_fetch_array($run))
	{
		$res_size[$i]=$row[1];
		$res_inuse[$i]=$row[2];
		$i++;
	}
	
	$x=$var2;	$error1=0;
	for($i=0;$i<5;$i++)$my_res_inuse[$i]=0;
	
	while($x > 0 && $error1 ==0 )
	{
		$error1=1;
		for($i=0;$i<5;$i++)
		{
			if($res_size[$i]-$res_inuse[$i]>=$block && $x>0)
			{
				if($block<$x)
					$sub=$block;
				else
					$sub=$x;
				
				$my_res_inuse[$i]+=$sub;
				$res_inuse[$i]+=$sub;
				
				$x= $x- $sub;
				$error1=0;
			}
		}
	}
	
	// Round Robin 2
	$block=5;
	$query="select * from processors where 1";
	$run=mysql_query($query);
	
	$i=0;
	while ($row=mysql_fetch_array($run))
	{
		$pross_size[$i]=$row[1];
		$pross_inuse[$i]=$row[4];
		$i++;
	}	
	$x=$var4;	$error2=0;
	for($i=0;$i<5;$i++)$my_pross_inuse[$i]=0;
	
	while($x > 0 && $error2 ==0 )
	{
		$error2=1;
		for($i=0;$i<5;$i++)
		{
			if($pross_size[$i]-$pross_inuse[$i]>=$block && $x>0)
			{
				if($block<$x)
					$sub=$block;
				else
					$sub=$x;
				
				$my_pross_inuse[$i]+=$sub;
				$pross_inuse[$i]+=$sub;
				
				$x= $x- $sub;
				$error2=0;
			}
		}
	}
		
	if($error2 == 0 && $error1 == 0) // is no error
	{
		// Update the database 
		mysql_query("INSERT INTO users(email,db,db_t,qu,qu_t,days) VALUES ('$var1',$var2,$var3,$var4,$var5,$var6)") or die (mysql_error());
		mysql_query("INSERT INTO allocation(email,db_1,db_2,db_3,db_4,db_5,pros_1,pros_2,pros_3,pros_4,pros_5) VALUES ('$var1',$my_res_inuse[0],$my_res_inuse[1],$my_res_inuse[2],$my_res_inuse[3],$my_res_inuse[4],$my_pross_inuse[0],$my_pross_inuse[1],$my_pross_inuse[2],$my_pross_inuse[3],$my_pross_inuse[4])	") or die (mysql_error1());
	
		// Printing Registration Details as reciept
		echo "<h3>Thank You For registering</h3>";
		
		echo "<div class=\"datagrid\">";
		echo "<table border=\"1\" width=\"100%\">";
		
			echo "<tr> <td colspan = \"2\">User Details		</td>        </tr>";
			echo "<tr> <td>Email:					</td> <td>$var1</td> </tr>";
			echo "<tr> <td>Database (GBs):			</td> <td>$var2 GB</td> </tr>";
			echo "<tr> <td>Database Overhead (GBs):	</td> <td>$var3 GB</td> </tr>";
			echo "<tr> <td>Processor (MBs):			</td> <td>$var4 MB</td> </tr>";
			echo "<tr> <td>Processor Overhead(MBs):	</td> <td>$var5 MB</td> </tr>";
	
		echo "</table>"; 
		echo "</div>";
		
		echo "</br>";		
		echo "<div class=\"datagrid\">";
		echo "<table border=\"1\" width=\"100%\">";
		
			echo "<tr> <td colspan = \"2\" >Databases< Allocations/td>  </tr>";
			echo "<tr> <td>db_1</td> <td>$my_res_inuse[0] GB</td> </tr>";
			echo "<tr> <td>db_2</td> <td>$my_res_inuse[1] GB</td> </tr>";
			echo "<tr> <td>db_3</td> <td>$my_res_inuse[2] GB</td> </tr>";
			echo "<tr> <td>db_4</td> <td>$my_res_inuse[3] GB</td> </tr>";
			echo "<tr> <td>db_5</td> <td>$my_res_inuse[4] GB</td> </tr>";
	
		echo "</table>";
		echo "</div>";
		echo "</br>";
		
		echo "<div class=\"datagrid\">";
		echo "<table border=\"1\" width=\"100%\">";
		
			echo "<tr> <td colspan = \"2\" >Processors Allocations</td> </tr>";
			echo "<tr> <td>processors_1</td> <td>$my_pross_inuse[0] MB</td> </tr>";
			echo "<tr> <td>processors_2</td> <td>$my_pross_inuse[1] MB</td> </tr>";
			echo "<tr> <td>processors_3</td> <td>$my_pross_inuse[2] MB</td> </tr>";
			echo "<tr> <td>processors_4</td> <td>$my_pross_inuse[3] MB</td> </tr>";
			echo "<tr> <td>processors_5</td> <td>$my_pross_inuse[4] MB</td> </tr>";
	
		echo "</table>";
		echo "</div>";
	}
	
	else
		echo "not enough resources";
	
	
	
	echo "<h1>Available Database</h1>";
	echo "<div class=\"datagrid\">";			
	echo "<table border=\"1\" width=\"100%\">";
	$query="select * from resourses where 1";
	$run=mysql_query($query);
	
	echo "<thead>";
			echo "<th>Name</th> <th>Size</th> <th>In Use</th> <th>Speed</th> <th>Location</th>";
	echo "</thead>";
	
	$count = 0;
	while ($row=mysql_fetch_array($run))
	{
		
		
		$count++;
		echo $count%2==0?"<tr class=\"alt\">":"<tr>";
			echo "<td>$row[0]</td> <td>$row[1] GB</td> <td>$row[2] GB</td> <td>$row[3] MBps</td> <td>$row[4]</td>";
		echo "</tr>";
	}
	
	echo "</table>";
	echo "</div>";
	
	
	echo "<h1>Available Processor</h1>";
	echo "<div class=\"datagrid\">";
	
	
	echo "<table border=\"1\" width=\"100%\">";
	
	$query="select * from processors where 1";
	$run=mysql_query($query);
	
	echo "<thead>";
			echo "<th>Name</th> <th>Size</th> <th>In Use</th> <th>Speed</th>  <th>Location</th> ";
	echo "</thead>";
	
	$count = 0;
	while ($row=mysql_fetch_array($run))
	{
		
					$count++;
					echo $count%2==0?"<tr class=\"alt\">":"<tr>";
			echo "<td>$row[0]</td> <td>$row[1] MB</td> <td>$row[4] MB</td> <td>$row[2] Hz</td> <td>$row[3]</td> ";
		echo "</tr>";
	}
	
	echo "</table>";
	
	echo "</div>";
	
	
	
	mysql_close(mysql_connect($host,$username,$password));
	
?>