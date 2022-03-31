# Internal Applikasi En Ha

## Apa itu Internal Applikasi En Ha ?

Internal Applikasi En Ha merupakan sistem informasi internal TPQ & PonPes yang diharapkan dapat digunakan sebagai pesat data admistrasi PonPes & TPQ EnHa maupun yang lainnya. Sistem ini dibuat menggunakan freamwork  [CodeIgniter 4](http://codeigniter.com)

## Installation & updates

`git clone https://github.com/PonpesNurulHuda/internalApps.git` kemudian `composer update` 

## Setup

salin `env` menjadi `.env` dan sesuaikan untuk aplikasi Anda, khususnya baseURL dan pengaturan basis data apa pun.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Server Requirements

PHP version 7.3 atau lebih tinggi dibutuhkan, dan pastikan extensions berikut terinstall:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) jika anda berencana menggunakan HTTP\CURLRequest library

Tambahan, pastikan bahawa extensi ini diaktifkan di PHP anda

- json (diaktifkan umumnya - jangan dimatikan)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (diaktifkan umumnya - jangan dimatikan)
