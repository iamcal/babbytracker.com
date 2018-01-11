#!/bin/bash
ln -s /var/www/html/babbytracker.com/httpd.conf /etc/apache2/sites-available/babbytracker.com.conf
a2ensite babbytracker.com
service apache2 reload
