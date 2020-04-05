# docker-web
## run docker
docker-compose up -d

## clean all data in docker
docker-compose down -v --rmi all --remove-orphans

## execute command with container docker
docker exec -it <container_name> bash

## if Dockerfile-httpd then use config httpd/vitual.apache.conf