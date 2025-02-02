#!/bin/bash

chown -Rv www-data:www-data /var/www/storage
mysql -uroot -p$DATABASE_PASS -hgroceries_schedule_db -e "CREATE DATABASE groceries_schedule;"
mysql -uroot -p$DATABASE_PASS -hgroceries_schedule_db -e "CREATE DATABASE groceries_schedule_test;"
php /var/www/artisan migrate
