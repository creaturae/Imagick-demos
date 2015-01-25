
environment="centos_guest"

if [ "$#" -ge 1 ]; then
    environment=$1
fi

echo "environment is ${environment}";

#Run Composer install to get all the dependencies.
/usr/local/bin/php -d allow_url_fopen=1 /usr/sbin/composer install 

#cp imagick-demos.conf.php ../imagick-demos.conf.php
#Put some real values in the config

#Generate the config files for nginx, etc.
/usr/local/bin/php bin/cli.php configurate $environment

/usr/local/bin/php ./tool/weaveControls.php

#need to make dir?
mkdir -p ./var/cache
mkdir -p ./var/cache/less

chown -R imagickdemos ./var

#Generate the CSS
/usr/local/bin/php ./tool/compileLess.php