# SVXLink-Dashboard-V2
SVXLink Node dashboard repository inspired by pi star dashboard
Originally constructed by SP2ONG and SP0DZ, but suffers from out of date code in PHP and Javascript.
Brought up to date by Chris Jackson G4NAB

No installation script required, simply cd to /var/www a,d remove any existing html folder.
 sudo git clone https://github.com/f5vmr/SVXLink-Dashboard-V2 html
chown svxlink -R html


To activate mDNS (host.local) use:
```
 sudo apt-get install avahi-daemon avahi-utils
```
The following is required if using an SA818 device.

RF configurator is based on sa818 programming library (https://github.com/0x9900/SA818)
```
sudo apt install python3
sudo apt install python3-pip
sudo pip3 install sa818
```


The svxlink dashboard has some ideas created by SP2ONG, SP0DZ
and finished off by G4NAB
