#!/bin/bash
cd $(dirname $0)

#Appending to the host file line with redirecting local page to localfile
if ! grep -q local.onlineslots.ca "/etc/hosts"; then
  STR=$'\n#Auto added by iTech docker setup\n127.0.0.1    local.onlineslots.ca'
  sudo echo "$STR"  | sudo tee -a /etc/hosts >/dev/null
fi

#Removing existing container
docker-compose rm -f
docker rm -f osca

cd .. && cd ..

#Remove the current CodeLibrary files that have all the site specific settings, views and models temporarily
rm -Rf CodeLibrary
rm -Rf node_modules

# Copy the CodeLibrary files we pulled down from the repo into the project
cp -rnp ../CodeLibrary/ CodeLibrary/

# Now we have all CodeLibrary files we can checkout the site specific CodeLibrary files to restore them
git checkout CodeLibrary

#Build docker compose with images from Dockerfile and force recreate
cd LOCAL_WORKING/Docker || exit;
env USER_ID="$(id -u)" docker-compose up --build -d || exit

# Install composer libraries
env USER_ID="$(id -u)" docker-compose exec --user=www-data -w /var/www/html/CodeLibrary osca composer install || exit

#Install database
env USER_ID="$(id -u)" docker-compose exec --user=www-data -w /var/www/html/LOCAL_WORKING/DatabaseScripts osca ./setupDB.sh || exit

# npm install
./exec npm install || exit

#Rebuild frontend with gulp
./exec npm run dev
