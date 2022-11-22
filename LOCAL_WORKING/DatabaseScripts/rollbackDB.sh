#!/usr/bin/env bash

#delete all site db users
mysql -u root -h tasks.db_net_management -e "drop user if exists 'onlineslots_ca'@'%';"
mysql -u root -h tasks.db_net_management -e "drop user if exists 'onlineslots_ca'@'localhost';"

#delete all site databases
mysql -u root -h tasks.db_net_management -e "drop database if exists onlineslots_ca_centralise;"
mysql -u root -h tasks.db_net_management -e "drop database if exists onlineslots_ca_site_information;"
mysql -u root -h tasks.db_net_management -e "drop database if exists onlinesl_geo;"
mysql -u root -h tasks.db_net_management -e "drop database if exists onlinesl_cljackpots;"
mysql -u root -h tasks.db_net_management -e "drop database if exists onlinesl_clgames_v2;"
mysql -u root -h tasks.db_net_management -e "drop database if exists onlinesl_games;"
mysql -u root -h tasks.db_net_management -e "drop database if exists onlinesl_jackpots;"
mysql -u root -h tasks.db_net_management -e "drop database if exists onlinesl_gatekeeper;"
mysql -u root -h tasks.db_net_management -e "drop database if exists onlinesl_feeds;"
mysql -u root -h tasks.db_net_management -e "drop database if exists onlinesl_plugin;"

# setup the permissions
mysql -u root -h tasks.db_net_management -e "flush privileges;"
