#!/bin/bash

#startx as pi user
su -l pi -c "startx; /usr/bin/calligrastage /media/internal/chillen.pptx" &

#start calligra stage and open .pptx
#sudo /usr/bin/calligrastage /media/internal/*.pptx &