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

This covers the essentials you’d need for most Docker operations.