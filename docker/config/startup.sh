#!/bin/bash

a2enmod rewrite
service apache2 start
cd /var/www
chown -Rv www-data:www-data storage
npm run dev
