<?php
// Script written by Adam Khoury at www.developphp.com
// VIDEO GUIDE - http://www.developphp.com/view.php?tid=1057
// ----------------------------------------------------------------------------------------
// Obtain user agent which is a long string not meant for human reading
$agent = $_SERVER['HTTP_USER_AGENT']; 
// Get the user Browser now -----------------------------------------------------
// Create the Associative Array for the browsers we want to sniff out
$browserArray = array(
        'Windows Mobile' => 'IEMobile',
	'an Android Device' => 'Android',
	'an iPhone Device' => 'iPhone',
	'Morzilla Firefox' => 'Firefox',
        'Google Chrome' => 'Chrome',
        'Internet Explorer' => 'MSIE',
        'Opera' => 'Opera',
        'Safari' => 'Safari'
); 
foreach ($browserArray as $k => $v) {
    if (preg_match("/$v/", $agent)) {
         break;
    }	else {
	 $k = "Unidentified Platform";
    }
} 
$browser = $k;
// Get the user OS now ------------------------------------------------------------
// Create the Associative Array for the Operating Systems to sniff out
$osArray = array(
        'Windows 98 Device' => '(Win98)|(Windows 98)',
        'Windows 2000 Device' => '(Windows 2000)|(Windows NT 5.0)',
	'Windows ME Device' => 'Windows ME',
        'Windows XP Device' => '(Windows XP)|(Windows NT 5.1)',
        'Windows Vista Device' => 'Windows NT 6.0',
        'Windows 7 Device' => '(Windows NT 6.1)|(Windows NT 7.0)',
        'Windows Device' => '(WinNT)|(Windows NT 4.0)|(WinNT4.0)|(Windows NT)',
	
	'Windows 8' => '(WinNT)|(Windows NT 8.0)|(WinNT8.0)|(Windows NT)',
	'Windows 8.1' => '(WinNT)|(Windows NT 8.1)|(WinNT8.1)|(Windows NT)',
	'Windows 10' => '(WinNT)|(Windows NT 10.0)|(WinNT10.0)|(Windows NT)',
	'Windows' => '(WinNT)|(Windows NT 4.0)|(WinNT4.0)|(Windows NT)',
	
	
	'Linux' => '(X11)|(Linux)',
	'Mac OS' => '(Mac_PowerPC)|(Macintosh)|(Mac OS)'
); 
foreach ($osArray as $k => $v) {
    if (preg_match("/$v/", $agent)) {
         break;
    }	else {
	 $k = "Unknown OS";
    }
} 
$os = $k;
// At this point you can do what you wish with both the OS and browser acquired
//echo '<h1>PHP Tutorial : Get User Browser and Operating System Using Arrays</h1>';
//echo $agent;
//echo "<h2>You are using: <em>$browser <!--on /*$os*/--></em></h2>";
echo $browser;
?>