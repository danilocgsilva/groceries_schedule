#!/bin/bash

a2enmod rewrite
service apache2 start
cd /var/www
composer dev
