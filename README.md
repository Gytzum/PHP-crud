# PHP CRUD APPLICATION
![CSS-CODE](https://img.shields.io/badge/CSS-CODE-orange)
![HTML-CODE](https://img.shields.io/badge/HTML-CODE-blue)
![PHP-CODE](https://img.shields.io/badge/PHP-CODE-9cf)
![MYSQL-CODE](https://img.shields.io/badge/MYSQL-CODE-yellow)
![ORM-CODE](https://img.shields.io/badge/ORM-CODE-blueviolet)

## This is my third project built in PHP, using Doctrine/Orm library.

## CRUD APP features
* See the projects and employees on the data table
* Add new records
* Delete records 
* Edit button that allows change name and assign employees to project
* Routing between valid pages
* Invalid page url redirects you to 404 error page

## Requirements For Installation
* Integrated development environment (IDE) application
* MySQL WorkBench
* AMPPS or XAMMP
* Composer and Doctrine/ORM 

## Installation
* Clone repository to AMPPS or XAMPPS root folder 
* Create MySQL Connection with following information :
    * servername -> localhost  
    * username -> root  
    * password -> mysql  

* Create scheme with name **oop-crud**.
* Create .htaccess file outside cloned repository
  * Copy this code inside htaccess file 
  * Replace **PHP-oop-crud** to name as your cloned repository named in a third row of code below.  
  ```
  <IfModule mod_rewrite.c>
  RewriteEngine on
  RewriteCond %{ENV:REDIRECT_STATUS} ^$
  RewriteRule ^(.*)$ PHP-oop-crud/index.php/$1 [L]
  </IfModule>
  ```
* Open your (IDE) application and open cloned application
* Install Composer if you don't have one [Click here to install](https://getcomposer.org/doc/00-intro.md#installation-windows)
* Copy this lines by one to terminal and downlaod doctrine/orm library
```
  php ../composer.phar require doctrine/orm
  php ../composer.phar require symfony/cache
```
* Copy this code to terminal and create scheme tables
```
  vendor/bin/doctrine orm:schema-tool:update --force --dump-sql 
```
 * Open the path where you can launch php interpreter, e.g. http//localhost/
## Author
Gytautas [Github](https://github.com/Gytzum) , [LinkedIn](https://www.linkedin.com/in/gytautas-zumaras-4ab552210/)
