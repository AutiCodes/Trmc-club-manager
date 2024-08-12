#!/bin/bash

# Go to project directory
cd /home/trmc/domains/club.trmc.nl/public_html

# Clean up caches
php artisan route:cache

php artisan cache:clear

# Clean up composer (still to figure out)
