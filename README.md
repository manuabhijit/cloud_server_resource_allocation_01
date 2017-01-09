# cloud_server_resource_allocation_01
Demonstration of resource allocation over cloud server via PHP and MySQL based Web Application.

#Languages and Frameworks

1. HTML
2. CSS 
3. Javascript
4. PHP

#Development Platforms and Softwares

1. Xampp
2. MySQL
3. Notepad++

#Note: 
    
    The software is optimized for Google Chrome 
    CSS has been compressed 


#Project Description:

   

# File Description 

1.register_resources->reqister_me.php

    Registers users with new email Id and allocates resources base on round robin algorithm.
		
		File Properties:
		1. Procedural Programming Approach
		2. First come first serve seat allocation system.
		3. My SQL Database 
		4. Clean Code
		
		No copy-rights reserved.
    
2.register_resources->index.php

    This page has front-end form to transfer data to register_resources->reqister_me.php.
    
3.check_availability->check_me.php

    This file checks if the requested amount of datatabase and pocessors are availabe with the cloud service.
    
    If server has availabiliy it prints the cost, else tells the message other wise.

4.check_availability->index.php

    This page has front-end form to transfer data to check_availability->check_me.php.
    
    
    
#Installation Steps

  Make sure you have PHP and MySQL Working (probably with Xampp).
  Unzip the folder in PHP server dirctory. 
  
  Create a database and import assets_sample_database -> demo_db.sql. This would create to tables.
  
  Also see assets_sample_database -> demo_db.sql in your text editor.
  
  Now open each php file and search for DB connection variables (You may need to change )
 
  $host="localhost";	$username="root";	$password=""; 		$database="< your db name>";
  
  The Web-Application should be up and running by now
  
	
