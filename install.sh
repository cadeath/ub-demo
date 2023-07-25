#!/bin/sh
# nano docker.sh && chmod +x docker.sh && sh docker.sh

START=$(date +%s)

apt update
apt install -y apt-transport-https ca-certificates curl software-properties-common
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -

add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu focal stable"
apt update

apt install -y docker-ce git


END=$(date +%s)
DIFF=$(( $END - $START ))
echo "It took $DIFF seconds"
