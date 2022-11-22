<?
// Games Admin
// By Dirkjan Tijs - dirkjan.tijs@gmail.com

// Include settings
require_once("config.php");

// Get some vars
if(isset($_GET['action'])) { $action = $_GET['action']; }
if(isset($_GET['id'])) { $id = $_GET['id']; }
if(isset($_GET['submit'])) { $submit = $_GET['submit']; }
if(isset($_GET['success'])) { $success = $_GET['success']; }
if(isset($_COOKIE['login'])) { $login = $_COOKIE['login']; }
if(isset($_COOKIE['country'])) { $country = $_COOKIE['country']; $countryname = $settings[countries][$country]; } else { $countryname = "Logged Out"; }
$file = $settings[admin][filename];

// Backend layout
$template[style] = ".disabled{background:#ddd!important;}body{background:#fff;font-family:arial, serif;font-size:12px;}a{color:#00f;}h1{width:950px;text-align:left;font-size:18px;margin:10px auto;}h1 a{color:#c00;text-decoration:none;}.container{width:950px;border:1px solid #e5e5e5;background:#f5f5f5;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;margin:0 auto;padding:0 0 20px;}.tabs{width:950px;text-align:right;margin:0 auto;}.tabs li{display:inline;float:left;background:#999;border:1px solid #888;border-bottom:3px solid #888;border-top-left-radius:3px;border-top-right-radius:3px;margin:0 10px 0 0;}.tabs li:hover{background:#888;border-color:#777;}.tabs a{display:block;text-decoration:none;font-size:14px;font-weight:700;color:#fff;padding:5px 10px;}h2{font-size:16px;border-bottom:1px dotted #c5c5c5;margin:20px 20px 0;}p{font-size:13px;margin:10px 20px 0;}p.success{background:#0a0;color:#fff;font-weight:700;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px;padding:3px 5px;width:910px;}table{min-width:400px;margin:20px auto 20px;}table td{border-bottom:1px solid #fff;padding:3px;}table thead td{font-size:14px;font-weight:700;background:#bbb;}table tbody td{font-size:13px;padding: 6px;}table tbody .odd{background:#eee;}table tbody td a{color:#000;}table tbody .even{background:#ddd;}a.edit{background:#333;color:#fff;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px;text-decoration:none;font-weight:700;margin:4px;padding:2px 4px;}a.delete{background:#c00;color:#fff;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px;text-decoration:none;font-weight:700;margin:4px;padding:2px 4px;}.field{width:550px;margin:20px;padding:4px;}.field span{width:240px;text-align:right;float:left;font-weight:700;margin-top:6px;}.field span strong{color:#c00;}.field input,.field select{float:right;width:300px;border:1px solid #777;background:#fff;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px;color:#000;padding:3px;}.field input.submit{background:#333;color:#fff;font-weight:700;width:180px;border-color:#111;}";
$template[header] = "<html><head><script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js\"></script><title>{title} - Games Admin</title></head><style type=\"text/css\">{style}</style><body><h1><a href=\"$file\">&raquo; Games Admin</a> <a style=\"color: #0000ff\" href=\"".$settings[admin][filename]."?action=logout\">(Log Out)</a></h1><ul class=\"tabs\"><li id=\"tab_games\"><a href=\"$file\">Games</a></li><li id=\"tab_gameproviders\"><a href=\"$file?action=providers\">Game Providers</a></li><li id=\"tab_gametypes\"><a href=\"$file?action=gametypes\">Game Types</a></li><li id=\"tab_imagetypes\"><a href=\"$file?action=imagetypes\">Image Types</a></li></ul><div style=\"clear: both\"></div><div class=\"container\"><h2>{title}</h2>";
$template[footer] = "</div></body></html>";
$template[header] = str_replace("{style}", $template[style], $template[header]);

// Functions
function shortenstring($a, $b) { if(strlen($a) > $b+2) return substr($a, 0, $b).".."; else return $a; }
function safetext($a) { return htmlentities(utf8_decode($a)); }
function errorfunction($a, $b=false) { global $template; global $file; if($b == true) echo preg_replace("!<ul.*?</ul>!i", "", str_replace("(Log Out)", "", str_replace("{title}", "An error occured...", $template[header]))); else echo str_replace("{title}", "An error occured...", $template[header]); echo "<p>".$a." <a href=\"".$file."\">Go home</a>.</p>".$template[footer]; die(); }
function resize_image($path, $file, $width, $height, $final)
 {
 require_once("resize_images.php");
 $image = new Zebra_Image();
 $image->source_path = $path.$file;
 $image->target_path = $path.$final;
 $image->jpeg_quality = 100;
 $image->enlarge_smaller_images = true;
 $image->preserve_time = true;
 if(!$image->resize($width, $height, ZEBRA_IMAGE_CROP_CENTER))
  {
  return false;
  }
 else
  {
  return true;
  }
 }

// Initiate database connection
$db = new PDO("mysql:host=".$settings[db][host].";dbname=".$settings[db][database], $settings[db][username], $settings[db][password]);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

//check login
if($login !== md5($settings[admin][password].$settings[admin][security])) { $action = "login"; }
if($settings[admin][restricted_access] AND !in_array($_SERVER['REMOTE_ADDR'], $settings[admin][allowed_ip])) { errorfunction("You don't have access to this page.", true); }

if($action == "")

// --------------------- //
//   START GAMES ADMIN   //
// --------------------- //
 {
 // start games main
 try{
  $query = $db->prepare("SELECT games.id AS g_id, providers.id AS p_id, gametypes.id AS t_id, games.name AS g_name, providers.name AS p_name, gametypes.name AS t_name, games.gamelink AS link, games.image_url AS image_url, games.image_width AS width, games.image_height AS height, games.image_name AS image_name FROM games, providers, gametypes WHERE games.provider_id = providers.id AND games.type_id = gametypes.id ORDER BY games.id ASC");
  //var_dump($query); exit();
  $query->execute(); 
 }catch(PDOException $e) { errorfunction("A database error occured."); }
 echo str_replace("{title}", "Manage Games", $template[header]);
 echo "<style>#tab_games{background: #c00;border-color: #a00;}</style>";
 if(strlen($success) > 0) { echo "<p class=\"success\">".safetext($success)."</p>"; }
 echo "<p style=\"text-align: center\"><strong><a href=\"".$file."?action=game_new\">Add a new game</a></strong></p><p style=\"clear: both\"></p>";
 echo "<table style=\"width: 800px\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><thead><tr><td>ID</td><td>Name</td><td>Game Link</td><td>Image</td><td>Game Provider</td><td>Game Type</td><td width=\"100\" style=\"text-align: center\">Options</td></tr></thead><tbody>";
 $class="odd";
 while($show = $query->fetch(PDO::FETCH_ASSOC))
  {
  if(strlen($show[image_url]) > 1) { $image = "<a href=\"".$show[image_url]."\" target=\"_blank\" title=\"View image\">".$show[width]."px * ".$show[height]."px (".$show[image_name].")</a>"; } else { $image = "none"; }
  echo "<tr class=\"".$class."\"><td>".$show[g_id]."</td><td>".safetext($show[g_name])."</td><td><a href=\"".safetext($show[link])."\" target=\"_blank\" title=\"Visit game link\">".shortenstring(safetext($show[link]), 25)."</a></td><td>".$image."</td><td>".safetext($show[p_name])."<td>".safetext($show[t_name])."</td><td style=\"text-align: center\"><a class=\"edit\" href=\"".$file."?action=game_edit&id=".$show[g_id]."\" title=\"Edit ".safetext($show[g_name])."\">edit</a><a class=\"delete\" href=\"".$file."?action=game_delete&id=".$show[g_id]."\" title=\"Delete ".safetext($show[g_name])."\">delete</a></tr>";
  if($class=="odd") $class="even"; else$class="odd";
  }
 if($query->rowCount() == 0)
  {
  echo "<tr class=\"odd\"><td colspan=\"15\" style=\"text-align: center\">No records found.</td></tr>";
  }
 echo "</tbody></table>";
 echo "<p style=\"text-align: center\"><strong><a href=\"".$file."?action=game_new\">Add a new game</a></strong></p><p style=\"clear: both\"></p>";
 echo $template[footer]; 
 // end games main
 }
