Here's a **Docker Compose** cheatsheet with the most commonly used options and configurations for the `docker-compose.yml` file. This will help you configure multi-container applications easily.

### Basic Structure
```yaml
version: '3' # Docker Compose file format version
services:    # Define services (containers)
  servicename:
    image: imagename # Use prebuilt image or
    build: ./dir     # Build image from Dockerfile in specified directory
    ports:
      - "hostPort:containerPort"
    volumes:
      - ./local_dir:/container_dir
    environment:
      - ENV_VAR=value # Set environment variables
    depends_on:
      - other_service # Define dependencies
    networks:
      - network_name  # Specify custom network (optional)
```

---

### Core Options

#### `version`
Specifies the Docker Compose file format version. Common values are:
- `'2'`
- `'3'`

Use the latest stable version (3.x for most cases).

#### `services`
Defines the services (containers) to run.

```yaml
services:
  frontend:
    image: nginx:alpine
```

---

### Service Options

#### `build`
Build a container from a `Dockerfile`.
```yaml
services:
  app:
    build: ./app # Path to directory containing Dockerfile
```

#### `image`
Use an existing Docker image.
```yaml
services:
  db:
    image: postgres:14
```

#### `ports`
Expose and map container ports to the host machine.
```yaml
ports:
  - "3000:80"   # HostPort:ContainerPort
```

#### `volumes`
Mount local directories or files to the container.
```yaml
volumes:
  - ./src:/app/src   # LocalDir:ContainerDir
  - ./config.json:/app/config.json
```

#### `environment`
Set environment variables inside the container.
```yaml
environment:
  - NODE_ENV=development
  - DB_HOST=localhost
```

#### `depends_on`
Specify the dependency between services. It ensures one service starts after another, but it does not wait for the service to be "ready."
```yaml
depends_on:
  - db
```

#### `networks`
Attach services to networks for communication.
```yaml
networks:
  - mynetwork
```

#### `command`
Override the default command defined in the Dockerfile.
```yaml
command: ["npm", "run", "start"]
```

#### `restart`
Configure restart policies for the container. Options:
- `no`
- `always`
- `on-failure`
- `unless-stopped`
```yaml
restart: always
```

#### `entrypoint`
Override the default entrypoint of the container.
```yaml
entrypoint: ["./entrypoint.sh"]
```

#### `extra_hosts`
Add additional host-to-IP mappings, like adding to `/etc/hosts`.
```yaml
extra_hosts:
  - "myhost:127.0.0.1"
```

---

### Advanced Options

#### `volumes`
Define shared volumes for multiple services.
```yaml
volumes:
  mydata:
```

In services:
```yaml
services:
  web:
    volumes:
      - mydata:/var/www
```

#### `networks`
Define networks to allow services to communicate.
```yaml
networks:
  mynetwork:
```

In services:
```yaml
services:
  backend:
    networks:
      - mynetwork
  frontend:
    networks:
      - mynetwork
```

#### `secrets`
Store sensitive data, like credentials or keys.
```yaml
secrets:
  mysecret:
    file: ./secret.txt
```

In services:
```yaml
services:
  db:
    secrets:
      - mysecret
```

#### `healthcheck`
Define a health check to determine if the service is healthy.
```yaml
healthcheck:
  test: ["CMD", "curl", "-f", "http://localhost"]
  interval: 30s
  timeout: 10s
  retries: 5
```

---

### Sample `docker-compose.yml`

```yaml
version: '3'
services:
  web:
    build: ./web
    ports:
      - "3000:80"
    volumes:
      - ./web:/usr/share/nginx/html
    environment:
      - NGINX_HOST=localhost
      - NGINX_PORT=80
    networks:
      - app-network
  api:
    build: ./api
    ports:
      - "3001:3001"
    volumes:
      - ./api:/app
    environment:
      - NODE_ENV=development
    depends_on:
      - db
    networks:
      - app-network
  db:
    image: postgres:14
    environment:
      - POSTGRES_USER=user
      - POSTGRES_PASSWORD=pass
      - POSTGRES_DB=mydb
    volumes:
      - dbdata:/var/lib/postgresql/data
    networks:
      - app-network

volumes:
  dbdata:

networks:
  app-network:
```