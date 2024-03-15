# Random number generator

![Project Image](project-image.png)

Brief project description.

## Task Description

The task invprojectolved creating a PHP web page (`index.php`) with a button that triggers a JavaScript function to make an AJAX POST request to an API endpoint (`api.php`). The API endpoint communicates securely with another PHP file (`random.php`) using cURL to generate a random number and return it as a JSON response to the JavaScript function, which then displays it on the webpage.

## Requirements

- PHP 7.4 or higher

## Installation

1. Clone the repo into your document root (www, htdocs, etc)
2. Create a database called `workopia`
3. Import the `workopia.sql` file into your database
4. Rename `config/_db.php` to `config/db.php` and update with your credentials
5. Run `composer install` to set up the autoloading
6. Set your document root to the `public` directory


## Directory Structure

- `index.php`: Main PHP web page with the button to generate a random number.
- `api.php`: Backend API endpoint to handle AJAX POST requests and communicate with `random.php`.
- `random.php`: PHP file to generate a random number between 1 and 99.


## Setting the Document Root

You will need to set your document root to the `public` directory. Here are some instructions for setting the document root for some popular local development tools:

#### PHP built-in server

If you are using the PHP built-in server, you can run the following command from the project root:

`php -S localhost:8000 -t public`

#### XAMPP

If you are using XAMPP, you can set the document root in the `httpd.conf` file. Here is an example:

```conf
DocumentRoot "C:/xampp/htdocs/workopia/public"
<Directory "C:/xampp/htdocs/workopia/public">
```

#### MAMP

If you are using MAMP, you can set the document root in the `httpd.conf` file. Here is an example:

```conf
DocumentRoot "/Applications/MAMP/htdocs/workopia/public"
<Directory "/Applications/MAMP/htdocs/workopia/public">
```

#### Laragon

If you are using Laragon, you can set right-click the icon in the system tray and go to `Apache > sites-enabled > auto.workopia.test.conf`. Your file may be named differently.

You can then set the document root. Here is an example:

```conf
<VirtualHost *:80>
    DocumentRoot "C:/laragon/www/workopia/public"
    ServerName workopia.test
    ServerAlias *.workopia.test
       <Directory "C:/laragon/www/workopia/public">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

## Dependencies

- jQuery 3.5.1: Included via a CDN link in the `<head>` section of `index.php`.

