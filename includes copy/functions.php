<?php // common.php

function display($msg) {
    ?>
    <html>
    <head>
    <script language="JavaScript">
    <!--
        alert("<?=$msg?>");
        history.back();
    //-->
    </script>
    </head>
    <body>
    </body>
    </html>
    <?php
    exit;
}
?>
<?php

function strip_zeros_from_date( $marked_string="" ) {
  // first remove the marked zeros
  $no_zeros = str_replace('*0', '', $marked_string);
  // then remove any remaining marks
  $cleaned_string = str_replace('*', '', $no_zeros);
  return $cleaned_string;
}

function redirect_to( $location = NULL ) {
  if ($location != NULL) {
    header("Location: {$location}");
    exit;
  }
}

function output_message($message="") {
  if (!empty($message)) { 
    return "<p class=\"message\">{$message}</p>";
  } else {
    return "";
  }
}

function __autoload($class_name) {
	$class_name = strtolower($class_name);
  $path = LIB_PATH.DS."{$class_name}.php";
  if(file_exists($path)) {
    require_once($path);
  } else {
		die("The file {$class_name}.php could not be found.");
	}
}

function include_layout_template($template="") {
	include(SITE_ROOT.DS.'public'.DS.'layouts'.DS.$template);
}

function log_action($action, $message="") {
	$logfile = SITE_ROOT.DS.'logs'.DS.'log.txt';
	$new = file_exists($logfile) ? false : true;
  if($handle = fopen($logfile, 'a')) { // append
    $timestamp = strftime("%Y-%m-%d %H:%M:%S", time());
		$content = "{$timestamp} | {$action}: {$message}\n";
    fwrite($handle, $content);
    fclose($handle);
    if($new) { chmod($logfile, 0755); }
  } else {
    echo "Could not open log file for writing.";
  }
}

function datetime_to_text($datetime="") {
  $unixdatetime = strtotime($datetime);
  return strftime("%B %d, %Y at %I:%M %p", $unixdatetime);
}


function recomender1($prid){
include(APP_PATH.DS.'class.apriori.php');
include(APP_PATH.DS.'database.php');
include(APP_PATH.DS.'user.php');
$Apriori = new Apriori();

$Apriori->setMaxScan(20);       //Scan 2, 3, ...
$Apriori->setMinSup(2);         //Minimum support 1, 2, 3, ...
$Apriori->setMinConf(75);       //Minimum confidence - Percent 1, 2, ..., 100
$Apriori->setDelimiter(',');    //Delimiter 
$dataset = array();
$file ='';
$max = User::find_max();
for($i=1;$i<=$max;$i++){
$users = User::find_all_data($i);
foreach($users as $user) {
$dataset[$i]= $user->product_id .",";
$file.=$dataset[$i];
}
$file .= "\n";
}

file_put_contents('file.txt', $file);
$Apriori->process('file.txt');
$Apriori->saveFreqItemsets('freqItemsets.txt');
$Apriori->saveAssociationRules('associationRules.txt');
	$association= $Apriori->getAssociationRules();
		global $prid;
		$key = $prid;
		$result = isset($association[$key]) ? $association[$key] : null;
	$array3[]= array();
	foreach ($result as $key => $value){
		
		if(strpos($key,",")==false){
			array_push($array3,$key);
			echo $key;
			}
		else{
			$few = explode(",",$key);
			foreach($few as $n){
				echo $n;
				array_push($array3,$n);
		}
				
	}
		}
		return $array3;
	
	}






?>
