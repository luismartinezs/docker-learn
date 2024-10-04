basic front + back app

- separate dockerfiles for FE and BE
- docker compose file to run both services
- make sure they can talk to each other
  - set backend port
  - in docker compose explicitly create network (optional?) so containers can talk to each other
  - call backend from frontend using http://backend:3001/api
  - make sure backend exposes port 3001
- setup cors in backend, without setting up cors explicitly, the front fails to request data from backend

commands

docker compose up --build -d
docker compose down
