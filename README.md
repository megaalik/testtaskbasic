RGK Group Test task on Yii 2
================================

Test Task of RGK Group

Используя basic шаблон проекта Yii2 написать небольшой тестовый
проект с авторизацией и ролями (админ и пользователь).
В проекте на основе системы событий Yii2 разработать систему
уведомлений, которая легко может подключаться к любым моделям.
Уведомления должны редактироваться админом (только админом) и иметь два типа: Email и Browser.

========================================

Обработка событий реализована через BootstrapInterface

TODO: сделать обработку параметров вставки в тебе и теле уведомления 

Затраченное время на проект 8 часов
Резюме https://hh.kz/resume/19345516ff0320bd110039ed1f617930684767
========================================
Installation
------

Create a project:

~~~
composer global require "fxp/composer-asset-plugin:~1.0.0"
composer create-project --prefer-dist --stability=dev zhan/rgkgroup-tz testtaskbasic
~~~

or clone the repository for `pull` command availability:

~~~
git clone https://github.com/megaalik/testtaskbasic.git project
cd project
composer global require "fxp/composer-asset-plugin:~1.0.0"
composer install
~~~

Init an environment:

~~~
php init
~~~

Fill your DB connection information in `config/common-local.php` and execute migrations:

~~~
php yii migrate
~~~

Sign up on site or create your first user manually:

~~~
php yii user/users/create
~~~

Init RBAC roles:

~~~
php yii rbac/init
~~~

Assign `admin` role to your user:

~~~
php yii roles/assign
~~~