elseif($action == "game_new")
 {
 // start adding a new game
 if($submit == "true")
  {
  if(isset($_POST['name'])) $name = $_POST['name'];
  if(isset($_POST['gamelink'])) $gamelink = $_POST['gamelink'];
  if(isset($_POST['provider'])) $provider = $_POST['provider'];
  if(isset($_POST['gametypes'])) $gametypes = $_POST['gametypes'];
  if(isset($_POST['upload'])) { $upload = $_POST['upload']; }
  if($name == "" || $gamelink == "")
   {
   errorfunction("You left some required fields blank. <a href=\"javascript:history.go(-1)\">Go back</a>.<style>#tab_games{background: #c00;border-color: #a00;}</style>");
   }
  try{
   $query = $db->prepare("SELECT * FROM providers WHERE id = (:id) LIMIT 0,1");
   $query->bindParam(":id", $provider);
   $query->execute();
  }catch(PDOException $e) { errorfunction("A database error occured."); }
  if($query->rowCount() == 0)
   {
   errorfunction("You did not select a valid game provider. <a href=\"javascript:history.go(-1)\">Go back</a>.<style>#tab_games{background: #c00;border-color: #a00;}</style>"); 
   }
   try{
   $query = $db->prepare("SELECT * FROM gametypes WHERE id = (:id) LIMIT 0,1");
   $query->bindParam(":id", $gametypes);
   $query->execute();
  }catch(PDOException $e) { errorfunction("A database error occured."); }
  if($query->rowCount() == 0)
   {
   errorfunction("You did not select a valid game type. <a href=\"javascript:history.go(-1)\">Go back</a>.<style>#tab_gametypes{background: #c00;border-color: #a00;}</style>"); 
   }

  try{
   $query = $db->prepare("SELECT * FROM imagetypes WHERE id = (:id) LIMIT 0,1");
   $query->bindParam(":id", $upload);
   $query->execute();
  }catch(PDOException $e) { errorfunction("A database error occured."); }
  if($query->rowCount() == 1)
   {
   //upload and resize image
   $show = $query->fetch(PDO::FETCH_ASSOC);
   $img_url = "";
   $img_width = $show[width];
   $img_height = $show[height];
   $img_name = $show[name];
   if($_FILES[image][name] == "" || $_FILES[image][error] !== 0 || $_FILES[image][size] == 0)
    {
    errorfunction("You forgot to upload an image. <a href=\"javascript:history.go(-1)\">Go back</a>.<style>#tab_games{background: #c00;border-color: #a00;}</style>");  
    }
   if($_FILES[image][size] > ($settings[upload][max_kilobytes]*1024))
    {
    errorfunction("This image is ".round(($_FILES[image][size]/1024), 2)." KB, which is larger than the maximum of ".$settings[upload][max_kilobytes]." kilobytes. <a href=\"javascript:history.go(-1)\">Go back</a>.<style>#tab_games{background: #c00;border-color: #a00;}</style>");  
    }
   if(!in_array(strtolower(substr(strrchr($_FILES[image][name],'.'),1)), $settings[upload][allowed_extensions]))
    {
    errorfunction("This file type is not allowed. <a href=\"javascript:history.go(-1)\">Go back</a>.<style>#tab_games{background: #c00;border-color: #a00;}</style>");  
    }
   $temp_name = "temp_".date("U")."_".rand(10,99).".".strtolower(substr(strrchr($_FILES[image][name],'.'),1));
   $final_name = date("U").rand(10,99).".jpg";
   if(!move_uploaded_file($_FILES[image][tmp_name], $settings[upload][server_path].$temp_name))
	  {
    errorfunction("Something went wrong while uploading the file. Make sure the directory is configured correctly in the config file, and the folder is chmodded 777. <a href=\"javascript:history.go(-1)\">Go back</a>.<style>#tab_games{background: #c00;border-color: #a00;}</style>");  
    }
   if(resize_image($settings[upload][server_path], $temp_name, $img_width, $img_height, $final_name))
    {
    $img_url = $settings[upload][http_link].$final_name;
    unlink($settings[upload][server_path].$temp_name);
    }
   else
    {
    errorfunction("Something went wrong while resizing the file. <a href=\"javascript:history.go(-1)\">Go back</a>.<style>#tab_games{background: #c00;border-color: #a00;}</style>");  
    }
   }
  else
   {
   $img_url = "";
   $img_width = "0";
   $img_height = "0";
   $img_name = "";   
   }
  try{
   $query = $db->prepare("INSERT INTO games (id, provider_id, type_id, name, gamelink, image_url, image_width, image_height, image_name) VALUES('', (:provider_id), (:type_id), (:name), (:gamelink), (:image_url), (:image_width), (:image_height), (:image_name))");
   $query->bindParam(":provider_id", $provider);
   $query->bindParam(":type_id", $gametypes);
   $query->bindParam(":name", $name);
   $query->bindParam(":gamelink", $gamelink);
   $query->bindParam(":image_url", $img_url);
   $query->bindParam(":image_width", $img_width);
   $query->bindParam(":image_height", $img_height);
   $query->bindParam(":image_name", $img_name);
   $query->execute();
  }catch(PDOException $e) { print_r($e); errorfunction("A database error occured1."); }
  if($img_url == "")
   {
   header("location: ".$file."?success=".safetext($name)." is successfully added.");
   }
  else
   {
   echo str_replace("{title}", "Add a new game", $template[header]); 
   echo "<style>#tab_games{background: #c00;border-color: #a00;}</style>";
   echo "<p class=\"success\">".$name." is successfully added. <a href=\"$file\" style=\"color: #fff\">Go back</a>.</p><p style=\"text-align: center\">Image:</p><p style=\"text-align: center\"><img src=\"".$img_url."\" width=\"".$img_width."\" height=\"".$img_height."\" style=\"border: 1px solid #fff\"></p>";
   echo $template[footer];
   }
  }
 else
  {
  try{
   $query = $db->prepare("SELECT * FROM providers ORDER BY name ASC");
   $query->execute();
  }catch(PDOException $e) { errorfunction("A database error occured."); }
  while($show = $query->fetch(PDO::FETCH_ASSOC))
   {
   $providers.= "<option value=\"".$show[id]."\">".safetext($show[name])."</option>";
   }
  if($query->rowCount() == 0) { $providers_disabled = " class=\"disabled\" disabled=\"disabled\""; $providers = "<option value=\"0\">You need to add game providers first...</option>"; } else { $providers = "<option value=\"\"></option>".$providers; }
//
  try{
   $query = $db->prepare("SELECT * FROM gametypes ORDER BY name ASC");
   $query->execute();
  }catch(PDOException $e) { errorfunction("A database error occured."); }
  while($show = $query->fetch(PDO::FETCH_ASSOC))
   {
   $gametypes.= "<option value=\"".$show[id]."\">".safetext($show[name])."</option>";
   }
  if($query->rowCount() == 0) { $gametypes_disabled = " class=\"disabled\" disabled=\"disabled\""; $gametypes = "<option value=\"0\">You need to add game types first...</option>"; } else { $gametypes = "<option value=\"\"></option>".$gametypes; }

//
  try{
   $query = $db->prepare("SELECT * FROM imagetypes ORDER BY name ASC");
   $query->execute();
  }catch(PDOException $e) { errorfunction("A database error occured."); }
  while($show = $query->fetch(PDO::FETCH_ASSOC))
   {
   $imagetypes.= "<option value=\"".$show[id]."\">Yes, ".safetext($show[name])." (".$show[width]."px * ".$show[height]."px)</option>";
   }
  if($query->rowCount() == 0) { $upload_disabled = " class=\"disabled\" disabled=\"disabled\""; $imagetypes = "<option value=\"0\">You need to add image types first...</option>"; } else { $imagetypes = "<option value=\"0\">No</option>".$imagetypes; }
  echo str_replace("{title}", "Add a new game", $template[header]); 
  echo "<style>#tab_games{background: #c00;border-color: #a00;}</style>";
  echo "<script type=\"text/javascript\">jQuery(document).ready(function(){ if(jQuery('select#upload').val() > 0) { jQuery('div.uploader').show(); } jQuery('select#upload').change(function() { if(jQuery('select#upload').val() > 0) { jQuery('div.uploader').fadeIn(); } else { jQuery('div.uploader').hide(); jQuery('input#file').val('');} });});</script>";
  echo "<p>Add a new record using the form below or <a href=\"".$file."\">go back to the games list</a>.</p>";
  echo "<form method=\"post\" action=\"".$file."?action=game_new&submit=true\" enctype=\"multipart/form-data\">
  <div class=\"field\"><span>Name: <strong>*</strong></span><input type=\"text\" name=\"name\" maxlength=\"255\"></div><div style=\"clear: both\"></div>
  <div class=\"field\"><span>Game Link: <strong>*</strong></span><input value=\"http://\" type=\"text\" name=\"gamelink\" maxlength=\"255\"></div><div style=\"clear: both\"></div>
  <div class=\"field\"><span>Game Provider: <strong>*</strong></span><select name=\"provider\"".$providers_disabled."\">".$providers."</select></div><div style=\"clear: both\"></div>
  <div class=\"field\"><span>Game Type: <strong>*</strong></span><select name=\"gametypes\"".$gametypes_disabled."\">".$gametypes."</select></div><div style=\"clear: both\"></div>
  <div class=\"field\"><span>Upload image: </span><select id=\"upload\" name=\"upload\"".$upload_disabled.">".$imagetypes."</select></div><div style=\"clear: both\"></div>
  <div class=\"field uploader\" style=\"display: none\"><span></span><input id=\"file\" type=\"file\" name=\"image\"></div><div style=\"clear: both\"></div>
  <div class=\"field\"><input type=\"submit\" class=\"submit\" value=\"Add Game\"></div><div style=\"clear: both\"></div>
  <input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"".($settings[upload][max_kilobytes]*1024)."\"> 
  </form>";
  echo $template[footer];
  }
 // end adding a new game 
 }
