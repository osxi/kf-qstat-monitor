#!/bin/sh

cd /home/zach/qstat/

/usr/bin/quakestat -ut2s 127.0.0.1:7707 -R -P -xml > orig_tmp.xml
/usr/bin/quakestat -ut2s 127.0.0.1:7709 -R -P -xml > doom_tmp.xml
/usr/bin/quakestat -ut2s 127.0.0.1:7711 -R -P -xml > defe_tmp.xml
/usr/bin/quakestat -ut2s 127.0.0.1:7713 -R -P -xml > moon_tmp.xml
/usr/bin/quakestat -ut2s 127.0.0.1:7715 -R -P -xml > hard_tmp.xml

cp orig_tmp.xml orig.xml
cp doom_tmp.xml doom.xml
cp defe_tmp.xml defe.xml
cp moon_tmp.xml moon.xml
cp hard_tmp.xml hard.xml
