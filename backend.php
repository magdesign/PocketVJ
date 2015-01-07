<?php



if ($_GET['action'] == 'stop') {
	$outputtext =  "player stopped";
	system("sudo /var/www/sync/omxkill.py");
	system("sudo /var/www/sync/testscreenoff.py &");
}

if ($_GET['action'] == 'startmaster') {
	exec("sudo /var/www/sync/omxkill.py");
	exec("sudo /var/www/sync/startmaster.py");
	$outputtext = "start player as master";
}

if ($_GET['action'] == 'startmasteronce') {
	exec("sudo /var/www/sync/omxkill.py");
	exec("sudo /var/www/sync/startmasterone.py");
	$outputtext = "start player as master once";
}


if ($_GET['action'] == 'startslave') {
       exec("sudo /var/www/sync/omxkill.py");
	exec("sudo /var/www/sync/startslave.py");
	$outputtext =  "start player as slave";
}

if ($_GET['action'] == 'startusb') {
       exec("sudo /var/www/sync/omxkill.py");
	exec("sudo /var/www/sync/startmasterusb.py");
	$outputtext =  "start player in usb mode";	
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


if ($_GET['action'] == 'audio') {
	exec("sudo /var/www/sync/omxkill.py");
	exec("sudo omxplayer-sync -mu /media/internal/*.mp3 > /dev/null 2>&1 & echo $!");
	$outputtext = "start audio player";
}


if ($_GET['action'] == 'audiousb') {
	$outputtext =  "start audio player in usb mode";
	exec("sudo /var/www/sync/omxkill.py");
	exec("sudo omxplayer-sync -mu /media/usb/*.mp3 > /dev/null 2>&1 & echo $!");
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
	$outputtext =  "set to image player";
	system("sudo cp /var/www/sync/rc.local.image /etc/rc.local");
}

if ($_GET['action'] == 'setimageusb') {
	$outputtext =  "image player usb mode set";
	system("sudo cp /var/www/sync/rc.local.imageusb /etc/rc.local");
}

if ($_GET['action'] == 'setaudio') {
	$outputtext =  "autostart audio set";
	system("sudo cp /var/www/sync/rc.local.audio /etc/rc.local");
}

if ($_GET['action'] == 'setaudiousb') {
	$outputtext =  "autostart audio usb set";
	system("sudo cp /var/www/sync/rc.local.audiousb /etc/rc.local");
}

if ($_GET['action'] == 'bootconf') {
	$outputtext =  "custom boot conf to boot";
	system("sudo cp /media/internal/config.txt /boot/config.txt");
}

if ($_GET['action'] == 'bootconfusb') {
	$outputtext =  "custom boot conf from usb to boot";
	system("sudo cp /media/usb/config.txt /boot/config.txt");
}

if ($_GET['action'] == 'hdmireset') {
	$output =  "reset resolution settings";
	system("sudo cp /var/www/sync/defaulthdmi /boot/config.txt");
}

if ($_GET['action'] == 'hdmi1') {
	$output =  "forced to use hdmi VGA";
	system("sudo cp /var/www/sync/forcehdmi1 /boot/config.txt");
}

if ($_GET['action'] == 'hdmi4') {
	$outputtext =  "forced to use hdmi 720p";
	system("sudo cp /var/www/sync/forcehdmi4 /boot/config.txt");
}

if ($_GET['action'] == 'hdmi5') {
	$outputtext =  "forced to fullHD 1080";
	system("sudo cp /var/www/sync/forcehdmi5 /boot/config.txt");
}

if ($_GET['action'] == 'hdmivga') {
	$outputtext =  "hdmi to vga 800x600";
	system("sudo cp /var/www/sync/forcevga /boot/config.txt");
}

if ($_GET['action'] == 'clean') {
	$outputtext =  "clean hidden files";
	system("sudo rm -R /media/internal/.[DTf_]*");
}

if ($_GET['action'] == 'getresolution') {
	$output = shell_exec('sudo tvservice -s');
	$preoutputtext =  "<pre>$output</pre>";
	$outputtext = wordwrap($preoutputtext, 51, "<br />\n");
}

if ($_GET['action'] == 'testscreen') {
    exec("sudo /var/www/sync/omxkill.py");
	system("sudo killall fbi");
	system("sudo /var/www/sync/testscreen.py &");
    $outputtext =  "testscreen activated"; 
}

if ($_GET['action'] == 'testscreenoff') {
    system("sudo /var/www/sync/testscreenoff.py &");
	$outputtext =  "testscreen deactivated";
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
	$outputtext =  "update ControlPanel USB";
	system("sudo cp -r /media/usb/www/* /var/www");
	system("sudo chmod 755 -R /var/www");
}

if ($_GET['action'] == 'controlpanelintern') {
	$outputtext =  "update ControlPanel internal";
	system("sudo cp -r /media/internal/www/* /var/www");
	system("sudo chmod 755 -R /var/www");
}

if ($_GET['action'] == 'factoryreset') {
	$outputtext =  "factory reset system";
	system("sudo cp /var/www/sync/omxplayer-sync /usr/bin/omxplayer-sync");
    system("sudo cp /var/www/sync/defaulthdmi /boot/config.txt");
    system("sudo cp /var/www/sync/rc.local.master /etc/rc.local"); 
	system("sudo chmod 755 -R /var/www");
}

if ($_GET['action'] == 'removeold') {
	$outputtext =  "old cp removed";
	system("sudo rm /var/www/index.php");

}


if ($_GET['action'] == 'volume_up') {
	system("sudo su - pi -c 'amixer set Master 10%+'");
	$outputtext =  "<pre>$output</pre>";
}

if ($_GET['action'] == 'volume_down') {
	system("sudo su - pi -c 'amixer set Master 10%-'");
	$outputtext =  "<pre>$output</pre>";
}


if ($_GET['action'] == 'hdmi_out') {
	system("sudo sed -ri 's/-o [a-z]+/-o hdmi/' /etc/rc.local");
	system("sudo sed -ri 's/-o [a-z]+/-o hdmi/' /var/www/sync/startmaster.py");
	system("sudo sed -ri 's/-o [a-z]+/-o hdmi/' /var/www/sync/startmasterusb.py");
	system("sudo sed -ri 's/-o [a-z]+/-o hdmi/' /var/www/sync/startmasterone.py");
	system("sudo sed -ri 's/-o [a-z]+/-o hdmi/' /var/www/sync/startslave.py");
	$outputtext =  "Audio set to HDMI";
}

if ($_GET['action'] == 'jack_out') {
	system("sudo sed -ri 's/-o [a-z]+/-o local/' /etc/rc.local");
	system("sudo sed -ri 's/-o [a-z]+/-o local/' /var/www/sync/startmaster.py");
	system("sudo sed -ri 's/-o [a-z]+/-o local/' /var/www/sync/startmasterusb.py");
	system("sudo sed -ri 's/-o [a-z]+/-o local/' /var/www/sync/startmasterone.py");
	system("sudo sed -ri 's/-o [a-z]+/-o local/' /var/www/sync/startslave.py");
	$outputtext =  "Audio set to Jack";
}

if ($_GET['action'] == 'both_out') {
	system("sudo sed -ri 's/-o [a-z]+/-o both/' /etc/rc.local");
	system("sudo sed -ri 's/-o [a-z]+/-o both/' /var/www/sync/startmaster.py");
	system("sudo sed -ri 's/-o [a-z]+/-o both/' /var/www/sync/startmasterusb.py");
	system("sudo sed -ri 's/-o [a-z]+/-o both/' /var/www/sync/startmasterone.py");
	system("sudo sed -ri 's/-o [a-z]+/-o both/' /var/www/sync/startslave.py");
	$outputtext =  "Audio set to both";
}

if ($_GET['action'] == 'screenshare') {
	$outputtext =  "set to screenshare mode";
	system("sudo cp /var/www/sync/rc.local.screenshare /etc/rc.local");
}

echo $outputtext;
?>