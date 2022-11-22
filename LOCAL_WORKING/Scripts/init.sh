#!/bin/bash

# Windows / Mac stack deploys only run bash
if [[ $1 = "startup" ]]
then	
	bash;
	exit 0;
fi

# start the services
# start apache
apachectl start;
# start blackfire probe
/etc/init.d/blackfire-agent start

# import the databases
cd /var/www/html/LOCAL_WORKING/DatabaseScripts;
./setupDB.sh;

# run composer, grunt and gulp
cd /var/www/html;
composer install;
cd /var/www/html/CodeLibrary;
composer install;
cd ..;
npm install;
grunt dev;
gulp;

# end the script by dropping to standard bash, unless it's being run as part of startup
if [[ $1 = "manual" ]]
then	
	exit 0;
fi
bash;
