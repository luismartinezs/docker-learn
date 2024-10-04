Here’s a typical lifecycle of Docker commands, starting from creating a Docker image to eventually removing it, covering common operations in between.

### **1. Build a Docker Image**

```bash
docker build -t your-image-name .
```
- **`-t your-image-name`**: Tags the image with a name.
- **`.`**: The location of your `Dockerfile` (usually the current directory).

### **2. List Docker Images**
View the available images on your system.

```bash
docker images
```

### **3. Run a Docker Container**

```bash
docker run -d -p 3000:3000 --name your-container-name your-image-name
```
- **`-d`**: Runs the container in detached mode (in the background).
- **`-p 3000:3000`**: Maps port 3000 on your host to port 3000 in the container.
- **`--name your-container-name`**: Names your container.
- **`your-image-name`**: The image to run.

### **4. List Running Containers**
View all running containers.

```bash
docker ps
```

### **5. Access a Running Container (Interactive Shell)**

```bash
docker exec -it your-container-name /bin/sh
```
- **`-it`**: Runs the command interactively.
- **`/bin/sh`**: Shell command to access the container.

### **6. Stop a Container**
Stop a running container.

```bash
docker stop your-container-name
```

### **7. Start a Stopped Container**
Start an already created container that is stopped.

```bash
docker start your-container-name
```

### **8. Restart a Container**
Restart a running or stopped container.

```bash
docker restart your-container-name
```

### **9. Check Logs of a Container**
View the logs of a running or stopped container.

```bash
docker logs your-container-name
```

### **10. Monitor Resource Usage (CPU, Memory)**
Check the usage stats of your containers.

```bash
docker stats
```

### **11. Remove a Container**
Remove a stopped container.

```bash
docker rm your-container-name
```

- If you need to force remove a running container, use the `-f` flag:

  ```bash
  docker rm -f your-container-name
  ```

### **12. Remove an Image**
Delete an image from your system.

```bash
docker rmi your-image-name
```

- Use **`docker images`** to list all images and get the **IMAGE ID** if you prefer using the ID to remove the image.

### **13. Remove Dangling Images**
Remove unused/dangling images (leftover layers not used by any containers).

```bash
docker image prune
```

### **14. Remove All Stopped Containers**
Remove all stopped containers from your system.

```bash
docker container prune
```

### **15. Clean Up All Unused Resources (Images, Containers, Networks, Volumes)**
If you want to clean up everything that's not being used:

```bash
docker system prune -a
```
- **`-a`**: Removes all unused images, not just dangling ones.

### **16. Check Container/Process Details**
See detailed information about a running container, including resource usage, configuration, and networking.

```bash
docker inspect your-container-name
```

### **17. Create and Run a Container with Mounted Volumes**
Mount a directory from your host machine to the container.

```bash
docker run -d -p 3000:3000 -v $(pwd):/app --name your-container-name your-image-name
```
- **`-v $(pwd):/app`**: Mounts the current directory (`$(pwd)`) to the `/app` directory in the container.

### **18. List Volumes**
Check the volumes in use.

```bash
docker volume ls
```

### **19. Remove a Volume**
Remove an unused volume.

```bash
docker volume rm volume_name
```

### **20. Commit Changes to a Running Container**
If you’ve made changes inside a running container and want to create a new image:

```bash
docker commit your-container-name new-image-name
```

### **21. Save an Image to a Tar File**
Export a Docker image to a `.tar` file.

```bash
docker save -o your-image.tar your-image-name
```

### **22. Load an Image from a Tar File**
Import a previously saved Docker image.

```bash
docker load -i your-image.tar
```

---

### **Summary of Key Lifecycle Commands**
1. **Build**: `docker build -t your-image-name .`
2. **Run**: `docker run -d -p 3000:3000 --name your-container-name your-image-name`
3. **List Containers**: `docker ps`
4. **Stop**: `docker stop your-container-name`
5. **Start**: `docker start your-container-name`
6. **Logs**: `docker logs your-container-name`
7. **Remove Container**: `docker rm your-container-name`
8. **Remove Image**: `docker rmi your-image-name`
9. **Prune Unused Resources**: `docker system prune -a`

This covers the common Docker commands throughout the lifecycle of building, running, and maintaining containers and images.