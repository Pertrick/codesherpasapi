# codesherpasapi

A REST HTTP API web application for perfoming CREATE-READ-UPDATE-DELETE (CRUD) operation to manage customer data for a small shop using Laravel 8.

The REST API  have the following capabilities:

- Creating a new customer with the following attributes: name, surname, email and birthdate.
- Can get a single customer with all the attributes mentioned above.
- Can Get all customers. For each customer, having the information above. 
- Can update all the attributes (at once) of an existing customer mentioned above.
- Can delete an existing customer.

An sqlite database is used to persist/ store data. The database file can be found in "database" folder named "codesherpasapi".

Steps on How to Install Project.
- Clone project  into your local machine and open the folder in code editor or IDE
- Install Composer Dependency by running the command  “composer install” in your terminal.
- Install NPM Dependencies by running the command “npm install” in your terminal.
- Create a “.env” file and copy the content of .env.example into the newly created “.env” file.
- Generate an app encryption key by running the command “php artisan key:generate” in your terminal.
- Migrate the database by running the command “php artisan migrate”. 

- Run the command “php artisan serve” to run your project. The project is served on localhost:8000

 How to run project Test
 - The test file can be found in "tests/Feature" folder named "CustomerTest.php".
 - A unit Test is witten for each CRUD operation.  To run the test open your terminal, navigate to the project directory and run the command ".\vendor\bin\phpunit.bat".


HTTP ENDPOINTS.
- GET     api/v1/customers          show list of customers
- POST    api/v1/customer           create a new customer
- GET     api/v1/customer/1         show details of customer, id = 1
- PUT     api/v1/customer/1         update details of customer, id =1  
- DELETE  api/v1/customer/1         delete a customer of id = 1


