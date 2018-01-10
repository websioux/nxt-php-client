<?php
include('../private-config.php');
echo "Ready to create plugin for ".SERVER_PATH."\n\n";
$sQ = "What is the name ID of your project: ";
echo "\n$sQ";
$sId = trim(fgets(STDIN));
if(strlen($sId)<1 )
	die;
$sQ = "Display name: ";
echo "\n\n$sQ";
$sDisplay = trim(fgets(STDIN));
if(strlen($sDisplay)<1 )
	$sDisplay = $sId;
$sQ = "Description: ";
echo "\n\n$sQ";
$sDesc = trim(fgets(STDIN));
if(strlen($sDesc)<1 )
	$sDesc = 'demo';
$sQ = "URL: ";
echo "\n\n$sQ";
$sUrl = trim(fgets(STDIN));
if(strlen($sUrl)<1 )
	$sUrl = 'https://notbot.me';

$sManifest = '{
  "pluginVersion": 1,
  "name": "'.$sDisplay.'",
  "myVersion": "v.1.0",
  "shortDescription": "'.$sDesc.'",
  "infoUrl": "'.$sUrl.'",
  "startPage": "p_'.$sId.'",
  "nrsVersion": "1.5.0",
  "deactivated": false
}';

echo $sManifest;

$sCmd = 'cp -r '.SERVER_PATH.'/html/www/plugins//hello_world '.SERVER_PATH.'/html/www/plugins/'.$sId;
exec($sCmd);
$f = fopen(SERVER_PATH.'/html/www/plugins/'.$sId.'/manifest.json','w');
fwrite($f,$sManifest);
fclose($f);

chdir(SERVER_PATH.'/html/www/plugins/'.$sId);
exec('rm *.gz');
exec('gzip -k manifest.json');

chdir(SERVER_PATH.'/html/www/plugins/'.$sId.'/css');
exec('rm *.gz');
exec('mv hello_world.css '.$sId.'.css');
exec('gzip -k '.$sId.'.css');

chdir(SERVER_PATH.'/html/www/plugins/'.$sId.'/js');
exec('rm *.gz');
exec('mv nrs.hello_world.js nrs.'.$sId.'.js');
exec('sed -i s@hello_world@'.$sId.'@g nrs.'.$sId.'.js');
exec('gzip -k nrs.'.$sId.'.js');

chdir(SERVER_PATH.'/html/www/plugins/'.$sId.'/html/pages');
exec('rm *.gz');
exec('mv hello_world.html '.$sId.'.html');
exec('sed -i s@hello_world@'.$sId.'@g '.$sId.'.html');
exec('gzip -k '.$sId.'.html');

chdir(SERVER_PATH.'/html/www/plugins/'.$sId.'/html/modals');
exec('rm *.gz');
exec('mv hello_world.html '.$sId.'.html');
exec('sed -i s@hello_word@'.$sId.'@g '.$sId.'.html');
exec('sed -i s@hello_world@'.$sId.'@g '.$sId.'.html');
exec('gzip -k '.$sId.'.html');