elseif($action == "game_edit")
 {
 // start editing games
 try{
  $query = $db->prepare("SELECT * FROM games WHERE id = (:id) LIMIT 0,1");
  $query->bindParam(":id", $id);
  $query->execute();
 }catch(PDOException $e) { errorfunction("A database error occured."); }
 if($query->rowCount() == 0) { errorfunction("We could not find this game.<style>#tab_games{background: #c00;border-color: #a00;}</style>"); }
 $show = $query->fetch(PDO::FETCH_ASSOC);
 $image_url_now = $show[image_url];
 if($submit == "true")
  {
  if(isset($_POST['name'])) $name = $_POST['name'];
  if(isset($_POST['gamelink'])) $gamelink = $_POST['gamelink'];
  if(isset($_POST['provider'])) $provider = $_POST['provider'];
   if(isset($_POST['gametypes'])) $gametypes = $_POST['gametypes'];
  if(isset($_POST['upload'])) { $upload = $_POST['upload']; }
  if(isset($_POST['delete_img'])) { $delete_img = $_POST['delete_img']; }
  if($name == "" || $gamelink == "")
   {
   errorfunction("You left some required fields blank. <a href=\"javascript:history.go(-1)\">Go back</a>.<style>#tab_games{background: #c00;border-color: #a00;}</style>");
   }
  try{
   $query = $db->prepare("SELECT * FROM providers WHERE id = (:id) LIMIT 0,1");
   $query->bindParam(":id", $provider);
   $query->execute();
  }catch(PDOException $e) { errorfunction("A database error occured."); }
  if($query->rowCount() == 0)
   {
   errorfunction("You did not select a valid game provider. <a href=\"javascript:history.go(-1)\">Go back</a>.<style>#tab_games{background: #c00;border-color: #a00;}</style>"); 
   }
   //
   try{
   $query = $db->prepare("SELECT * FROM gametypes WHERE id = (:id) LIMIT 0,1");
   $query->bindParam(":id", $gametypes);
   $query->execute();
  }catch(PDOException $e) { errorfunction("A database error occured."); }
  if($query->rowCount() == 0)
   {
   errorfunction("You did not select a valid game type. <a href=\"javascript:history.go(-1)\">Go back</a>.<style>#tab_gametypes{background: #c00;border-color: #a00;}</style>"); 
   } 
   //
  try{
   $query = $db->prepare("SELECT * FROM imagetypes WHERE id = (:id) LIMIT 0,1");
   $query->bindParam(":id", $upload);
   $query->execute();
  }catch(PDOException $e) { errorfunction("A database error occured."); }
  if($query->rowCount() == 1)
   {
   //upload and resize image
   $show = $query->fetch(PDO::FETCH_ASSOC);
   $img_url = "";
   $img_width = $show[width];
   $img_height = $show[height];
   $img_name = $show[name];
   if($_FILES[image][name] == "" || $_FILES[image][error] !== 0 || $_FILES[image][size] == 0)
    {
    errorfunction("You forgot to upload an image. <a href=\"javascript:history.go(-1)\">Go back</a>.<style>#tab_games{background: #c00;border-color: #a00;}</style>");  
    }
   if($_FILES[image][size] > ($settings[upload][max_kilobytes]*1024))
    {
    errorfunction("This image is ".round(($_FILES[image][size]/1024), 2)." KB, which is larger than the maximum of ".$settings[upload][max_kilobytes]." kilobytes. <a href=\"javascript:history.go(-1)\">Go back</a>.<style>#tab_games{background: #c00;border-color: #a00;}</style>");  
    }
   if(!in_array(strtolower(substr(strrchr($_FILES[image][name],'.'),1)), $settings[upload][allowed_extensions]))
    {
    errorfunction("This file type is not allowed. <a href=\"javascript:history.go(-1)\">Go back</a>.<style>#tab_games{background: #c00;border-color: #a00;}</style>");  
    }
   $temp_name = "temp_".date("U")."_".rand(10,99).".".strtolower(substr(strrchr($_FILES[image][name],'.'),1));
   $final_name = date("U").rand(10,99).".jpg";
   if(!move_uploaded_file($_FILES[image][tmp_name], $settings[upload][server_path].$temp_name))
	  {
    errorfunction("Something went wrong while uploading the file. Make sure the directory is configured correctly in the config file, and the folder is chmodded 777. <a href=\"javascript:history.go(-1)\">Go back</a>.<style>#tab_games{background: #c00;border-color: #a00;}</style>");  
    }
   if(resize_image($settings[upload][server_path], $temp_name, $img_width, $img_height, $final_name))
    {
    $img_url = $settings[upload][http_link].$final_name;
    unlink($settings[upload][server_path].$temp_name);
    }
   else
    {
    errorfunction("Something went wrong while resizing the file. <a href=\"javascript:history.go(-1)\">Go back</a>.<style>#tab_games{background: #c00;border-color: #a00;}</style>");  
    }
   }
  else
   {
   $img_url = "";
   $img_width = "0";
   $img_height = "0";
   $img_name = "";   
   }
  try{
   $query = $db->prepare("UPDATE games SET provider_id = (:provider),type_id = (:gametypes), name = (:name), gamelink = (:gamelink) WHERE id = (:id)");
   $query->bindParam(":id", $id);
   $query->bindParam(":name", $name);
   $query->bindParam(":provider", $provider);
   $query->bindParam(":gametypes", $gametypes);
   $query->bindParam(":gamelink", $gamelink);
   $query->execute();
  }catch(PDOException $e) { errorfunction("A database error occured."); }
  if($delete_img == 1)
   {
   unlink($settings[upload][server_path].str_replace($settings[upload][http_link], "", $image_url_now));
   try{
    $query = $db->prepare("UPDATE games SET image_url = '', image_width = '0', image_height = '0', image_name = '' WHERE id = (:id)");
    $query->bindParam(":id", $id);
    $query->execute();
   }catch(PDOException $e) { errorfunction("A database error occured."); }   
   }
  if($img_url !== "")
   {
   try{
    $query = $db->prepare("UPDATE games SET image_url = (:img_url), image_width = (:img_width), image_height = (:img_height), image_name = (:img_name) WHERE id = (:id)");
    $query->bindParam(":id", $id);
    $query->bindParam(":img_url", $img_url);
    $query->bindParam(":img_width", $img_width);
    $query->bindParam(":img_height", $img_height);
    $query->bindParam(":img_name", $img_name);
    $query->execute();
   }catch(PDOException $e) { print_r($e); errorfunction("A database error occured."); }   
   }
  header("location: ".$file."?success=".safetext($name)." is successfully updated.");
  }
 else
  {
  try{
   $query2 = $db->prepare("SELECT * FROM providers ORDER BY name ASC");
   $query2->execute();
  }catch(PDOException $e) { errorfunction("A database error occured."); }
  while($show2 = $query2->fetch(PDO::FETCH_ASSOC))
   {
   if($show[provider_id] == $show2[id])
    {
    $providers.= "<option value=\"".$show2[id]."\" selected=\"selected\">".safetext($show2[name])."</option>";
    }
   else
    {
    $providers.= "<option value=\"".$show2[id]."\">".safetext($show2[name])."</option>";
    }
   }
  if($query2->rowCount() == 0) { $providers_disabled = " class=\"disabled\" disabled=\"disabled\""; $providers = "<option value=\"0\">You need to add game providers first...</option>"; } else { $providers = "<option value=\"\"></option>".$providers; }
  
//
  try{
   $query2 = $db->prepare("SELECT * FROM gametypes ORDER BY name ASC");
   $query2->execute();
  }catch(PDOException $e) { errorfunction("A database error occured."); }
  while($show2 = $query2->fetch(PDO::FETCH_ASSOC))
   {
   if($show[type_id] == $show2[id])
    {
    $gametypes.= "<option value=\"".$show2[id]."\" selected=\"selected\">".safetext($show2[name])."</option>";
    }
   else
    {
    $gametypes.= "<option value=\"".$show2[id]."\">".safetext($show2[name])."</option>";
    }
   }
  if($query2->rowCount() == 0) { $gametypes_disabled = " class=\"disabled\" disabled=\"disabled\""; $gametypes = "<option value=\"0\">You need to add game providers first...</option>"; } else { $gametypes = "<option value=\"\"></option>".$gametypes; }

//  
  
  try{
   $query2 = $db->prepare("SELECT * FROM imagetypes ORDER BY name ASC");
   $query2->execute();
  }catch(PDOException $e) { errorfunction("A database error occured."); }
  while($show2 = $query2->fetch(PDO::FETCH_ASSOC))
   {
   $imagetypes.= "<option value=\"".$show2[id]."\">Yes, ".safetext($show2[name])." (".$show2[width]."px * ".$show2[height]."px)</option>";
   }
  if($query2->rowCount() == 0) { $upload_disabled = " class=\"disabled\" disabled=\"disabled\""; $imagetypes = "<option value=\"0\">You need to add image types first...</option>"; } else { $imagetypes = "<option value=\"0\">No</option>".$imagetypes; }
  echo str_replace("{title}", safetext($show[name]).": edit record", $template[header]); 
  echo "<p>Edit this record using the form below or <a href=\"".$file."\">go back to the games list</a>.</p>";
  echo "<style>#tab_games{background: #c00;border-color: #a00;}</style>";
  echo "<script type=\"text/javascript\">jQuery(document).ready(function(){ if(jQuery('select#upload').val() > 0) { jQuery('div.uploader').show(); } jQuery('select#upload').change(function() { if(jQuery('select#upload').val() > 0) { jQuery('div.uploader').fadeIn(); } else { jQuery('div.uploader').hide(); jQuery('input#file').val('');} });});</script>";
  echo "<form method=\"post\" action=\"".$file."?action=game_edit&id=".$id."&submit=true\" enctype=\"multipart/form-data\">
  <div class=\"field\"><span>Name: <strong>*</strong></span><input value=\"".$show[name]."\" type=\"text\" name=\"name\" maxlength=\"255\"></div><div style=\"clear: both\"></div>
  <div class=\"field\"><span>Game Link: <strong>*</strong></span><input value=\"".$show[gamelink]."\" type=\"text\" name=\"gamelink\" maxlength=\"255\"></div><div style=\"clear: both\"></div>
  <div class=\"field\"><span>Game Provider: <strong>*</strong></span><select name=\"provider\"".$providers_disabled."\">".$providers."</select></div><div style=\"clear: both\"></div>
  <div class=\"field\"><span>Game Type: <strong>*</strong></span><select name=\"gametypes\"".$gametypes_disabled."\">".$gametypes."</select></div><div style=\"clear: both\"></div>";
  
  if($show[image_url] !== "")
   {
   echo "<div class=\"field\"><span>Image URL <a href=\"".$show[image_url]."\" target=\"_blank\">(view)</a>: <strong>*</strong></span><input disabled=\"disabled\" class=\"disabled\" value=\"".$show[image_url]."\" type=\"text\" maxlength=\"255\"></div><div style=\"clear: both\"></div>";
   echo "<div class=\"field\"><span>Delete image: <strong>*</strong></span><select name=\"delete_img\"><option value=\"0\">No, keep this image</option><option value=\"1\">Yes, remove this image</option></select></div><div style=\"clear: both\"></div>"; 
	 }
  else
   {
   echo "<div class=\"field\"><span>Upload image: </span><select id=\"upload\" name=\"upload\"".$upload_disabled.">".$imagetypes."</select></div><div style=\"clear: both\"></div>
   <div class=\"field uploader\" style=\"display: none\"><span></span><input id=\"file\" type=\"file\" name=\"image\"></div><div style=\"clear: both\"></div>";
   }
  echo" <div class=\"field\"><input type=\"submit\" class=\"submit\" value=\"Edit Game\"></div><div style=\"clear: both\"></div>
  <input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"".($settings[upload][max_kilobytes]*1024)."\"> 
  </form>";
  }








 // end editing games
 }
