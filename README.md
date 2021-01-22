Installation steps:

1.	Clone the repository

2.	Switch to the repo folder

3.	Install all the dependencies using composer

composer install

4.	Copy the example env file and make the required configuration changes in the .env file

cp .env.example .env

5.	Generate a new application key

php artisan key:generate

6.	Run the database migrations (Set the database connection in .env before migrating)

php artisan migrate

7.	Start the local development server

php artisan serve

You can now access the server at http://localhost:8000

