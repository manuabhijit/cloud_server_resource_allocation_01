<?php
	
	/* 
		This file checks if the requested amount of datatabase and pocessors are availabe with the cloud service.
		If server has availabiliy it prints the cost, else tells the message other wise.
	*/
	
	
	// Form Handling
	$var1=$_POST['email'];
	$var2=$_POST['db1'];
	$var3=$_POST['p1'];
	echo "$var1 has requested Database $var2 GB and Processor $var3 MB </br>";
	
	// Databse connectivity 
	$host="localhost";
	$username="root";
	$password="";
	$database="dill";
			
	mysql_connect($host,$username,$password);
	@mysql_select_db($database) or die( "Unable to select database");
	
	$query="select * from users where email='$var1'";
	$run=mysql_query($query);
	
	
	// Cost Calculation Algorithm.
	$db=0;  $p=0;
	$db_t=0; $p_t=0;
	while ($row=mysql_fetch_array($run))
	{
			$db=$row[1];
			$db_t=$row[2];
			
			$p=$row[3];
			$p_t=$row[4];
	}
	
	echo "<br> Cost Allocation:  </br>";
	
	if($var2 > intval($db) + intval($db_t))
	{	
		//echo $var2."  ".$db." ". $db_t;
		echo "</br> Database out of resources";
	}
	else if( $var2 > $db)
	{
		echo "Data_base Cost : ";
		echo ($db*100)+(($var2 - $db)*500)." Rs. <br>";
	}
	else
	{
		echo "Data_base Cost : ";
		echo $var2*500 ." Rs. <br>";
	}
	
	echo "</br>";
	if($var3 > $p + $p_t)
	{
		echo "</br> Processor out of resources";
	}
	else if( $var3 > $p)
	{
		echo "</br> Processor Cost : ";
		echo ($p*50)+(($var3 - $p)*200)." Rs. <br>";
	}
	else
	{
		echo "</br> Processor Cost : ";
		echo $var3*200 ." Rs. <br>";
	}
	
?>	
	