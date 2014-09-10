<?php

if ($_GET['action'] == 'stop') {
	$outputtext =  "player stopped";
	system("sudo /var/www/sync/omxkill.py");
}

if ($_GET['action'] == 'startmaster') {
	exec("sudo /var/www/sync/omxkill.py");
	exec("sudo omxplayer-sync -mu /media/internal/* > /dev/null 2>&1 & echo $!");
	$outputtext = "start player as master";
}

if ($_GET['action'] == 'startslave') {
	$outputtext =  "start player as slave";
	exec("sudo /var/www/sync/omxkill.py");
	exec("sudo omxplayer-sync -lu /media/internal/* > /dev/null 2>&1 & echo $!");
}

if ($_GET['action'] == 'startusb') {
	$outputtext =  "start player in usb mode";
	exec("sudo /var/www/sync/omxkill.py");
	exec("sudo omxplayer-sync -mu /media/usb/* > /dev/null 2>&1 & echo $!");
}

if ($_GET['action'] == 'stopimage') {
	$outputtext =  "image player stopped";
	system("sudo killall fbi");
}

if ($_GET['action'] == 'image') {
	$outputtext =  "start image player";
	system("sudo killall fbi");
	system("sudo /var/www/sync/startimage.py > /dev/null 2>&1 & echo $!");
}

if ($_GET['action'] == 'imageusb') {
	$outputtext =  "start image player from usb";
	system("sudo killall fbi");
	system("sudo /var/www/sync/startimageusb.py > /dev/null 2>&1 & echo $!");
}

if ($_GET['action'] == 'stoppdf') {
	$outputtext = "pdf player stopped";
	system("sudo killall fbgs");
}

if ($_GET['action'] == 'startppt') {
	$outputtext =  "start pdf player";
	system("sudo /var/www/sync/startppt.py > /dev/null 2>&1 & echo $!");
}

if ($_GET['action'] == 'pdfusb') {
	$outputtext =  "start pdf player from usb";
	system("sudo /var/www/sync/startpdfusb.py > /dev/null 2>&1 & echo $!");
}

if ($_GET['action'] == 'reboot') {
	$outputtext =  "rebooting now!";
	system("sudo reboot");
}

if ($_GET['action'] == 'eject') {
	$outputtext =  "usb stick unmounted";
	system("sudo umount /dev/sda1");
}

if ($_GET['action'] == 'mount') {
	$outputtext =  "usb stick mounted";
	system("sudo mount /dev/sda1 /media/usb/");
}

if ($_GET['action'] == 'master') {
	$outputtext = "master set";
	system("sudo cp /var/www/sync/rc.local.master /etc/rc.local");
}

if ($_GET['action'] == 'slave') {
	$outputtext =  "slave set";
	system("sudo cp /var/www/sync/rc.local.slave /etc/rc.local");
}

if ($_GET['action'] == 'extension1') {
	$outputtext =  "extension1 set";
	system("sudo cp /var/www/sync/rc.local.ext1 /etc/rc.local");
}

if ($_GET['action'] == 'usb') {
	$outputtext =  "usb mode set";
	system("sudo cp /var/www/sync/rc.local.usb /etc/rc.local");
}

if ($_GET['action'] == 'setimage') {
	$outputtext =  "usb mode set";
	system("sudo cp /var/www/sync/rc.local.image /etc/rc.local");
}

if ($_GET['action'] == 'setimageusb') {
	$outputtext =  "usb mode set";
	system("sudo cp /var/www/sync/rc.local.imageusb /etc/rc.local");
}

if ($_GET['action'] == 'bootconf') {
	$outputtext =  "custom boot conf to boot";
	system("sudo cp /media/internal/config.txt /boot/config.txt");
}

if ($_GET['action'] == 'hdmi1') {
	$output =  "forced to use hdmi VGA";
	system("sudo cp /var/www/sync/forcehdmi1 /boot/config.txt");
}

if ($_GET['action'] == 'hdmi4') {
	$outputtext =  "forced to use hdmi 720p";
	system("sudo cp /var/www/sync/forcehdmi4 /boot/config.txt");
}

