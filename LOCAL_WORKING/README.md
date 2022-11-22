##Running OnlineSlots.ca locally


###Webserver Requirements

Apache 2.4 or higher.
   
Required Apache Modules:

* ssl (enable mod_ssl)
* rewrite (enable mod_rewrite)
* headers (enable mod_headers)
* expires (enable mod_expires)
* deflate (enable mod_deflate)
* filter (enable mod_filter)

###PHP Requirements

PHP 7.0 or higher. Functions from deprecated or discontinued extensions like the mysql extension (http://php.net/manual/en/ref.mysql.php)
will result in runtime exceptions. A simple search for "mysql_connect" within the site code will reveal it is being used or not.     

Required PHP extensions:

* gd
* zip
* xml
* PDO
* mysqli
* curl
* intl
* enable short open tags (**short_open_tag = On**) in the php.ini file as a lot of older pages are still using them. 

###Other Requirements

* Node.js runtime and npm (Node Package Manager) - they are usually shipped together
* grunt (js build tool)
* **Windows users:** install Git-Bash for Windows


###Getting the site to run
1. Clone the site repository into the folder specified in your virtual host config.

2. Clone the CodeLibrary repository into a separate folder but outside the site's root folder. 

3. Delete the entire **.git** folder within the CodeLibrary folder using the command
   
        rm -Rf .git
    
   Double check that the folder has actually been removed. This is to prevent you from accidentally making and committing changes
   to this repository which might potentially break all dependent sites.

4. Now you are going to copy the entire CodeLibrary into the site's CodeLibrary folder while **not overriding** common files that are already
   in place. These are in one form or another, settings files that are specific to this site.  Navigate into the root folder of the site and 
   run the following command.
   
        ./UpdateCodeLibrary.sh
   
 
5. Setup a virtual host for the site using the sample virtual host file for reference purposes but adapted to your preferences and dev environment. 
   The file is located in
   
        {site-root-folder}/LOCAL_WORKING/ApacheConf/virtual-host.conf
   
   Re-validate the server configuration by running one of the following commands:
   
        Linux, Mac OSX: apachectl -t
        Windows: C:\{path-to-apache-bin-folder}\httpd.exe -t
   
   **Restart Apache for the virtual host config to be loaded.**
    
6. Locate your local hosts file
   
        Linux, Mac OSX, Unix: /etc/hosts
        Windows: c:\windows\system32\drivers\etc\hosts
   
   Add a local dns entry for the new local domain by appending the hosts file with the following
   
        127.0.0.1   local.onlineslots.ca
   

7. Navigate to the site root folder and run the following commands to build static asserts and invalidate the cache.
        
        npm install
        grunt dev
   

8. From within the site root, create a symlink to Games.js within the CodeLibrary in sources/Js with the following command
   
        ln -s ../../CodeLibrary/Javascript/Games.js Sources/Js/games.js
        
9. Run the following bash script to setup the site's databases and database users
   
        {site-root-folder}/LOCAL_WORKING/DatabaseScripts/setupDB.sh
   
   **Windows users:** add the mysql bin folder to your systems path else this script will fail. Administrator priviledges
   are required to alter the system environment variables. As an example here is how you do that on Windows 10:
        
        1. Open Windows Explorer
        2. Right click on 'This PC' and select 'properties'
        3. In the window that opens, click on 'Advanced System Settings' on the left.
        4. In the second window that opens, click on 'Environment Variables' 
        5. In the bottom half of the window that opens, labeled 'System variables', locate the variable named 'Path' and click 'Edit'
        6. Click 'New' in the window that opened.
        7. Provide the full path to the mysql bin folder and hit the 'enter' key on your keyboard then click 'OK'
        8. Close all the previously opened windows.
        9. Open a new Git-Bash window
        10. Type 'which mysql' and Git-Bash should display the location of mysql.exe which means it is now recognized as a command.    
      
11. The local site should be ready now to use.
