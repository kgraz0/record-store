Record Store Live Demo
----------------------

Main page of my record store is located at:

http://doc.gold.ac.uk/~kgraz001/dnw/record-store-kgraz001/index.php



Installation Instructions
-------------------------

In order to run the application, you need to upload the application to your web root folder,
then run the record-store.sql file on your database and then run dummy_data.sql file if you wish
to insert data into the database.



Configuration Instructions
--------------------------

If you wish to connect to your own database, you need to modify the includes/db_connect.php file
and change to details to your MySQL database.

Format is as follows:

'localhost'                - the database server
'your_username'            - your username
'your_password'            - your password
'database_name'            - the name of the database that will be used