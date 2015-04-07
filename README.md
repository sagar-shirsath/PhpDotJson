# PhpDotJson
A Light weight framework for Services developed in PHP

Anyone can use it and modify it, it is open source come and join the community to enhance it.

What it does : Developing cross platform API (services) for backend support using php

Database support : Mysql

Getting Started:

1. Configure the database of live and local in Config.php

2. Create your service entry in the actions.xml file
example : suppose you want to write service for adding users details then in actions.xml 
  <add-user-details>
        <dir>Users</dir>
        <file>AddUserDetails.php</file>
        <class>AddUserDetails</class>
    </add-user-details>
    
Here "add-user-details" is the service name, AddUserDetails.php is the respective file name which is in Users directory
and AddUserDetails is the name of the class where we wil write the business logic.

3. extend the AppController class and write your code inside the execute method

4. At last return the response in the array format. which will be converted to the json format by the framework, and 
this is the actual response of the service.