if ($_GET['action'] == 'hdmivga') {
	$outputtext =  "hdmi to vga 800x600";
	system("sudo cp /var/www/sync/forcevga /boot/config.txt");
}

if ($_GET['action'] == 'clean') {
	$outputtext =  "clean hidden files";
	system("sudo rm -R /media/media/.[DTf_]*");
}

if ($_GET['action'] == 'getresolution') {
	$output = shell_exec('sudo tvservice -s');
	$outputtext =  "<pre>$output</pre>";
}

if ($_GET['action'] == 'screenon') {
	$outputtext = shell_exec('sudo /opt/vc/bin/tvservice -p');	
}


if ($_GET['action'] == 'screenoff') {
	$outputtext = shell_exec('sudo /opt/vc/bin/tvservice -o');
}

if ($_GET['action'] == 'codecinfo') {
	$output = shell_exec('mediainfo --Inform="General;%CompleteName%  Format: %Format% Codec: %CodecID%  Bitrate: %OverallBitRate%  " /media/internal/*');
	$preoutputtext =  "<pre>$output</pre>";
	$outputtext = wordwrap($preoutputtext, 33, "<br />\n");
}

if ($_GET['action'] == 'movieinfo') {
	$output = shell_exec('mediainfo --Inform="Video;Videosize: %Width%x%Height% pixel  " /media/internal/*');
	$preoutputtext2 = "<pre>$output</pre>";
	$newtext = wordwrap($preoutputtext2, 30, "<br />\n");
	$outputtext = "$newtext\n";
}

if ($_GET['action'] == 'firmware') {
	$outputtext =  "upgrade player and sync";
	system("sudo cp /media/usb/omxplayer /usr/bin/omxplayer");
	system("sudo cp /media/usb/omxplayer.bin /usr/bin/omxplayer.bin");
	system("sudo cp /media/usb/omxplayer-sync /usr/bin/omxplayer-sync");
}

