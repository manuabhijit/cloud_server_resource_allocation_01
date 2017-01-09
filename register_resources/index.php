
<center><h1>Register to Cloud Services</h1></center>


<style>
body{background-image:url(bg.png)}.datagrid table{border-collapse:collapse;text-align:left;width:100%}.datagrid{font:normal 12px/150% Arial,Helvetica,sans-serif;background:#fff;overflow:hidden;border:2px solid #E5703D}.datagrid table td,.datagrid table th{padding:1px 10px}.datagrid table thead th{background:-webkit-gradient(linear,left top,left bottom,color-stop(0.05,#E5703D),color-stop(1,#E56739));background:-moz-linear-gradient(center top,#E5703D 5%,#E56739 100%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#E5703D',endColorstr='#E56739');background-color:#E5703D;color:#FFF;font-size:23px;font-weight:700;border-left:1px solid #E5703D}.datagrid table thead th:first-child{border:none}.datagrid table tbody td{color:#00496B;border-left:1px solid #E5703D;font-size:16px;font-weight:400}.datagrid table tbody .alt td{background:#E5D6D3;color:#00496B}.datagrid table tbody td:first-child{border-left:none}.datagrid table tbody tr:last-child td{border-bottom:none}.datagrid table tfoot td div{border-top:1px solid #E5703D;background:#E1EEF4}.datagrid table tfoot td{padding:0;font-size:18px}.datagrid table tfoot td div{padding:2px}.datagrid table tfoot td ul{margin:0;padding:0;list-style:none;text-align:right}.datagrid table tfoot li{display:inline}.datagrid table tfoot li a{text-decoration:none;display:inline-block;padding:2px 8px;margin:1px;color:#FFF;border:1px solid #E5703D;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;background:-webkit-gradient(linear,left top,left bottom,color-stop(0.05,#E56842),color-stop(1,#E5703D));background:-moz-linear-gradient(center top,#E56842 5%,#E5703D 100%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#E56842',endColorstr='#E5703D');background-color:#E56842}.datagrid table tfoot ul.active,.datagrid table tfoot ul a:hover{text-decoration:none;border-color:#E5703D;color:#FFF;background:none;background-color:#00557F}div.dhtmlx_window_active,div.dhx_modal_cover_dv{position:fixed!important}input[type=email]{width:100%;padding:12px 20px;margin:8px 0;box-sizing:border-box}input[type=text]{width:100%;padding:12px 20px;margin:8px 0;box-sizing:border-box}button{background-color:#4CAF50;border:none;color:#fff;padding:15px 32px;text-align:center;text-decoration:none;display:inline-block;font-size:16px;margin:4px 2px;cursor:pointer;width:100%}
</style>

<!-- HTML Form -->
<form action="reqister_me.php" method="POST">

<center>

<table>
	<tr>
		<!-- Saved as Primary Key -->
		<td style="font-size: 25px;">Email:</td>
		<td width="300px" ><input type="email" name="email" placeholder="Enter your email" required/></td>
		<td></td>
	</tr>
	
	<tr>
		<td style="font-size: 25px;">Database (GBs): </td>
		<td><input type="text" name="db1" placeholder="Enter your Database size" required/></td>
		<td>(Rs. 100 per GB)		</td>
	</tr>
	<tr>
		<td style="font-size: 25px;">Database Overhead (GBs): </td>
		<td><input type="text" name="db2" placeholder="Enter your Database Over Head" required/> </td>
		<td>(Rs. 500 per GB) </td>
	</tr>
	<tr>
		<td style="font-size: 25px;">Processor (MBs): </td>
		<td><input type="text" name="p1" placeholder="Enter your Processor size" required/> </td>
		<td>(Rs. 50 per MB)</td>
	</tr>
	<tr>
		<td style="font-size: 25px;">Processor Overhead(MBs):	</td>
		<td><input type="text" name="p2" placeholder="Enter your Processor Over Head" required> </td>
		<td>(Rs. 200 per MB) </td>
	</tr>
	<tr>
		<td style="font-size: 25px;">Days:</td>
		<td><input type="text" name="day" placeholder="Enter your Days" required/>
		<td>(Rs.10 per Day)</td>
	</tr>
	<tr style="padding-top: 50px;padding-buttom: 50px;">
		<td colspan='3' ><input id="name"type="checkbox" required> I accept the Terms and Conditions<br></td>
	</tr>
	<tr>
		<td colspan='3' ><input style="  	background-color: #E5703D; 
											border: none;
											color: white;
											padding: 15px 32px;
											text-align: center;
											text-decoration: none;
											display: inline-block;
											font-size: 16px;
											margin: 4px 2px;
											cursor: pointer;;
											width:100%"
											class="buttom" type="submit"> 	</td>
	</tr>
</table>

</div>
</center>
</form>





<?php
	
	// Database Connection
	$host="localhost";
	$username="root";
	$password="";
	$database="dill";
					
	mysql_connect($host,$username,$password);// Host server connected
	@mysql_select_db($database) or die( "Unable to select database"); // Select Database
	
	// Print Database Table
	echo "<h1>Available Database</h1>";
	
	echo "<div class=\"datagrid\">";			
	echo "<table border=\"1\" width=\"100%\">";
	$query="select * from resourses where 1"; //Select all
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
	
	// Print Processor Table
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