elseif($action == "game_delete")
 {
 // start deleting games
 try{
  $query = $db->prepare("SELECT * FROM games WHERE id = (:id) LIMIT 0,1");
  $query->bindParam(":id", $id);
  $query->execute();
 }catch(PDOException $e) { errorfunction("A database error occured."); }
 if($query->rowCount() == 0) { errorfunction("We could not find this game.<style>#tab_games{background: #c00;border-color: #a00;}</style>"); }
 $show = $query->fetch(PDO::FETCH_ASSOC);
 $name = $show[name];
 if($submit == "true")
  {
  $url = str_replace($settings[upload][http_link], "", $show[image_url]);
  unlink($settings[upload][server_path].$url);
  try{
   $query = $db->prepare("DELETE FROM games WHERE id = (:id)");
   $query->bindParam(":id", $id);
   $query->execute();
  }catch(PDOException $e) { errorfunction("A database error occured."); }
  header("location: ".$file."?success=".safetext($name)." is successfully deleted.");
  }
 else
  {
  echo str_replace("{title}", safetext($show[name]).": delete record", $template[header]); 
  echo "<style>#tab_games{background: #c00;border-color: #a00;}</style>";
  echo "<p>Are you sure? This cannot be made undone.</p><p><a href=\"".$file."?action=game_delete&id=".$id."&submit=true\"><strong>Yes, delete ".safetext($show[name])."</strong></a></p><p><a href=\"".$file."\">No, go back to the games list</a></p>";
  echo $template[footer];
  } 
 // end deleting games
 }
