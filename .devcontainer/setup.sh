#!/bin/bash

rm -rf ~/.ssh 
mkdir ~/.ssh
echo "$ID_RSA" | base64 --decode >> ~/.ssh/id_rsa 
chmod 600 ~/.ssh/id_rsa

cp /workspaces/osca/.devcontainer/.ssh/config ~/.ssh/config

cd /workspaces 
rm -rf CodeLibrary 
git clone git@bitbucket.org:legendcorp/codelibrary.git CodeLibrary
