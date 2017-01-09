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
	
 Design

		The homepage is the registration page which enables the user to get registered to the various cloud services provided by the cloud user.

Registration page:

	The registration page contains the  following fields:

	E- mail : As the e – mail ids’ are always different so we can use e – mail ids’ to uniquely identify the users.

	The second and third if statements use the indexOf method to determine whether a string occurs within another string. For the e-mail address, you need to determine whether an @ symbol or a period occurs within the e-mail form field. If the value returned from the indexOfmethod is less than zero (or –1), the e-mail address is invalid, the validate function returns false, and focus is returned to the e-mail form field.

	Multiple if statements have a cascading effect. If the first if statement indicates that the e-mail address contains a value, the second ifstatement runs, and if the second if statement indicates that the e-mail address contains an @ symbol, the third if statement runs. If any of the three if statements indicate an invalid e-mail address, a message is displayed to the user, the validation function returns false, and the user is returned to the form with the Insertion Point in the Email field.

 Database: 

		This field takes the data from the user which tells that how much database the user requires in GBs . With this field the cost per GB is also specified.
		In our case, we are taking per GB cost as Rs 100. Validation is also applied to the field as :
		•The database size mentioned in the field should be a positive number without any floating point.
		•The database size entered should not be greater than the total space the cloud provider is left with or the space it is having in total.


Database Overhead :

	This field takes the data from the user which tells that how much database overhead the user can manage. With this field the cost per GB is also specified.

	In our case, we are taking per GB cost as Rs 500 ( It should be always greater than the normal cost assigned). Validation is also applied to the field as :
	•The database size mentioned in the field should be a positive number without any floating point.
	•The database size entered should not be as small as possible.

Processor:

	This field takes the data from the user which tells that how much processor space user requires in MBs .
	With this field the cost per GB is also specified.
	In our case, we are taking per GB cost as Rs 50.
	Validation is also applied to the field as :
	•The size mentioned in the field should be a positive number without any floating point.
	•The size entered should not be greater than the total space the cloud provider is left with or the space it is having in total.

Processor Overhead :

	This field takes the data from the user which tells that how much database overhead the user can manage. With this field the cost per GB is also specified.

	In our case, we are taking per GB cost as Rs 200 ( It should be always greater than the normal cost assigned). 
	Validation is also applied to the field as :
	•The size mentioned in the field should be a positive number without any floating point.
	•The size entered should not be as small as possible.

	Days :

	This field takes the data from the user about the number of days for which the user wants to reserve the space .
	With this field the cost per day is also specified.
	In our case, we are taking per day cost as Rs 10.


Model Development :

	For resource allocation, the resources are allocated in FIFo manner. FIFO is an acronym for first in, first out, a method for organizing and manipulating a data buffer, where the oldest (first) entry, or 'head' of the queue, is processed first. It is analogous to processing a queue with first-come, first-served (FCFS) behaviour: where the people leave the queue in the order in which they arrive.

	Load Balancing is a method to distribute workload across one or more servers, network interfaces, hard drives, or other computing resources. Typical datacenter implementations rely on large, powerful (and expensive) computing hardware and network infrastructure, which are subject to the usual risks associated with any physical device, including hardware failure, power and/or network interruptions, and resource limitations in times of high demand.  
	Load balancing in the cloud differs from classical thinking on load-balancing architecture and implementation by using commodity servers to perform the load balancing. This provides for new opportunities and economies-of-scale, as well as presenting its own unique set of challenges.  
	Load balancing is used to make sure that none of your existing resources are idle while others are being utilized. To balance load distribution, you can migrate the load from the source nodes (which have surplus workload) to the comparatively lightly loaded destination nodes.  
	When you apply load balancing during runtime, it is called dynamic load balancing Load balancing aims to optimize resource use, maximize throughput, minimize response time, and avoid overload of any single resource. Using multiple components with load balancing instead of a single component may increase reliability and availability through redundancy. Load balancing usually involves dedicated software or hardware. The load management is done using round robin method.

	Round Robin is a technique of load distribution, load balancing, or fault-tolerance provisioning multiple, redundant Internet Protocol service hosts, e.g., Web server, FTP servers, by managing the Domain Name System's (DNS) responses to address requests from client computers according to an appropriate statistical model.

	In its simplest implementation, Round-robin DNS works by responding to DNS requests not only with a single potential IP address, but with one out of a list of potential IP addresses corresponding to several servers that host identical services. The order in which IP addresses from the list are returned is the basis for the term round robin. With each DNS response, the IP address sequence in the list is permuted. Usually, basic IP clients attempt connections with the first address returned from a DNS query, so that on different connection attempts, clients would receive service from different providers, thus distributing the overall load among servers.
	There is no standard procedure for deciding which address will be used by the requesting application, a few resolvers attempt to re-order the list to give priority to numerically "closer" networks. Some desktop clients do try alternate addresses after a connection timeout of 30–45 seconds.
	Round robin DNS is often used to load balance requests between a number of Web servers. For example, a company has one domain name and three identical copies of the same web site residing on three servers with three different IP addresses. When one user accesses the home page it will be sent to the first IP address. The second user who accesses the home page will be sent to the next IP address, and the third user will be sent to the third IP address. In each case, once the IP address is given out, it goes to the end of the list. The fourth user, therefore, will be sent to the first IP address, and so forth.


   

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
  
	
