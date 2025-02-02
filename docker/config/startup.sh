#!/bin/bash

a2enmod rewrite
service apache2 start
/usr/bin/composer -d /var/www dev
