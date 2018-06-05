! It is not possible to upgrade PocketVJ 1.x to 2.x or to 3.x !

# PocketVJ Control Panel v0.6a

http://www.pocketvj.com

This file is used to control the PocketVJ over the webbrowser.
Put the index.php into your web directory followed by the sync and extplorer folder.

This file is only useful if you use the omxplayer-sync https://github.com/turingmachine/omxplayer-sync script.
Read turingmachines installation instructions and get the custom build of omxplayer.

Only works on a RPI 1.

J.F.Guiton reported that it will not work on a RPI B+, since there is an USB/Ethernet driver missing...

Pre-installed Wifi driver is: Ralink RT5370

##Instruction

Add www-data to your sudoers list with: `visudo` add this line at the end: `www-data ALL=(ALL) NOPASSWD: ALL`

The videofiles have to be stored in `/media/internal/*`

##Fully configured image

Download PocketVJ 1.0 Image (for RPI1 /16gb SD): http://www.pocketvj.com/downloads/vj100.img <br />(to use with win32 diskimager)<br />Download PocketVJ 1.0  (for RPI1/16gb SD) as a GNU Zipped Archive: http://www.pocketvj.com/downloads/vj100.gz <br />(to copy with dd: gzip -dc ~/Desktop/vj100.gz | sudo dd of=/dev/rdisk* bs=1M)<br />

(works only on a rpi1, for wifi and user passwords write me an email)<br />

Download the 3D files to print the case on Thingiverse<br />

Compared to the amount of downloads, there are less than a hand full donations.<br />
Even $5 (for this I can get a coffe around the corner) are very motivating.
https://www.paypal.com/uk/cgi-bin/webscr?cmd=_flow&SESSION=e1F3oj9OySKW1eqxiORZKJq5O1fDJVDsai7B7Mq_9g-YGr53qO8N9qEtFvm&dispatch=5885d80a13c0db1f8e263663d3faee8d333dc9aadeed3fe0b5b299d55fd35542

##Dependencies to install:

sudo apt-get -y install ntfs-3g \
python-pexpect \
vim \
figlet \
git-core \
firmware-ralink \
hostapd udhcpd \
lighttpd \
samba samba-common-bin \
php5-common php5-cgi php5 php5-mysql \
screen \
fbi \
ttf-mscorefonts-installer \
mediainfo \
gparted \
php5-cli \
iptables \
xtightvncviewer \
imagemagick \
dosfstools \
exfat-utils exfat-fuse \
hfsplus hfsprogs hfsutils \
avahi-daemon
