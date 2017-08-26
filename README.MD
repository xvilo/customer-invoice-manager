# Customer invoice manager

Custom invoice manager is a small php application made from scratch. Why I made this application:

  - To keep track of my invoices.
  - To learn more about OOP PHP (and practice it)
  - Magic ✨

## Features

  - Twig templating
  - Inovice to PDF
  - Pay invoice online with stripe
  - Automatically e-mail invoices
  - Automatic payment reminders by e-mail
  - Automatic payment reminders by SMS (Twillio)
  - User management
  - Admin console

## Installation
1) From the command line:
```sh
$ git clone git@github.com:xvilo/customer-invoice-manager.git
$ composer install 
```
2) Copy `settings-sample.php` to `settings.php`
3) Edit settings.php accordingly
4) Set your http root to `public/`