// ------------------- //
//   END GAMES ADMIN   //
// ------------------- //

elseif($action == "providers")

// ------------------------------ //
//   START GAME PROVIDERS ADMIN   //
// ------------------------------ //
 {
 // start providers main
 try{
  $query = $db->prepare("SELECT * FROM games");
  $query->execute();
 }catch(PDOException $e) { errorfunction("A database error occured."); }
 while($show = $query->fetch(PDO::FETCH_ASSOC))
  {
  $num_games[$show[provider_id]]++;
  }
 try{
  $query = $db->prepare("SELECT * FROM providers ORDER BY id ASC");
  $query->execute();
 }catch(PDOException $e) { errorfunction("A database error occured."); }
 echo str_replace("{title}", "Manage Game Providers", $template[header]);
 echo "<style>#tab_gameproviders{background: #c00;border-color: #a00;}</style>";
 if(strlen($success) > 0) { echo "<p class=\"success\">".safetext($success)."</p>"; }
 echo "<p style=\"text-align: center\"><strong><a href=\"".$file."?action=provider_new\">Add a new game provider</a></strong></p><p style=\"clear: both\"></p>";
 echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><thead><tr><td>ID</td><td>Name</td><td>Games</td><td width=\"100\" style=\"text-align: center\">Options</td></tr></thead><tbody>";
 $class="odd";
 while($show = $query->fetch(PDO::FETCH_ASSOC))
  {
  if($num_games[$show[id]] == 1) $number_of_games = "1 game"; elseif($num_games[$show[id]] == "") $number_of_games = "0 games"; else $number_of_games = $num_games[$show[id]]." games";
  echo "<tr class=\"".$class."\"><td>".$show[id]."</td><td>".safetext($show[name])."</td><td>".$number_of_games."</td><td style=\"text-align: center\"><a class=\"edit\" href=\"".$file."?action=provider_edit&id=".$show[id]."\" title=\"Edit ".safetext($show[name])."\">edit</a><a class=\"delete\" href=\"".$file."?action=provider_delete&id=".$show[id]."\" title=\"Delete ".safetext($show[name])."\">delete</a></tr>";
  if($class=="odd") $class="even"; else$class="odd";
  }
 if($query->rowCount() == 0)
  {
  echo "<tr class=\"odd\"><td colspan=\"15\" style=\"text-align: center\">No records found.</td></tr>";
  }
 echo "</tbody></table>";
 echo "<p style=\"text-align: center\"><strong><a href=\"".$file."?action=provider_new\">Add a new game provider</a></strong></p><p style=\"clear: both\"></p>";
 echo $template[footer]; 
 // end providers main
 }
elseif($action == "provider_new")
 {
 // start adding a new provider
 if($submit == "true")
  {
  if(isset($_POST['name'])) $name = $_POST['name'];
  if($name == "")
   {
   errorfunction("You left some required fields blank. <a href=\"javascript:history.go(-1)\">Go back</a>.<style>#tab_gameproviders{background: #c00;border-color: #a00;}</style>");
   }
  try{
   $query = $db->prepare("INSERT INTO providers (id, name) VALUES('', (:name))");
   $query->bindParam(":name", $name);
   $query->execute();
  }catch(PDOException $e) { errorfunction("A database error occured."); }
  header("location: ".$file."?action=providers&success=".safetext($name)." is successfully added.");
  }
 else
  {
  echo str_replace("{title}", "Add a new game provider", $template[header]); 
  echo "<style>#tab_gameproviders{background: #c00;border-color: #a00;}</style>";
  echo "<p>Add a new record using the form below or <a href=\"".$file."?action=providers\">go back to the game provider list</a>.</p>";
  echo "<form method=\"post\" action=\"".$file."?action=provider_new&submit=true\">
  <div class=\"field\"><span>Name: <strong>*</strong></span><input type=\"text\" name=\"name\"></div><div style=\"clear: both\" maxlength=\"255\"></div>
  <div class=\"field\"><input type=\"submit\" class=\"submit\" value=\"Add Game Provider\"></div><div style=\"clear: both\" maxlength=\"255\"></div>
  </form>";
  echo $template[footer];
  }
 // end adding a new provider 
 }
elseif($action == "provider_edit")
 {
 // start editing provider
 try{
  $query = $db->prepare("SELECT * FROM providers WHERE id = (:id) LIMIT 0,1");
  $query->bindParam(":id", $id);
  $query->execute();
 }catch(PDOException $e) { errorfunction("A database error occured."); }
 if($query->rowCount() == 0) { errorfunction("We could not find this game provider.<style>#tab_gameproviders{background: #c00;border-color: #a00;}</style>"); }
 if($submit == "true")
  {
  if(isset($_POST['name'])) $name = $_POST['name'];
  if($name == "")
   {
   errorfunction("You left some required fields blank. <a href=\"javascript:history.go(-1)\">Go back</a>.<style>#tab_gameproviders{background: #c00;border-color: #a00;}</style>");
   }
  try{
   $query = $db->prepare("UPDATE providers SET name = (:name) WHERE id = (:id)");
   $query->bindParam(":name", $name);
   $query->execute();
  }catch(PDOException $e) { errorfunction("A database error occured."); }
  header("location: ".$file."?action=providers&success=".safetext($name)." is successfully updated.");
  }
 else
  {
  $show = $query->fetch(PDO::FETCH_ASSOC);
  echo str_replace("{title}", safetext($show[name]).": edit record", $template[header]); 
  echo "<p>Edit this record using the form below or <a href=\"".$file."?action=providers\">go back to the game provider list</a>.</p>";
  echo "<style>#tab_gameproviders{background: #c00;border-color: #a00;}</style>";
  echo "<form method=\"post\" action=\"".$file."?action=provider_edit&id=".$show[id]."&submit=true\">
  <div class=\"field\"><span>Name: <strong>*</strong></span><input type=\"text\" value=\"".$show[name]."\" name=\"name\"></div><div style=\"clear: both\" maxlength=\"255\"></div>
  <div class=\"field\"><input type=\"submit\" class=\"submit\" value=\"Update Game Provider\"></div>
  </form>";
  } 
 // end editing provider
 }
