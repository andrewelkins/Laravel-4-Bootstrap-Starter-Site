#!/usr/bin/env bash

# Configurable variables
database='vagrant'
username='vagrant'
password='vagrant'

echo ''
echo ' ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~'
echo '  Bootstrapping Ubuntu Precise 32bit for Laravel 4'
echo ' ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~'
echo '        Apache 2.2.22, PHP 5.4, MySQL 5.5'
echo '      Vim, cURL, Git, Composer, pip, HTTPie'
echo ''
echo 'Created for Laravel 4 Starter Site'
echo ''
echo 'github.com/andrew13/Laravel-4-Bootstrap-Starter-Site'
# ---------------
#  Various fixes
# ---------------
echo '- Fixing locales issues with Ubuntu...'
dpkg-reconfigure locales >/dev/null
update-locale LANG=en_US.UTF-8

echo '- Configuring timezone to UTC...'
echo \"Europe/London\" | sudo tee /etc/timezone
dpkg-reconfigure --frontend noninteractive tzdata

# ------------------------
#  Update and basic tools
# ------------------------
echo '- Updating apt-get repositories...'
apt-get update >/dev/null
echo '...done'
# Install Vim
echo '- Installing vim...'
apt-get install -y vim >/dev/null
echo '...done'

# ---------
#  PHP 5.4
# ---------
echo '- Installing python-software-properties...'
apt-get install -y python-software-properties >/dev/null
echo '...done'
echo '- Adding PHP 5.4 PPA...'
add-apt-repository ppa:ondrej/php5 >/dev/null
echo '...done'
echo '- Updating apt-get repositories...'
apt-get update >/dev/null
echo '...done'
echo '- Installing PHP 5.4...'
apt-get install -y php5 >/dev/null
echo '...done'
echo '- Installing required PHP modules for Laravel 4...'
apt-get install -y php5-mcrypt >/dev/null
apt-get install -y php5-mysql >/dev/null
apt-get install -y php5-curl >/dev/null
echo '...done'

# ---------------
#  Apache 2.2.22
# ---------------
echo '- Installing Apache 2...'
apt-get install -y apache2 >/dev/null
echo "ServerName localhost" > /etc/apache2/httpd.conf
echo '...done'
echo '- Enabling Apache 2 mod_rewrite...'
a2enmod rewrite >/dev/null
# Restart apache
service apache2 restart >/dev/null
echo '...done'
echo '- Setting up Apache 2 virtual host...'
# Remove /var/www
rm -rf /var/www
# Symlink /vagrant to /var/www
ln -fs /vagrant /var/www
# Remove default virtual host file
a2dissite default >/dev/null
rm /etc/apache2/sites-available/default
# Setup new virtual host file
VHOST=$(cat <<EOF
<VirtualHost *:80>
	ServerName localhost
  	DocumentRoot /var/www/public
  	<Directory />
        Options FollowSymLinks
        AllowOverride All
    </Directory>
	<Directory /var/www/public/>
		Options Indexes FollowSymLinks MultiViews
        AllowOverride All
        Order allow,deny
        allow from All
	</Directory>
	ScriptAlias /cgi-bin/ /usr/lib/cgi-bin/
    <Directory "/usr/lib/cgi-bin">
        AllowOverride All
        Options +ExecCGI -MultiViews +SymLinksIfOwnerMatch
        Order allow,deny
        Allow from all
    </Directory>
	ErrorLog ${APACHE_LOG_DIR}/error.log
	LogLevel warn
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
EOF
)
echo "${VHOST}" > /etc/apache2/sites-available/default

# Enable the new virtual host
a2ensite default >/dev/null
service apache2 reload >/dev/null
echo '...done'

# -----------
#  MySQL 5.5
# -----------
echo '- Installing MySQL...'
# Ignore the post install questions
export DEBIAN_FRONTEND=noninteractive
# Install MySQL quietly
apt-get -q -y install mysql-server >/dev/null
echo '...done'

# ------
#  cURL
# ------
echo '- Installing cURL...'
apt-get install -y curl >/dev/null
echo '...done'

# -----
#  Git
# -----
echo '- Installing Git...'
apt-get install -y git-core >/dev/null
echo '...done'

# ----------
#  Composer
# ----------
echo '- Installing Composer...'
curl -s https://getcomposer.org/installer | php
# Make Composer available globally
mv composer.phar /usr/local/bin/composer
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

# -------------
#  Final setup
# -------------
# Add aliases
sed -i '$a alias art="php artisan"' /home/vagrant/.bashrc
# Create script for python smtpd
SMTPD=$(cat <<EOF
#!/usr/bin/env bash
echo ''
echo 'Starting Python SMTP daemon...'
echo 'Listening to port 25'
echo 'Outgoing emails will display in this session'
echo 'Ctrl-C to quit'
sudo python -m smtpd -n -c DebuggingServer localhost:25
EOF
)
echo "${SMTPD}" > /usr/local/bin/pysmtpd
chmod +x /usr/local/bin/pysmtpd

# Create script for quick install
STARTER=$(cat <<EOF
#!/usr/bin/env bash
echo ''
echo 'Will run composer install --dev'
echo 'Then migrate and seed the databases'
echo ''
cd /vagrant
composer install --dev
php artisan migrate
php artisan db:seed
echo ''
echo 'Laravel Project Ready!!!'
echo ''
echo '----------------------------------------------'
echo ' Navigate to http://127.0.0.1:8080 on host OS'
echo '----------------------------------------------'
EOF
)
echo "${STARTER}" > /usr/local/bin/install-laravel
chmod +x /usr/local/bin/install-laravel

# Set up the database
echo "CREATE DATABASE IF NOT EXISTS $database" | mysql
echo "CREATE USER '$username'@'localhost' IDENTIFIED BY '$password'" | mysql
echo "GRANT ALL PRIVILEGES ON $database.* TO '$username'@'localhost' IDENTIFIED BY '$password'" | mysql