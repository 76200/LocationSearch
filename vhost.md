VirtualHost example configuration
=================================

    <VirtualHost *:80>
        ServerName localhost
        DocumentRoot /var/www/LocationSearch/web
        <Directory /var/www/LocationSearch/web>
            Options FollowSymLinks
            # enable the .htaccess rewrites
            AllowOverride All
            Order allow,deny
            Allow from All
        </Directory>
    </VirtualHost>