elseif($action == "provider_delete")
 {
 // start deleting provider
 try{
  $query = $db->prepare("SELECT * FROM games WHERE provider_id = (:id)");
  $query->bindParam(":id", $id);
  $query->execute();
 }catch(PDOException $e) { errorfunction("A database error occured."); }
 $num_games = $query->rowCount();
 try{
  $query = $db->prepare("SELECT * FROM providers WHERE id = (:id) LIMIT 0,1");
  $query->bindParam(":id", $id);
  $query->execute();
 }catch(PDOException $e) { errorfunction("A database error occured."); }
 if($query->rowCount() == 0) { errorfunction("We could not find this provider.<style>#tab_gameproviders{background: #c00;border-color: #a00;}</style>"); }
 $show = $query->fetch(PDO::FETCH_ASSOC);
 $name = $show[name];
 if($submit == "true")
  {
  if($num_games > 0)
   {
   errorfunction("Remove the games in this catogory first.<style>#tab_gameproviders{background: #c00;border-color: #a00;}</style>");
   }
  else
   {
   try{
    $query = $db->prepare("DELETE FROM providers WHERE id = (:id)");
    $query->bindParam(":id", $id);
    $query->execute();
   }catch(PDOException $e) { errorfunction("A database error occured."); }
   header("location: ".$file."?action=providers&success=".safetext($name)." is successfully deleted.");
   }
  }
 else
  {
  if($num_games > 0)
   {
   errorfunction("Remove the games in this catogory first.<style>#tab_gameproviders{background: #c00;border-color: #a00;}</style>");
   }
  else
   {
   echo str_replace("{title}", safetext($show[name]).": delete record", $template[header]); 
   echo "<style>#tab_gameproviders{background: #c00;border-color: #a00;}</style>";
   echo "<p>Are you sure? This cannot be made undone.</p><p><a href=\"".$file."?action=provider_delete&id=".$id."&submit=true\"><strong>Yes, delete ".safetext($show[name])."</strong></a></p><p><a href=\"".$file."?action=providers\">No, go back to the game provider list</a></p>";
   echo $template[footer];
   }
  } 
 // end deleting provider
 }
// ---------------------------- //
//   END GAME PROVIDERS ADMIN   //
// ---------------------------- //


//--BEGIN GAME TYPE ADMIN, ADDED IN BY CHRIS----------//
//                                                    //
//----------------------------------------------------//

elseif($action == "gametypes")
 {
 // start gametypes main
 try{
  $query = $db->prepare("SELECT * FROM games");
  $query->execute();
 }catch(PDOException $e) { errorfunction("A database error occured."); }
 while($show = $query->fetch(PDO::FETCH_ASSOC))
  {
  $num_games[$show[type_id]]++;
  }
 try{
  $query = $db->prepare("SELECT * FROM gametypes ORDER BY id ASC");
  $query->execute();
 }catch(PDOException $e) { errorfunction("A database error occured."); }
 echo str_replace("{title}", "Manage Game gametypes", $template[header]);
 echo "<style>#tab_gametypes{background: #c00;border-color: #a00;}</style>";
 if(strlen($success) > 0) { echo "<p class=\"success\">".safetext($success)."</p>"; }
 echo "<p style=\"text-align: center\"><strong><a href=\"".$file."?action=gametypes_new\">Add a new game type</a></strong></p><p style=\"clear: both\"></p>";
 echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><thead><tr><td>ID</td><td>Name</td><td>Games</td><td width=\"100\" style=\"text-align: center\">Options</td></tr></thead><tbody>";
 $class="odd";
 while($show = $query->fetch(PDO::FETCH_ASSOC))
  {
  if($num_games[$show[id]] == 1) $number_of_games = "1 game"; elseif($num_games[$show[id]] == "") $number_of_games = "0 games"; else $number_of_games = $num_games[$show[id]]." games";
  echo "<tr class=\"".$class."\"><td>".$show[id]."</td><td>".safetext($show[name])."</td><td>".$number_of_games."</td><td style=\"text-align: center\"><a class=\"edit\" href=\"".$file."?action=gametypes_edit&id=".$show[id]."\" title=\"Edit ".safetext($show[name])."\">edit</a><a class=\"delete\" href=\"".$file."?action=gametypes_delete&id=".$show[id]."\" title=\"Delete ".safetext($show[name])."\">delete</a></tr>";
  if($class=="odd") $class="even"; else$class="odd";
  }
 if($query->rowCount() == 0)
  {
  echo "<tr class=\"odd\"><td colspan=\"15\" style=\"text-align: center\">No records found.</td></tr>";
  }
 echo "</tbody></table>";
 echo "<p style=\"text-align: center\"><strong><a href=\"".$file."?action=gametypes_new\">Add a new game type</a></strong></p><p style=\"clear: both\"></p>";
 echo $template[footer]; 
 // end gametypes main
 }
elseif($action == "gametypes_new")
 {
 // start adding a new provider
 if($submit == "true")
  {
  if(isset($_POST['name'])) $name = $_POST['name'];
  if($name == "")
   {
   errorfunction("You left some required fields blank. <a href=\"javascript:history.go(-1)\">Go back</a>.<style>#tab_gametypes{background: #c00;border-color: #a00;}</style>");
   }
  try{
   $query = $db->prepare("INSERT INTO gametypes (id, name) VALUES('', (:name))");
   $query->bindParam(":name", $name);
   $query->execute();
  }catch(PDOException $e) { errorfunction("A database error occured."); }
  header("location: ".$file."?action=gametypes&success=".safetext($name)." is successfully added.");
  }
 else
  {
  echo str_replace("{title}", "Add a new game provider", $template[header]); 
  echo "<style>#tab_gametypes{background: #c00;border-color: #a00;}</style>";
  echo "<p>Add a new record using the form below or <a href=\"".$file."?action=gametypes\">go back to the game type list</a>.</p>";
  echo "<form method=\"post\" action=\"".$file."?action=gametypes_new&submit=true\">
  <div class=\"field\"><span>Name: <strong>*</strong></span><input type=\"text\" name=\"name\"></div><div style=\"clear: both\" maxlength=\"255\"></div>
  <div class=\"field\"><input type=\"submit\" class=\"submit\" value=\"Add Game Type\"></div><div style=\"clear: both\" maxlength=\"255\"></div>
  </form>";
  echo $template[footer];
  }
 // end adding a new provider 
 }