if ($_GET['action'] == 'controlpanel') {
	$outputtext =  "update controlpanel";
	system("sudo cp -r /media/usb/www/* /var/www");
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Configuration</title>
<style type="text/css">
body {
	background-color: #FFFFFF;
	font-family: "Courier New", Courier, monospace;
	font-size: 18px;
	font-style: normal;
	text-align: center;
	color: #F90;
}
.text_01 {
	text-align: center;
}
.text_01 {
	font-size: 10px;
}
.header_02 {
	font-size: 18px;
	font-weight: bold;
	text-align: center;
	font-family: Arial, Helvetica, sans-serif;
}
.description {
	font-size: 10px;
}
.description {
	color: #333;
	font-family: Arial, Helvetica, sans-serif;
}
.header_02top {
}
.header_02top {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	font-style: normal;
	color: #000;
	font-weight: normal;
}
</style>
<script type="text/javascript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
</script>
</head>

<body>
<p class="header_02"><span class="description"><span class="header_02top">PocketVJ Control Panel v0.14b </span></span></p>
<p class="header_02"><span class="description"><span class="header_02top"><span class="header_02"><span class="description">____________________________________________</span></span></span></span></p>
<table width="380" border="1" align="center" cellpadding="4">
  <tr>
    <td><p class="header_02"><?php echo $outputtext; ?></p>
    <p class="header_02">&nbsp;</p></td>
  </tr>
</table>
<p class="header_02"><span class="header_02top">***********************<span class="description">status messages  in orange</span>************************</span></p>
<table width="380" border="0" align="center" cellspacing="4">
  <tr>
    <td width="190" height="40"><a href="?action=stop"><img src="pics/stop.png" width="190" height="40" alt="STOP" /></a></td>
    <td width="190" height="40" class="description"><p align="left">stop the player before doing any other action</p></td>
  </tr>
  <tr>
    <td height="40"><a href="?action=startmaster"><img src="pics/start.png" width="190" height="40" alt="START" /></a></td>
    <td width="190" height="40" class="description"><div align="left">may take a while, dont hit it more than ones!</div></td>
  </tr>
  <tr>
    <td width="190" height="40"><a href="?action=startslave"><img src="pics/start_slave.png" width="190" height="40" alt="START_slave" /></a></td>
    <td width="190" height="40" class="description"><div align="left">may take a while, dont hit it more than ones!</div></td>
  </tr>
  <tr>
    <td height="40"><a href="?action=startusb"><img src="pics/start_usb.png" width="190" height="40" alt="START_usb" /></a></td>
    <td width="190" height="40" class="description"><div align="left">may take a while, dont hit it more than ones!</div></td>
  </tr>
  <tr>
    <td height="40"><a href="?action=stopimage"><img src="pics/stopimage.png" width="190" height="40" alt="stop image viewer" /></a></td>
    <td height="40" class="description"><div align="left">stops the image viewer</div></td>
  </tr>
  <tr>
    <td height="40"><a href="?action=image"><img src="pics/start_image.png" width="190" height="40" alt="imageplayer" /></a></td>
    <td height="40" class="description"><div align="left">starts the image viewer (plays all image files from internal storage) within 5sec.</div></td>
  </tr>
  <tr>
    <td height="40"><a href="?action=imageusb"><img src="pics/start_imageusb.png" width="190" height="40" alt="imageplayer from usb" /></a></td>
    <td height="40" class="description"><div align="left">starts the image viewer (plays all image files from usb storage) within 5sec.</div></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="380" border="0" align="center" cellspacing="4">
  <tr>
    <td width="190" height="40"><a href="/eXtplorer/index.php" target="new"><img src="pics/open.png" width="190" height="40" alt="OPEN_filebrowser" /></a></td>
    <td width="190" height="40" class="description"><p align="left">open filebrowser in a new tab</p></td>
  </tr>
  <tr>
    <td width="190" height="40"><a href="?action=clean"><img src="pics/clean.png" width="190" height="40" alt="CLEAN" /></a></td>
    <td width="190" height="40" class="description"><p align="left">remove unwanted hidden files</p></td>
  </tr>
  <tr>
    <td width="190" height="40"><a href="?action=eject"><img src="pics/eject.png" width="190" height="40" alt="EJECT" /></a></td>
    <td width="190" height="40" class="description"><p align="left">eject the usb stick, if you forget it will not be readable on your computer!</p></td>
  </tr>
  <tr>
    <td width="190" height="40"><a href="?action=mount"><img src="pics/mount.png" width="190" height="40" alt="MOUNT" /></a></td>
    <td width="190" height="40" class="description"><p align="left">mount usb stick</p></td>
  </tr>
  <tr>
    <td width="190" height="40"><a href="?action=reboot"><img src="pics/reboot.png" width="190" height="40" alt="REBOOT" /></a></td>
    <td width="190" height="40" class="description"><p align="left">reboot</p></td>
  </tr>
</table>
<p>Settings for Display:</p>
<table width="380" border="0" align="center" cellspacing="4">
  <tr>
    <td height="40"><a href="?action=getresolution"><img src="pics/resolution.png" width="190" height="40" alt="RESOLUTION" /></a></td>
    <td width="190" height="40" class="description"><p align="left">get the actual resolution of connected display / projector</p></td>
  </tr>
  <tr>
    <td width="190" height="40"><a href="?action=screenon"><img src="pics/screen_on.png" width="190" height="40" alt="screen on" /></a></td>
    <td width="190" height="40" class="description"><p align="left">wake up connected screen with preferred settings (CEC)</p></td>
  </tr>
  <tr>
    <td width="190" height="40"><a href="?action=screenoff"><img src="pics/screen_off.png" width="190" height="40" alt="screen off" /></a></td>
    <td width="190" height="40" class="description"><p align="left">put the connected screen to power sleep (CEC)</p></td>
  </tr>
</table>
<p>Movie Information:</p>
<table width="380" border="0" align="center" cellspacing="4">
  <tr>
    <td width="190" height="40"><a href="?action=codecinfo"><img src="pics/codecinfo.png" width="190" height="40" alt="MASTER" /></a></td>
    <td width="190" height="40" class="description"><p align="left">get infos of movies on internal storage: Name Format Codec Bitrate</p></td>
  </tr>
  <tr>
    <td height="40"><a href="?action=movieinfo"><img src="pics/movieresolution.png" width="190" height="40" alt="update" /></a></td>
    <td height="40" class="description"><p align="left">get movie resolution</p></td>
  </tr>
</table>
<p>Settings for Boot/Autostart:</p>
<table width="380" border="0" align="center" cellspacing="4">
  <tr>
    <td width="190" height="40"><a href="?action=master"><img src="pics/setmaster.png" width="190" height="40" alt="MASTER" /></a></td>
    <td width="190" height="40" class="description"><p align="left">set to autostart as master</p></td>
  </tr>
  <tr>
    <td width="190" height="40"><a href="?action=slave"><img src="pics/setslave.png" width="190" height="40" alt="SLAVE" /></a></td>
    <td width="190" height="40" class="description"><p align="left">set to autostart as slave</p></td>
  </tr>
  <tr>
    <td height="40"><a href="?action=extension1"><img src="pics/extension1.png" width="190" height="40" alt="EXT1" /></a></td>
    <td width="190" height="40" class="description"><p align="left">set autostart to extension1</p></td>
  </tr>
  <tr>
    <td width="190" height="40"><a href="?action=usb"><img src="pics/setusb.png" width="190" height="40" alt="USB" /></a></td>
    <td width="190" height="40" class="description"><p align="left">set autostart to usb disk mode, there must be a usb stick attached at boot!</p></td>
  </tr>
  <tr>
    <td height="40"><a href="?action=setimage"><img src="pics/setimage.png" width="190" height="40" alt="set image player" /></a></td>
    <td height="40" class="description"><p align="left">set autostart to image viewer, plays all .jpg images from intern memory</p></td>
  </tr>
  <tr>
    <td height="40"><a href="?action=setimageusb"><img src="pics/setimageusb.png" width="190" height="40" alt="set usb image player" /></a></td>
    <td height="40" class="description"><p align="left">set autostart to image viewer from usb, plays all .jpg images from usb(stick must be present on boot!)</p></td>
  </tr>
  <tr>
    <td height="40"><a href="?action=bootconf"><img src="pics/bootconf.png" width="190" height="40" alt="boot conf custom" /></a></td>
    <td height="40" class="description"><p align="left">copy custom conf.txt from internal to bootloader</p></td>
  </tr>
  <tr>
    <td width="190" height="40"><a href="?action=hdmi1"><img src="pics/hdmi1.png" width="190" height="40" alt="HDMI1" /></a></td>
    <td width="190" height="40" class="description"><p align="left">set autostart to force HDMI to VGA</p></td>
  </tr>
  <tr>
    <td width="190" height="40"><a href="?action=hdmi4"><img src="pics/hdmi4.png" width="190" height="40" alt="HDMI4" /></a></td>
    <td width="190" height="40" class="description"><p align="left">set autostart to force HDMI 720p</p></td>
  </tr>
  <tr>
    <td height="40"><a href="?action=forcevga"><img src="pics/forcevga.png" width="190" height="40" alt="force vga" /></a></td>
    <td height="40" class="description"><p align="left">set autostart to use HDMI to VGA converter with a resolution of 800x600</p></td>
  </tr>
</table>
<p>Settings for Firmware/System:</p>
<table width="380" border="0" align="center" cellspacing="4">
  <tr>
    <td width="190" height="40"><a href="?action=firmware"><img src="pics/firmware_update.png" width="190" height="40" alt="MASTER" /></a></td>
    <td width="190" height="40" class="description"><p align="left">Upgrade to new Firmware from USB Stick</p></td>
  </tr>
  <tr>
    <td height="40"><a href="?action=controlpanel"><img src="pics/cp_upgrade.png" width="190" height="40" alt="update" /></a></td>
    <td height="40" class="description"><p align="left">Update to new ControlPanel from USB</p></td>
  </tr>
</table>
<p><span class="header_02top">***************************************************************</span></p>
<p class="header_02"><span class="header_02top">©2014 by magdesign.ch</span></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
