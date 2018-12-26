Instagram

composer install
php artisan migrate
php artisan db:seed
php artisan serve

postman 

POST http://127.0.0.1:8000/api/image body->form-data

path (change to file type) - *image* 
name - Name
description - Description
user_id - 8
filter[contrast][brightness] - 65