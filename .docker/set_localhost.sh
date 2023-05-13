#!/bin/bash

export $(cat .env | sed 's/#.*//g'| xargs)

sudo ifconfig lo0 alias ${WEB_IP_ADDRESS}
sudo ifconfig lo0 alias ${DBA_IP_ADDRESS}

#if ! grep -w ${PROJECT_NAME} /private/etc/hosts;
#then
#    echo "A"
#fi
#
#sudo echo "${WEB_IP_ADDRESS}     web.${PROJECT_NAME}.gal" >> /private/etc/hosts
#sudo echo "${DBA_IP_ADDRESS}     dba.${PROJECT_NAME}.gal" >> /private/etc/hosts
