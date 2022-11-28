if ! docker ps -a | grep -i 'osca'; 
then
  echo 'no container at all installing from scratch'
  cd ../LOCAL_WORKING/Docker && ./setup.sh
elif ! docker ps | grep -i 'osca'; 
then
  echo 'no container running starting...'
  cd ../LOCAL_WORKING/Docker && ./start.sh
else
  echo 'container installed and running no need to do nothing'
fi
