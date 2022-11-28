#!/bin/bash

# create all the site DB users
echo 'Adding users to DB...'
mysql -u root -h tasks.db_net_management -e "create user 'onlineslots_ca'@'localhost' identified by 'vUhaYtnsmfs6dJTu';"
mysql -u root -h tasks.db_net_management -e "create user 'onlineslots_ca'@'%' identified by 'vUhaYtnsmfs6dJTu';"

# create the site databases
echo 'Create DBs...'
mysql -u root -h tasks.db_net_management -e "create database onlinesl_geo;"
mysql -u root -h tasks.db_net_management -e "create database onlinesl_cljackpots;"
mysql -u root -h tasks.db_net_management -e "create database onlinesl_clgames_v2;"
mysql -u root -h tasks.db_net_management -e "create database onlinesl_games;"
mysql -u root -h tasks.db_net_management -e "create database onlinesl_jackpots;"
mysql -u root -h tasks.db_net_management -e "create database onlinesl_gatekeeper;"
mysql -u root -h tasks.db_net_management -e "create database onlinesl_feeds;"
mysql -u root -h tasks.db_net_management -e "create database onlinesl_plugin;"
mysql -u root -h tasks.db_net_management -e "create database onlineslots_ca_site_information;"
mysql -u root -h tasks.db_net_management -e "create database onlineslots_ca_centralise;"

# grant permissions
echo 'Granting permissions...'
mysql -u root -h tasks.db_net_management -e "GRANT ALL PRIVILEGES ON *.* TO 'onlineslots_ca'@'localhost';"
mysql -u root -h tasks.db_net_management -e "GRANT ALL PRIVILEGES ON *.* TO 'onlineslots_ca'@'%';"

# setup the permissions
echo 'Setting up permissions...'
mysql -u root -h tasks.db_net_management -e "flush privileges;"

# setup the geo system
echo 'onlinesl_geo loading to DB...'
mysql -u root -h tasks.db_net_management onlinesl_geo < ../../CodeLibrary/DatabaseScripts/GeoSystem/CreateGeoSystemDatabase.sql

# setup the site protection system
echo 'onlinesl_gatekeeper loading to DB...'
mysql -u root -h tasks.db_net_management onlinesl_gatekeeper < ../../CodeLibrary/DatabaseScripts/SiteProtectionSystem/CreateSiteProtectionDatabase.sql

# import the other dbs
echo 'onlinesl_cljackpots loading to DB...'
mysql -u root -h tasks.db_net_management onlinesl_cljackpots < ./onlinesl_cljackpots.sql
echo 'onlinesl_jackpots loading to DB...'
mysql -u root -h tasks.db_net_management onlinesl_jackpots < ./onlinesl_jackpots.sql
echo 'onlinesl_clgames_v2 loading to DB...'
mysql -u root -h tasks.db_net_management onlinesl_clgames_v2 < ./onlinesl_clgames.sql
echo 'onlinesl_games loading to DB...'
mysql -u root -h tasks.db_net_management onlinesl_games < ./onlinesl_games.sql
echo 'onlinesl_feeds loading to DB...'
mysql -u root -h tasks.db_net_management onlinesl_feeds < ./onlinesl_feeds.sql
echo 'onlinesl_plugin loading to DB...'
mysql -u root -h tasks.db_net_management onlinesl_plugin < ./onlinesl_plugin.sql
echo 'onlineslots_ca_site_information loading to DB...'
mysql -u root -h tasks.db_net_management onlineslots_ca_site_information < ./onlineslots_ca_site_information.sql
echo 'onlineslots_ca_centralise loading to DB...'
mysql -u root -h tasks.db_net_management onlineslots_ca_centralise < ./onlineslots_ca_centralise.sql

# start the internal PHP dev server before the user gets to execute the GeoSystem update script
#php -S localhost:8000  -t '../../'
