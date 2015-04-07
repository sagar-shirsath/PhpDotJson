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


5. The command format is as follows :


register:
localhost/Controller.php?command={"command":"register-user","mobile_number":"9911882211","name":"Tukaraam","occupation":2,"gender":1}


Add user details(Update user fields):
using mobile number
http://localhost/Controller.php?command={"command":"add-user-details","mobile_number":"9911882211","device_id":"3884uuwy","occupation":4}

using access token
http://localhost/PhpDotJson/Controller.php?command={"command":"add-user-details","access_token":"4021a93305cae68003d5f723ff82dd14-96dd1c32f539b4cff6a25c8b69ca36d7","device_id":"3884uuwy","occupation":4}
