# smartpoint
# Installation

Downloaded Laravel v8.75

cp .env.example .env

composer update

php artisan key:generate

DB Configuration in environment file

Created model and migration files for Employee & history
php artisan make:model Employee -m

Migrated to the database called laravel_task

# created a console command using artisan 

php artisan make:command CreateEmployeeCommand
php artisan make:command DeleteEmployeeCommand
php artisan make:command EmployeeDetailCommand

changed the signature in to respective command name in Console & Added Description to view in php artisan list

passed parameted in employee:create to set dynamic emp_datas in database return last inserted json table data

set data via command line interface

# Softdeletes

for softdelete action , first import the softdelete in namespace and use it

Create alter migration file  php artisan make:migration add_deleted_at_to_employees_table

unset the employees and their histories

# Fetch Data

Data fetched by passing ip_address in console command using relation fetched employee and their respective history datas




