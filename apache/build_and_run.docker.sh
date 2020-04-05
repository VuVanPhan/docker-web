NAME=thu

# build an images from Dockerfile
docker build -t $NAME .

# run container from an images
docker run -p 8080:80 -d $NAME