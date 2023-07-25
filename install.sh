#!/bin/sh
# nano install.sh && chmod +x install.sh && sh install.sh

START=$(date +%s)

apt update
apt install -y apt-transport-https ca-certificates curl software-properties-common
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -

add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu focal stable"
apt update

apt install -y docker-ce git vsftpd

git clone https://github.com/cadeath/ub-demo.git && cd ub-demo
docker compose build

rm /etc/vsftpd.conf
cp config/vsftpd.conf /etc/vsftpd.conf
service vsftpd restart

END=$(date +%s)
DIFF=$(( $END - $START ))
echo "It took $DIFF seconds"

# adduser <user>
# usermod -aG docker $USER 