elseif($action == "gametypes_edit")
 {
 // start editing provider
 try{
  $query = $db->prepare("SELECT * FROM gametypes WHERE id = (:id) LIMIT 0,1");
  $query->bindParam(":id", $id);
  $query->execute();
 }catch(PDOException $e) { errorfunction("A database error occured."); }
 if($query->rowCount() == 0) { errorfunction("We could not find this game provider.<style>#tab_gametypes{background: #c00;border-color: #a00;}</style>"); }
 if($submit == "true")
  {
  if(isset($_POST['name'])) $name = $_POST['name'];
  if($name == "")
   {
   errorfunction("You left some required fields blank. <a href=\"javascript:history.go(-1)\">Go back</a>.<style>#tab_gametypes{background: #c00;border-color: #a00;}</style>");
   }
  try{
   $query = $db->prepare("UPDATE gametypes SET name = (:name) WHERE id = (:id)");
   $query->bindParam(":name", $name);
   $query->execute();
  }catch(PDOException $e) { errorfunction("A database error occured1."); }
  header("location: ".$file."?action=gametypes&success=".safetext($name)." is successfully updated.");
  }
 else
  {
  $show = $query->fetch(PDO::FETCH_ASSOC);
  echo str_replace("{title}", safetext($show[name]).": edit record", $template[header]); 
  echo "<p>Edit this record using the form below or <a href=\"".$file."?action=gametypes\">go back to the game provider list</a>.</p>";
  echo "<style>#tab_gametypes{background: #c00;border-color: #a00;}</style>";
  echo "<form method=\"post\" action=\"".$file."?action=gametypes_edit&id=".$show[id]."&submit=true\">
  <div class=\"field\"><span>Name: <strong>*</strong></span><input type=\"text\" value=\"".$show[name]."\" name=\"name\"></div><div style=\"clear: both\" maxlength=\"255\"></div>
  <div class=\"field\"><input type=\"submit\" class=\"submit\" value=\"Update Game Provider\"></div>
  </form>";
  } 
 // end editing type
 }
elseif($action == "gametypes_delete")
 {
 // start deleting type
 try{
  $query = $db->prepare("SELECT * FROM games WHERE type_id = (:id)");
  $query->bindParam(":id", $id);
  $query->execute();
 }catch(PDOException $e) { errorfunction("A database error occured."); }
 $num_games = $query->rowCount();
 try{
  $query = $db->prepare("SELECT * FROM gametypes WHERE id = (:id) LIMIT 0,1");
  $query->bindParam(":id", $id);
  $query->execute();
 }catch(PDOException $e) { errorfunction("A database error occured."); }
 if($query->rowCount() == 0) { errorfunction("We could not find this provider.<style>#tab_gametypes{background: #c00;border-color: #a00;}</style>"); }
 $show = $query->fetch(PDO::FETCH_ASSOC);
 $name = $show[name];
 if($submit == "true")
  {
  if($num_games > 0)
   {
   errorfunction("Remove the games in this catogory first.<style>#tab_gametypes{background: #c00;border-color: #a00;}</style>");
   }
  else
   {
   try{
    $query = $db->prepare("DELETE FROM gametypes WHERE id = (:id)");
    $query->bindParam(":id", $id);
    $query->execute();
   }catch(PDOException $e) { errorfunction("A database error occured."); }
   header("location: ".$file."?action=gametypes&success=".safetext($name)." is successfully deleted.");
   }
  }
 else
  {
  if($num_games > 0)
   {
   errorfunction("Remove the games in this catogory first.<style>#tab_gametypes{background: #c00;border-color: #a00;}</style>");
   }
  else
   {
   echo str_replace("{title}", safetext($show[name]).": delete record", $template[header]); 
   echo "<style>#tab_gamegametypes{background: #c00;border-color: #a00;}</style>";
   echo "<p>Are you sure? This cannot be made undone.</p><p><a href=\"".$file."?action=gametypes_delete&id=".$id."&submit=true\"><strong>Yes, delete ".safetext($show[name])."</strong></a></p><p><a href=\"".$file."?action=gametypes\">No, go back to the game provider list</a></p>";
   echo $template[footer];
   }
  } 
 // end deleting type
 }



//--END GAME TYPE ADMIN, ADDED IN BY CHRIS-----------//
//                                                   //
//---------------------------------------------------//

elseif($action == "imagetypes")

// --------------------------- //
//   START IMAGE TYPES ADMIN   //
// --------------------------- //
 {
 // start imagetypes main
 try{
  $query = $db->prepare("SELECT * FROM imagetypes ORDER BY id ASC");
  $query->execute();
 }catch(PDOException $e) { errorfunction("A database error occured."); }
 echo str_replace("{title}", "Manage Image Types", $template[header]);
 echo "<style>#tab_imagetypes{background: #c00;border-color: #a00;}</style>";
 if(strlen($success) > 0) { echo "<p class=\"success\">".safetext($success)."</p>"; }
 echo "<p style=\"text-align: center\"><strong><a href=\"".$file."?action=imagetype_new\">Add a new image type</a></strong></p><p style=\"clear: both\"></p>";
 echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><thead><tr><td>ID</td><td>Name</td><td>Size</td><td width=\"100\" style=\"text-align: center\">Options</td></tr></thead><tbody>";
 $class="odd";
 while($show = $query->fetch(PDO::FETCH_ASSOC))
  {
  echo "<tr class=\"".$class."\"><td>".$show[id]."</td><td>".safetext($show[name])."</td><td>".$show[width]."px * ".$show[height]."px</td><td style=\"text-align: center\"><a class=\"edit\" href=\"".$file."?action=imagetype_edit&id=".$show[id]."\" title=\"Edit ".safetext($show[name])."\">edit</a><a class=\"delete\" href=\"".$file."?action=imagetype_delete&id=".$show[id]."\" title=\"Delete ".safetext($show[name])."\">delete</a></tr>";
  if($class=="odd") $class="even"; else$class="odd";
  }
 if($query->rowCount() == 0)
  {
  echo "<tr class=\"odd\"><td colspan=\"15\" style=\"text-align: center\">No records found.</td></tr>";
  }
 echo "</tbody></table>";
 echo "<p style=\"text-align: center\"><strong><a href=\"".$file."?action=imagetype_new\">Add a new image type</a></strong></p><p style=\"clear: both\"></p>";
 echo $template[footer]; 
 // end imagetypes main
 }
elseif($action == "imagetype_new")
 {
 // start adding a new image type
 if($submit == "true")
  {
  if(isset($_POST['name'])) $name = $_POST['name'];
  if(isset($_POST['width'])) $width = $_POST['width'];
  if(isset($_POST['height'])) $height = $_POST['height'];
  $width = round($width); $height = round($height);
  if($name == "" || $width == "" || $height == "")
   {
   errorfunction("You left some required fields blank. <a href=\"javascript:history.go(-1)\">Go back</a>.<style>#tab_imagetypes{background: #c00;border-color: #a00;}</style>");
   }
  if(!is_numeric($width) || !is_numeric($height))
   {
   errorfunction("Image width or height is not a number. <a href=\"javascript:history.go(-1)\">Go back</a>.<style>#tab_imagetypes{background: #c00;border-color: #a00;}</style>");
   }
  if($width < 0 || $height < 0)
   {
   errorfunction("Image width or height is negative. <a href=\"javascript:history.go(-1)\">Go back</a>.<style>#tab_imagetypes{background: #c00;border-color: #a00;}</style>");
   }
  try{
   $query = $db->prepare("INSERT INTO imagetypes (id, name, width, height) VALUES('', (:name), (:width), (:height))");
   $query->bindParam(":name", $name);
   $query->bindParam(":width", $width);
   $query->bindParam(":height", $height);
   $query->execute();
  }catch(PDOException $e) { errorfunction("A database error occured."); }
  header("location: ".$file."?action=imagetypes&success=".safetext($name)." is successfully added.");
  }
 else
  {
  echo str_replace("{title}", "Add a new image type", $template[header]); 
  echo "<style>#tab_imagetypes{background: #c00;border-color: #a00;}</style>";
  echo "<p>Add a new record using the form below or <a href=\"".$file."?action=imagetypes\">go back to the image types list</a>.</p>";
  echo "<form method=\"post\" action=\"".$file."?action=imagetype_new&submit=true\">
  <div class=\"field\"><span>Image type name: <strong>*</strong></span><input type=\"text\" name=\"name\" maxlength=\"50\"></div><div style=\"clear: both\"></div>
  <div class=\"field\"><span>Image width: (px) <strong>*</strong></span><input type=\"text\" name=\"width\" maxlength=\"4\"></div><div style=\"clear: both\"></div>
  <div class=\"field\"><span>Image height: (px) <strong>*</strong></span><input type=\"text\" name=\"height\" maxlength=\"4\"></div><div style=\"clear: both\"></div>
  <div class=\"field\"><input type=\"submit\" class=\"submit\" value=\"Add Image Type\"></div><div style=\"clear: both\"></div>
  </form>";
  echo $template[footer];
  }
 // end adding a new image type 
 }
