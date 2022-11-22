#!/bin/bash

# create all the site DB users
mysql -u root -h tasks.db_net_management -e "create user 'onlineslots_ca'@'localhost' identified by 'vUhaYtnsmfs6dJTu';"
mysql -u root -h tasks.db_net_management -e "create user 'onlineslots_ca'@'%' identified by 'vUhaYtnsmfs6dJTu';"

# create the site databases
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
mysql -u root -h tasks.db_net_management -e "GRANT ALL PRIVILEGES ON *.* TO 'onlineslots_ca'@'localhost';"
mysql -u root -h tasks.db_net_management -e "GRANT ALL PRIVILEGES ON *.* TO 'onlineslots_ca'@'%';"

# setup the permissions
mysql -u root -h tasks.db_net_management -e "flush privileges;"

# setup the geo system
mysql -u root -h tasks.db_net_management onlinesl_geo < ../../CodeLibrary/DatabaseScripts/GeoSystem/CreateGeoSystemDatabase.sql

# setup the site protection system
mysql -u root -h tasks.db_net_management onlinesl_gatekeeper < ../../CodeLibrary/DatabaseScripts/SiteProtectionSystem/CreateSiteProtectionDatabase.sql

# import the other dbs
mysql -u root -h tasks.db_net_management onlinesl_cljackpots < ./onlinesl_cljackpots.sql
mysql -u root -h tasks.db_net_management onlinesl_jackpots < ./onlinesl_jackpots.sql
mysql -u root -h tasks.db_net_management onlinesl_clgames_v2 < ./onlinesl_clgames.sql
mysql -u root -h tasks.db_net_management onlinesl_games < ./onlinesl_games.sql
mysql -u root -h tasks.db_net_management onlinesl_feeds < ./onlinesl_feeds.sql
mysql -u root -h tasks.db_net_management onlinesl_plugin < ./onlinesl_plugin.sql
mysql -u root -h tasks.db_net_management onlineslots_ca_site_information < ./onlineslots_ca_site_information.sql
mysql -u root -h tasks.db_net_management onlineslots_ca_centralise < ./onlineslots_ca_centralise.sql

# start the internal PHP dev server before the user gets to execute the GeoSystem update script
#php -S localhost:8000  -t '../../'
