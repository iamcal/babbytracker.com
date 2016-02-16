## Installation

    cd /var/www/html
    git clone git@github.com:iamcal/babbytracker.com.git babbytracker.com
    ln -s /var/www/html/babbytracker.com/httpd.conf /etc/apache2/sites-available/babbytracker.com.conf
    a2ensite babbytracker.com
    service apache2 reload
