<?php

// Mysql database connection settings
$settings[db][host] = "localhost"; // MySQL database Host, usually 'localhost'
$settings[db][username] = "onlinesl_chris"; // MySQL username
$settings[db][password] = "aKmaJCkaU6"; // MySQL password
$settings[db][database] = "onlinesl_games"; // MySQL database

// Admin Panel settings
$settings[admin][filename] = "index.php"; // Name of Admin Panel File.
$settings[admin][password] = "Qwerty!!123"; // Admin Panel Password.
$settings[admin][security] = "#@%NJFS(786SDF)(#%#%(HDSFSDFJ(*SDY&SDF"; // Random salt to add to cookie Hash

// Admin Panel restricted access by IP
$settings[admin][restricted_access] = true; // Set to true or false. Use true to restrict access to a selected range of IP's only
$settings[admin][allowed_ip] = array("83.163.126.164", "68.114.247.124", "94.169.171.106", "70.208.141.230", "62.199.149.139", "78.111.198.196"); // add IP addresses that should be allowed to login to the Admin Panel.

// Image upload settings
$settings[upload][allowed_extensions] = array("gif", "jpg", "jpeg", "png"); // image extensions that are allowed
$settings[upload][max_kilobytes] = 4096; // Maximum file size in kilobytes
// CHMOD The directory below to 777.
$settings[upload][server_path] = "/home/onlinesl/public_html/assets/games/uploads/"; // The server path to the upload directory
$settings[upload][http_link] = "/assets/games/uploads/"; // The public http link to the server path
?>
