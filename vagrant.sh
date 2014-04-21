#!/usr/bin/env bash
# Vagrant install file for Laravel 4 Bootstrap Starter Site
# https://github.com/andrewelkins/Laravel-4-Bootstrap-Starter-Site
#
# Adapted from https://github.com/philipbrown/vagrant-laravel
#
# License: MIT

# ----------------
# Configure and Update the box
# ----------------
# Adds Repositories and then updates
echo '- Adding packages for nginx, nodejs, and php...'
# Add nginx repo
add-apt-repository -y ppa:nginx/stable
# Add latestest Node
add-apt-repository ppa:richarvey/nodejs
# Add PHP 5.4
add-apt-repository ppa:ondrej/php5
echo '...done'
echo '- apt-get update...'
apt-get update
echo '...done'

# ----------------
# Install Screen & Vim
# ----------------
echo '- Installing screen vim unzip curl wget build-essential...'
apt-get install screen vim unzip curl wget build-essential -y --force-yes
echo '...done'

# ----------------
# Git
# ----------------
echo '- Installing git...'
apt-get install git-core -y --force-yes
echo '...done'

# ----------------
# Python properties
# ----------------
echo '- Installing python properties...'
apt-get install python-software-properties -y --force-yes
echo '...done'

# ----------------
# Nginx
# ----------------
echo '- Installing nginx...'
# Install
apt-get install nginx -y --force-yes
# Symlink /vagrant to /var/www
mkdir /var/www
ln -fs /vagrant /var/www/laravel
# Setup hosts file
VHOST=$(cat <<EOF
server {
    listen 80 default_server;

    root /vagrant/public;
    index index.html index.htm index.php;

    server_name laravel.local localhost;

    access_log /var/log/nginx/localhost.laravel-access.log;
    error_log  /var/log/nginx/localhost.laravel-error.log error;

    charset utf-8;

    location / {
        # URLs to attempt, including pretty ones.
        try_files   \$uri \$uri/ /index.php?\$query_string;
    }

    # Remove trailing slash to please routing system.
    if (!-d \$request_filename) {
        rewrite     ^/(.+)/$ /$1 permanent;
    }

    # PHP FPM configuration.
    location ~* \.php$ {
            fastcgi_pass                    unix:/var/run/php5-fpm.sock;
            fastcgi_index                   index.php;
            fastcgi_split_path_info         ^(.+\.php)(.*)$;
            include                         /etc/nginx/fastcgi_params;
            fastcgi_param                   SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
    }

}
EOF
)
# Add nginx conf
echo "${VHOST}" > /etc/nginx/sites-available/laravel
# Remove default
sudo rm /etc/nginx/sites-enabled/default
# Create symlink
sudo ln -s /etc/nginx/sites-available/laravel /etc/nginx/sites-enabled/laravel
# Reload nginx
service nginx reload
echo '...done'

# ----------------
# PHP 5.4
# ----------------
# Add add-apt-repository binary
apt-get install -y python-software-properties --force-yes

echo '- Installing php...'
# PHP-FPM
apt-get install -y php5-fpm --force-yes
# Command-Line Interpreter
apt-get install -y php5-cli --force-yes
# MySQL database connections directly from PHP
apt-get install -y php5-mysql --force-yes
# cURL is a library for getting files from FTP, GOPHER, HTTP server
apt-get install -y php5-curl --force-yes
# Module for MCrypt functions in PHP
apt-get install -y php5-mcrypt --force-yes
echo '...done'
echo '- Restart php-fpm and nginx...'
# PHP-FPM and ngnix restart
service php5-fpm restart
service nginx restart
echo '...done'

# ----------------
# cURL
# ----------------
echo '- Installing curl...'
apt-get install -y curl --force-yes
echo '...done'

# ----------------
# Mysql
# ----------------
# Ignore the post install questions
debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password password password'
debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password_again password password'
# Install MySQL quietly
echo '- Installing mysql...'
apt-get -q -y install mysql-server-5.5 mysql-client-5.5 --force-yes
echo '...done'

# ----------------
# Node.js
# ----------------
echo '- Installing node...'
apt-get install nodejs npm -y --force-yes
echo '...done'

# Bower (Frontend Package Manager)
# ---
echo '- Installing bower...'
npm install -g bower
echo '...done'
echo '- Installing grunt...'
npm install -g grunt-cli
echo '...done'

# --------------
#  pip & HTTPie
# --------------
echo '- Installing pip...'
curl -s http://python-distribute.org/distribute_setup.py | python
easy_install pip >/dev/null
echo '...done'
echo '- Installing HTTPie...'
pip install --upgrade httpie >/dev/null
rm distribute-0.6.48.tar.gz
echo '...done'

# ----------------
# Install Composer
# ----------------
echo '- Installing composer...'
curl -s https://getcomposer.org/installer | php
# Make Composer available globally
mv composer.phar /usr/local/bin/composer
echo '...done'

# ----------------
# Install PHPUnit
# ----------------
echo 'Installing PHPUnit...'
pear channel-discover pear.phpunit.de
pear channel-discover components.ez.no
pear channel-discover pear.symfony-project.com
pear install phpunit/PHPUnit
echo '...done'

# ----------------
# Laravel stuff
# ----------------
# Load Composer packages
cd /var/www/laravel
composer install --dev
# Set up the database
echo "CREATE DATABASE IF NOT EXISTS laravel" | mysql -u root -ppassword
echo "CREATE USER 'user'@'localhost' IDENTIFIED BY 'password'" | mysql -u root -ppassword
echo "GRANT ALL PRIVILEGES ON laravel.* TO 'user'@'localhost' IDENTIFIED BY 'password'" | mysql -u root -ppassword
# Set up the database
php artisan migrate --env=local
# Seed db
php artisan db:seed --env=local
# Set key
php artisan key:generate
php artisan key:generate --env=local

# ----------------
# Finalize
# ----------------
# Set permissions
echo '- Set permissions...'
chgrp -R www-data /vagrant
chmod -R 777 /vagrant/app/storage
echo '...done'

# Notify
echo ''
echo ''
echo '----------------------------------------------'
echo ' Navigate to http://192.168.50.5 on host OS'
echo '----------------------------------------------'
echo ''
echo ' Emails sent will be written to the application logs.'
echo '      - This can be changed in app/config/local/mail.php'
echo ''
echo ''