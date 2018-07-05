# OpenClassroom - PHP/Symphony Developer 
# Project 5 _ Blog from Scratch

## Link of the Path
 ```
 https://openclassrooms.com/paths/59-developpeur-dapplication-php-symfony
 ```
 
## Languages used :
 html 5, CSS 3, Javascript, jQuery, PHP, MySQL
 
## Getting Started :
  These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.
 
## Prerequisites :
  For Windows you need a web development environment, like wampServer.
  Link and installation instructions available here 
  ```
  http://www.wampserver.com/en/
  ```

## Installing :
 Download and unzip on your folder choice this repository 
 ```
 https://github.com/jbaptisteq/OC_P5/archive/master.zip
 ```
 Execute phpmyadmin and create a new database, import p5jbq.sql on your database for install with a demo-version dataset.
 
 Open file model/manager.php on line 10, use your own dbname, login and pass
 ```
 10  $db = new \PDO('mysql:host=localhost;dbname=p5jbq;charset=utf8', 'root', '');
 ```
 You can now use blog by running file view/index.php
 This dataset have an admin account and a user account for test.
 ```
 *Administrator
 login : admin password : admin
 *User
 login : user password : user
 ```
 Dont forget to change this or create your own testing account on view/register.php, or directly in user (table) on database.
 
## Feature :
* Create Account
* post/edit/delete Articles
* post/validate/delete Comments
* administration panel for management

## Built with
* [ATOM](https://atom.io/) - Code
* [WAMP](http://www.wampserver.com/en/) - Database management
