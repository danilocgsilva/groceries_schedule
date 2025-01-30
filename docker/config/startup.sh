#!/bin/bash

a2enmod rewrite
service apache2 start
npm composer dev
