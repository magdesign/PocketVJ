#!/bin/bash
sudo cp /media/internal/depencies_01/dosfstools_3.0.13-1+rpi1_armhf.deb /var/cache/apt/archives/dosfstools_3.0.13-1+rpi1_armhf.deb
sudo rm /media/internal/depencies_01/dosfstools_3.0.13-1+rpi1_armhf.deb
sudo dpkg -i *.deb /var/cache/apt/archives/dosfstools_3.0.13-1+rpi1_armhf.deb

sudo cp /media/internal/depencies_01/exfat-fuse_0.9.7-2_armhf.deb /var/cache/apt/archives/exfat-fuse_0.9.7-2_armhf.deb
sudo rm /media/internal/depencies_01/exfat-fuse_0.9.7-2_armhf.deb 
sudo dpkg -i *.deb /var/cache/apt/archives/exfat-fuse_0.9.7-2_armhf.deb


sudo cp /media/internal/depencies_01/exfat-utils_0.9.7-2_armhf.deb /var/cache/apt/archives/exfat-utils_0.9.7-2_armhf.deb
sudo rm /media/internal/depencies_01/exfat-utils_0.9.7-2_armhf.deb
sudo dpkg -i *.deb /var/cache/apt/archives/exfat-utils_0.9.7-2_armhf.deb


sudo cp /media/inernal/depencies_01/hfsplus_1.0.4-12_armhf.deb /var/cache/apt/archives/hfsplus_1.0.4-12_armhf.deb
sudo rm /media/inernal/depencies_01/hfsplus_1.0.4-12_armhf.deb
sudo dpkg -i *.deb /var/cache/apt/archives/hfsplus_1.0.4-12_armhf.deb


sudo cp /media/internal/depencies_01/hfsprogs_332.25-10_armhf.deb /var/cache/apt/archives/hfsprogs_332.25-10_armhf.deb
sudo rm /media/internal/depencies_01/hfsprogs_332.25-10_armhf.deb
sudo dpkg -i *.deb /var/cache/apt/archives/hfsprogs_332.25-10_armhf.deb


sudo cp /media/internal/depencies_01/hfsutils_3.2.6-11_armhf.deb  /var/cache/apt/archives/hfsutils_3.2.6-11_armhf.deb
sudo rm /media/internal/depencies_01/hfsutils_3.2.6-11_armhf.deb
sudo dpkg -i *.deb /var/cache/apt/archives/hfsutils_3.2.6-11_armhf.deb


sudo cp /media/internal/depencies_01/libhfsp0_1.0.4-12_armhf.deb /var/cache/apt/archives/libhfsp0_1.0.4-12_armhf.deb
sudo rm /media/internal/depencies_01/libhfsp0_1.0.4-12_armhf.deb
sudo dpkg -i *.deb /var/cache/apt/archives/libhfsp0_1.0.4-12_armhf.deb

sudo rm -R /media/internal/depencies_01/