elseif($action == "imagetype_edit")
 {
 // start editing image types
 try{
  $query = $db->prepare("SELECT * FROM imagetypes WHERE id = (:id) LIMIT 0,1");
  $query->bindParam(":id", $id);
  $query->execute();
 }catch(PDOException $e) { errorfunction("A database error occured."); }
 if($query->rowCount() == 0) { errorfunction("We could not find this image type.<style>#tab_imagetypes{background: #c00;border-color: #a00;}</style>"); }
 if($submit == "true")
  {
  if(isset($_POST['name'])) $name = $_POST['name'];
  if(isset($_POST['width'])) $width = $_POST['width'];
  if(isset($_POST['height'])) $height = $_POST['height'];
  $width = round($width); $height = round($height);
  if($name == "" || $width == "" || $height == "")
   {
   errorfunction("You left some required fields blank. <a href=\"javascript:history.go(-1)\">Go back</a>.<style>#tab_imagetypes{background: #c00;border-color: #a00;}</style>");
   }
  if(!is_numeric($width) || !is_numeric($height))
   {
   errorfunction("Image width or height is not a number. <a href=\"javascript:history.go(-1)\">Go back</a>.<style>#tab_imagetypes{background: #c00;border-color: #a00;}</style>");
   }
  if($width < 0 || $height < 0)
   {
   errorfunction("Image width or height is negative. <a href=\"javascript:history.go(-1)\">Go back</a>.<style>#tab_imagetypes{background: #c00;border-color: #a00;}</style>");
   }
  try{
   $query = $db->prepare("UPDATE imagetypes SET name = (:name), width = (:width), height = (:height) WHERE id = (:id)");
   $query->bindParam(":name", $name);
   $query->bindParam(":width", $width);
   $query->bindParam(":height", $height);   
   $query->execute();
  }catch(PDOException $e) { errorfunction("A database error occured."); }
  header("location: ".$file."?action=imagetypes&success=".safetext($name)." is successfully updated.");
  }
 else
  {
  $show = $query->fetch(PDO::FETCH_ASSOC);
  echo str_replace("{title}", safetext($show[name]).": edit record", $template[header]); 
  echo "<p>Edit this record using the form below or <a href=\"".$file."?action=imagetypes\">go back to the image types list</a>.</p>";
  echo "<style>#tab_imagetypes{background: #c00;border-color: #a00;}</style>";
  echo "<form method=\"post\" action=\"".$file."?action=imagetype_edit&id=".$show[id]."&submit=true\">
  <div class=\"field\"><span>Image type name: <strong>*</strong></span><input type=\"text\" value=\"".$show[name]."\" name=\"name\" maxlength=\"50\"></div><div style=\"clear: both\" maxlength=\"255\"></div>
  <div class=\"field\"><span>Image width: (px) <strong>*</strong></span><input type=\"text\" value=\"".$show[width]."\" name=\"width\" maxlength=\"4\"></div><div style=\"clear: both\"></div>
  <div class=\"field\"><span>Image height: (px) <strong>*</strong></span><input type=\"text\" value=\"".$show[height]."\" name=\"height\" maxlength=\"4\"></div><div style=\"clear: both\"></div>
  <div class=\"field\"><input type=\"submit\" class=\"submit\" value=\"Update Image Type\"></div>
  </form>";
  } 
 // end editing image types
 }
elseif($action == "imagetype_delete")
 {
 // start deleting image types
 try{
  $query = $db->prepare("SELECT * FROM imagetypes WHERE id = (:id) LIMIT 0,1");
  $query->bindParam(":id", $id);
  $query->execute();
 }catch(PDOException $e) { errorfunction("A database error occured."); }
 if($query->rowCount() == 0) { errorfunction("We could not find this image type.<style>#tab_imagetypes{background: #c00;border-color: #a00;}</style>"); }
 $show = $query->fetch(PDO::FETCH_ASSOC);
 $name = $show[name];
 if($submit == "true")
  {
  try{
   $query = $db->prepare("DELETE FROM imagetypes WHERE id = (:id)");
   $query->bindParam(":id", $id);
   $query->execute();
  }catch(PDOException $e) { errorfunction("A database error occured."); }
  header("location: ".$file."?action=imagetypes&success=".safetext($name)." is successfully deleted.");
  }
 else
  {
  echo str_replace("{title}", safetext($show[name]).": delete record", $template[header]); 
  echo "<style>#tab_imagetypes{background: #c00;border-color: #a00;}</style>";
  echo "<p>Are you sure? This cannot be made undone.</p><p><a href=\"".$file."?action=imagetype_delete&id=".$id."&submit=true\"><strong>Yes, delete ".safetext($show[name])."</strong></a></p><p><a href=\"".$file."?action=imagetypes\">No, go back to the image types list</a></p>";
  echo $template[footer];
  } 
 // end deleting image types
 }
// ------------------------- //
//   END IMAGE TYPES ADMIN   //
// ------------------------- //

elseif($action == "login")
 {
 // start login form
 if($submit == "true")
  {
  if(isset($_POST['password'])) { $password = $_POST['password']; }
  if($password !== $settings[admin][password])
   {
   errorfunction("This is not the right password. <a href=\"javascript:history.go(-1)\">Try again</a>.", true);
   }
  else
   {
   setcookie("login", md5($password.$settings[admin][security]));
   header("location: ".$file);
   }
  }
 else
  {
  echo preg_replace("!<ul.*?</ul>!i", "", str_replace("{title}", "Log In", str_replace("(Log Out)", "", $template[header]))); 
  echo "<p>You are not logged in.</p>";
  echo "<form method=\"post\" action=\"".$file."?action=login&submit=true\">
  <div class=\"field\"><span>Password: <strong>*</strong></span><input type=\"password\" name=\"password\"></div><div style=\"clear: both\" maxlength=\"255\"></div>
  <div class=\"field\"><input type=\"submit\" class=\"submit\" value=\"Log In\"></div><div style=\"clear: both\" maxlength=\"255\"></div>
  </form>";  
  echo $template[footer];
  }
 // end login form
 }
elseif($action == "logout")
 {
 setcookie("login", "");
 setcookie("country", "");
 header("location: ".$file);
 }
else
 {
 errorfunction("We don't know what you want to do.");
 }
?>
