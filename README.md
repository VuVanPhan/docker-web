# docker-web
## run docker
docker-compose up -d

## clean all data in docker
docker-compose down -v --rmi all --remove-orphans

## execute command with container docker
docker exec -it <container_name> bash

## if Dockerfile-httpd then use config httpd/vitual.apache.conf

## In docker, the database host is not localhost but the container name of the database service.
## If your database container is named nextcloud_db, then your hostname should be nextcloud_db and not localhost
mysql:host=mariadb

## This works due to docker container networks: 
https://docs.docker.com/engine/userguide/networking/dockernetworks/

## Alternatively you can grab the IP of all running containers via:
docker inspect -f '{{.Name}} - {{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' $(docker ps -aq)

## Add line to vitual.apache.conf : enable rewrite apache
LoadModule rewrite_module modules/mod_rewrite.so

## Link phpmyadmin
http://localhost:8080
server : mariadb
user : user1
pass : mypassuser123