basic docker commands:

docker run -d -p 3000:3000 --name run-node-app basic-node-app
docker stop run-node-app
docker images
docker rm run-node-app
docker rmi basic-node-app

docker-compose commands:

docker-compose up -d
docker-compose down