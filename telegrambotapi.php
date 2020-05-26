
<?php
	define('API_KEY','PasteYourApi'); //Paste Your BotFather Api Key
	$method = "getChat?chat_id="; // Don't Change
	$channelname = "@WriteChannelUsername"; // Channel or Group Username. Please write @ on first
    $apiLink = "https://api.telegram.org/bot".API_KEY."/".$method.$channelname; // Api Link
  
    $ch = curl_init(); // Curl active
    curl_setopt($ch, CURLOPT_URL, $apiLink); //Visit api link
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    $cikti = curl_exec($ch); 
    curl_close($ch); //Stop
 
		$json = json_decode($cikti,true);
		
		//Variables
		
		$title = $json['result']['title']; //Get Channel or Group Title
		
		$username = $json['result']['username']; //Get Channel or Group Username
		
		$type = $json['result']['type']; //Get Channel or Group Type
		
		$desc = $json['result']['description']; //Get Channel or Group Description
		
		$image = $json['result']['photo']['big_file_id']; //Get Channel or Group Profile Image ID
		

	$getFile = "getFile?file_id="; // Dont Change This is Get File Path function
	$fileId = $json['result']['photo']['big_file_id'];
    $apiLink2 = "https://api.telegram.org/bot".API_KEY."/".$getFile.$fileId;
  
    $ch2 = curl_init(); 
    curl_setopt($ch2, CURLOPT_URL, $apiLink2);
    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true); 
    $cikti2 = curl_exec($ch2);
    curl_close($ch2);
 
		$json2 = json_decode($cikti2,true);
			
		$filePath = $json2['result']['file_path']; // Get Profile Image Path
		$apiLink3 = "https://api.telegram.org/file/bot".API_KEY."/".$filePath;
		
		$image = file_get_contents($apiLink3); // Get Profile Image File
		file_put_contents("imgfolder/".$fileId.".jpg", $image); // Save Profile Image in Folder. Your create or change imgfolder in your pc or hosting.
		
?>

<html>
<!-- Start Test -->
<head>
<title>Telegram Get Channels & Groups PHP Bot</title>
</head>
<body>
<h3><?php echo $title; ?></h3>
<h5><?php echo $username; ?></h5>
<h6><?php echo $type; ?></h6>
<p><?php echo $desc; ?></p>
<img src="<?php echo $apiLink3; ?>" width="300" height="300"/>
</body>
<html>