#!/bin/bash
echo 'Instaling Arcade...'
cd _arcade/src/ && echo "$ARCADE_CONFIG" >> .env.development.local && echo "$ARCADE_CONFIG" >> .env.production.local

npm install --unsafe-perm;
npm run build;

rm .env.development.local && .env.production.local

echo 'Arcade installed!'