! It is not possible to upgrade PocketVJ 1.0 to 2.0 or 3.0 !

# PocketVJ Control Panel

http://www.pocketvj.com

This file is used to control the PocketVJ over the webbrowser.
Put the index.php into your web directory followed by the sync and extplorer folder.

This file is only useful if you use the omxplayer-sync https://github.com/turingmachine/omxplayer-sync script.
Read turingmachines installation instructions and get the custom build of omxplayer.

Only works on a RPI 1.

Pre-installed Wifi driver is: Ralink RT5370

##Instruction

Add www-data to your sudoers list with: `visudo` add this line at the end: `www-data ALL=(ALL) NOPASSWD: ALL`

The videofiles have to be stored in `/media/internal/*`


##Dependencies to install:

apt-get -y install ntfs-3g

apt-get -y install python-pexpect

apt-get -y install vim

apt-get -y install figlet

apt-get -y install git-core

apt-get -y install firmware-ralink

apt-get -y install hostapd udhcpd

apt-get -y install lighttpd

apt-get -y install samba samba-common-bin

apt-get -y install php5-common php5-cgi php5 php5-mysql

apt-get -y install screen

apt-get -y install fbi

apt-get -y install ttf-mscorefonts-installer

apt-get -y install mediainfo

apt-get -y install gparted

apt-get -y install php5-cli

apt-get -y install iptables

apt-get -y install xtightvncviewer

apt-get -y install imagemagick

apt-get -y install dosfstools

apt-get -y install exfat-utils exfat-fuse

apt-get -y install hfsplus hfsprogs hfsutils

apt-get -y install avahi-daemon
