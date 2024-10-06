Here's a **Dockerfile cheatsheet** that covers common commands and instructions with explanations:

### **Dockerfile Cheatsheet**

#### 1. **FROM**
Defines the base image for your Docker image. Every Dockerfile must start with a `FROM` instruction.
```dockerfile
FROM node:18
FROM ubuntu:20.04
FROM alpine:latest
```

What base image to pick?

- the one that matches your node version
- alpine (lightweight),e .g. `FROM node:18-alpine`
  - compiling native modules might be slower and more complex
- Use LTS unless there is a good reason not to
- slim: stripped down version of node image. Smaller than full node, larger than alpine, `FROM node:18-slim`
  - balance between image size and ease of use
- full: full version of node image, `FROM node:18`
  - easy to use, but larger image size, might be useful for dev environments
- Multistage builds
  - Use heavier image for bilding the app
  - User lighter image for running app on production
- Envs
  - dev: full or slim (debug, install deps, local dev)
  - prod: alpine or slim
- CPU arch is factor too

- **Common bases**: `alpine`, `ubuntu`, `debian`, `node`, etc.

#### 2. **WORKDIR**
Sets the working directory inside the container. All subsequent commands will be run from this directory.
```dockerfile
WORKDIR /app
```

#### 3. **COPY**
Copies files from your local machine to the Docker container.
```dockerfile
COPY package.json ./
COPY . .  # Copy everything from the current directory
```

- First parameter is the **source** (relative to where the Dockerfile is located).
- Second parameter is the **destination** inside the container.

#### 4. **RUN**
Executes a command during the image build process. Typically used to install dependencies.
```dockerfile
RUN npm install
RUN apt-get update && apt-get install -y curl
```

- **Chaining** commands with `&&` is common to reduce the number of layers in the final image.

#### 5. **CMD**
Specifies the default command to run inside the container. This can be overridden at runtime.
```dockerfile
CMD ["npm", "start"]
CMD ["node", "index.js"]
```

- **Exec form** (`["executable", "param1", "param2"]`) is preferred over shell form (`npm start`) for more flexibility.

#### 6. **ENTRYPOINT**
Like `CMD`, but it defines the fixed part of the command. Useful for passing arguments at runtime.
```dockerfile
ENTRYPOINT ["npm", "run"]
CMD ["dev"]  # Will run as `npm run dev`
```

#### 7. **EXPOSE**
Documents the port the application inside the container listens to. This does **not** publish the port automatically (you need `-p` during `docker run`).
```dockerfile
EXPOSE 3000
```

- Use with `docker run -p <host-port>:<container-port>` to map ports.

#### 8. **ENV**
Sets environment variables inside the container.
```dockerfile
ENV NODE_ENV=production
ENV PORT=8080
```

#### 9. **VOLUME**
Creates a mount point for external volumes to persist data beyond the container lifecycle.
```dockerfile
VOLUME /data
```

- Volumes can be mapped at runtime with `docker run -v`.

#### 10. **ARG**
Defines build-time variables that can be passed during the build process (`docker build --build-arg`).
```dockerfile
ARG NODE_VERSION=18
FROM node:${NODE_VERSION}
```

#### 11. **USER**
Specifies the user to run subsequent commands inside the container.
```dockerfile
USER node
```

- Typically used to avoid running processes as the root user.

#### 12. **LABEL**
Adds metadata to the image, such as a version, description, or maintainer.
```dockerfile
LABEL maintainer="yourname@example.com"
LABEL version="1.0"
LABEL description="A simple Node.js app"
```

#### 13. **SHELL**
Overrides the default shell used to run commands (`/bin/sh -c` by default).
```dockerfile
SHELL ["/bin/bash", "-c"]
```

#### 14. **HEALTHCHECK**
Defines a command to monitor whether the container is healthy.
```dockerfile
HEALTHCHECK CMD curl --fail http://localhost:3000 || exit 1
```

- The container will be marked as "unhealthy" if the command fails.

#### 15. **ONBUILD**
Adds a trigger that will be executed when the image is used as a base for another build.
```dockerfile
ONBUILD COPY . /app
```

- Useful for setting up common behaviors for derived images.

---

### **Best Practices**

- **Use multistage builds** to reduce image size:
  ```dockerfile
  FROM node:18 AS build
  WORKDIR /app
  COPY package*.json ./
  RUN npm install
  COPY . .

  FROM node:18-alpine
  WORKDIR /app
  COPY --from=build /app /app
  CMD ["npm", "start"]
  ```

- **Reduce layers** by combining commands:
  ```dockerfile
  RUN apt-get update && apt-get install -y \
      curl \
      git && \
      rm -rf /var/lib/apt/lists/*
  ```

- **Use `.dockerignore`** to exclude unnecessary files (e.g., `node_modules`, `.git`) from being copied into the image.

---

This cheatsheet provides essential commands and best practices for creating Dockerfiles. Use it to build efficient, small, and reliable Docker images.