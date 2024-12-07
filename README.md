# Simple Book Collection 

## Introduction
A simple book collection application where users can add, view, edit, and delete books.

## Requirements
•  PHP >= 8.2

•  Composer

•  Laravel >= 11.x

•  SQLite


## Installation

1. Clone the repository:

git clone https://github.com/ojoago/book_collection.git
cd book_collection

2. 
Install dependencies:

composer install


3. 
Copy the .env.example file to .env:

cp .env.example .env

4. 
Set up your database credentials in the .env file:

DB_CONNECTION=sqlite

5. 
create sqlite database file
touch database/database.sqlite

6. 
Generate an application key:

php artisan key:generate

Database Migration
Run the following command to migrate the database:

php artisan migrate --seed
6. npm install
Login Details
Default login details for testing purposes:
•  Admin Email: dhasmom01@gmail.com
•  Admin Password: 110011