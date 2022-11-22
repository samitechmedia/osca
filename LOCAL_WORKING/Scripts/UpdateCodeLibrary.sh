#!/bin/bash

runDir=$(pwd);
siteRoot=$runDir/../..
siteCodeLibraryDir=$runDir/../../CodeLibrary
mainCodeLibraryRepo=$runDir/../../../CodeLibrary

# check the code library exists in the projects folder
if [ ! -d "$mainCodeLibraryRepo" ];
then
    git clone git@bitbucket.org:legendcorp/codelibrary.git $mainCodeLibraryRepo;
    mkdir $siteCodeLibraryDir;
else
    cd $siteRoot;
    rm -Rfv $siteCodeLibraryDir;
    git checkout master CodeLibrary --force;
    cd $runDir;
fi
cd $mainCodeLibraryRepo;
git checkout master --force;
git pull origin master;
cd $runDir;
cp -Rvn $mainCodeLibraryRepo/* $siteCodeLibraryDir;
