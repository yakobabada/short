Shorten url
=======================

Introduction
------------
- The application was created from scratch and structured using mvc and frontController design pattern.
- Simply, it creates short url from long url and  manager redirect operation from short url to long url.


Download and Installation
--------------------------- 
- using github to projects directory
  - `git clone https://github.com/yakobabada/short.git`

- create database `shortenUrl` and update connection parameters in `config/database.php` file

Web server setup
----------------

### Apache setup

To setup apache, setup a virtual host to point to the public/ directory of the
project and you should be ready to go! It should look something like below:

    <VirtualHost *:80>
        ServerName short.localhost
        DocumentRoot /path/to/short
        <Directory /path/to/short>
            DirectoryIndex index.php
            AllowOverride All
            Order allow,deny
            Allow from all
            <IfModule mod_authz_core.c>
            Require all granted
            </IfModule>
        </Directory>
    </VirtualHost>

Documentation
----------------
- Form to create short url: 
  - 'yourdomain.com/shorten'.
- Use output short url to make redirection.