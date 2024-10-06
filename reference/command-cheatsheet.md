Here’s a concise Docker cheatsheet for quick reference:

### **Basic Docker Commands**
- **List images**:
  `docker images`

- **List containers (running)**:
  `docker ps`

- **List containers (all)**:
  `docker ps -a`

- **Run a container**:
  `docker run [options] IMAGE [command] [args]`

- **Stop a container**:
  `docker stop CONTAINER`

- **Start a container**:
  `docker start CONTAINER`

- **Remove a container**:
  `docker rm CONTAINER`

- **Remove an image**:
  `docker rmi IMAGE`

- **Remove all stopped containers**:
  `docker container prune`

- **Remove all unused images**:
  `docker image prune`

- **Remove all unused volumes**:
  `docker volume prune`

- **Remove all unused Docker resources**:
  `docker system prune`

- **Remove all unused Docker resources including volumes**:
  `docker system prune --volumes`

- **List dangling volumes**:
  `docker volume ls -f dangling=true`

- **Remove all unused Docker resources (including non-dangling images)**:
  `docker system prune -a`

- **Remove all unused Docker resources (including non-dangling images and volumes)**:
  `docker system prune -a --volumes`

### **Building & Managing Images**
- **Build an image**:
  `docker build -t TAG .`

- **Tag an image**:
  `docker tag SOURCE_IMAGE TARGET_IMAGE`

- **Push an image to Docker Hub**:
  `docker push IMAGE`

- **Pull an image from Docker Hub**:
  `docker pull IMAGE`

### **Container Networking**
- **Check container logs**:
  `docker logs CONTAINER`

- **Enter a running container**:
  `docker exec -it CONTAINER /bin/bash`

- **Run container with port binding**:
  `docker run -p HOST_PORT:CONTAINER_PORT IMAGE`

### **Volumes & Persistent Storage**
- **List volumes**:
  `docker volume ls`

- **Create a volume**:
  `docker volume create VOLUME_NAME`

- **Mount a volume**:
  `docker run -v VOLUME_NAME:/path/in/container IMAGE`

- **Remove a volume**:
  `docker volume rm VOLUME_NAME`

### **Docker Compose**
- **Start services**:
  `docker-compose up`

- **Start in detached mode**:
  `docker-compose up -d`

- **Stop services**:
  `docker-compose down`

- **Rebuild services**:
  `docker-compose up --build`


### docker-compose run VS up VS build

`docker-compose up`: Start or restart services. builds the images if they don't exist, but it doesn't rebuild them unless explicitly told to
  `docker-compose up`: Starts the services in the foreground, so you can see logs.
  `docker-compose up -d`: Starts the services in the background.
  `docker-compose up --build`: Rebuilds the images before starting the services. only needed if you've made changes to the Dockerfile
`docker-compose run`: Run a one-off command in a container. to run a specific command inside a container, such as running tests or database migrations, without starting the full service. It doesn’t start dependent services unless explicitly mentioned. when you want to interact with a specific container in an isolated context
  `docker-compose run service_name <command>`:
    `docker-compose run backend sh` run shell inside service
    `docker-compose run backend npm run migration` one off command
`docker-compose build`: Build or rebuild images for the services defined in docker-compose.yml. When you modify the Dockerfile, package.json, or any files in your build context. only builds images but doesn’t start any containers

- you want to bring whole stack up: `docker-compose up`
- you made changes to the Dockerfile: `docker-compose build` or `docker-compose up --build`
- you want to run a command in a container without starting up entire stack: `docker-compose run service_name <command>`

Example workflow:

```bash
docker-compose up --build -d # build new image after modifying Dockerfile
docker-compose up -d # restart container without rebuilding
docker-compose run backend sh # execute a command in a container
docker-compose build backend # modified backend Dockerfile and need to rebuild image
```

### run vs exec

`docker-compose run`: creates a new container based on the service defined in the docker-compose.yml. It doesn’t need the service to be already running. new container will have its own lifecycle and won't affect existing ones. Use cases: migrations, tests
`docker-compose exec`: Executes a command inside an already running container. interact with or run a command in a container that is already running. Service must already be running with `docker-compose up`. Use cases: debugging, interacting with app