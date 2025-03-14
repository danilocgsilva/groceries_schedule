#!/bin/bash

a2enmod rewrite
service apache2 start
composer install
npm install
composer dev

while : ; do sleep 1000; done
