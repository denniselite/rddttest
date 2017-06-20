The RDDT application client based on Yii 2 Framework
============================

Application implements a simple reddit-based site with topics.

It is a PHP client for REST API service (rddt-api), which contains a topic-management logic.

Each user is able to:

* Add a topic to storage;
* Vote up for the topic;
* Vote down for the topic;


IMPORTANT NOTES OF STRUCTURE
-------------------

      config/             contains application configurations
                          includes REST-API service credentials
      
      controllers/        contains Web controller classes
      models/             contains model classes
      
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources

REQUIREMENTS AND LAUNCH
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0.

Also, the Yii2 framework needs to use global required composer-asset-plugin.
~~~
php composer.phar global require "fxp/composer-asset-plugin:^1.3.1"
~~~

After this You should use:

~~~
php composer.phar install
~~~