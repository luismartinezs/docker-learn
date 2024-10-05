### Setup & Configuration
- **Initialize Project with `docker-compose.yml`**:
  You need a `docker-compose.yml` file in your project directory, which defines your services.

### Starting Containers
- **Build images (if required)**:
  ```bash
  docker-compose build
  ```
- **Start containers in the background (detached mode)**:
  ```bash
  docker-compose up -d
  ```
- **Start containers in the foreground (attached mode)**:
  ```bash
  docker-compose up
  ```

### Managing Containers
- **List running containers**:
  ```bash
  docker-compose ps
  ```
- **View logs for all services**:
  ```bash
  docker-compose logs
  ```
- **View logs for a specific service**:
  ```bash
  docker-compose logs <service>
  ```
- **Tail logs (real-time)**:
  ```bash
  docker-compose logs -f
  ```
- **Restart all services**:
  ```bash
  docker-compose restart
  ```
- **Restart a specific service**:
  ```bash
  docker-compose restart <service>
  ```

### Stopping Containers
- **Stop running containers**:
  ```bash
  docker-compose stop
  ```
- **Stop and remove containers (clean up)**:
  ```bash
  docker-compose down
  ```

### Removing Resources
- **Remove containers, networks, and volumes (full cleanup)**:
  ```bash
  docker-compose down -v
  ```
- **Remove containers, networks, images, and volumes (complete cleanup)**:
  ```bash
  docker-compose down --rmi all -v
  ```

### Other Useful Commands
- **Scale services (e.g., 3 replicas of `web`)**:
  ```bash
  docker-compose up --scale web=3 -d
  ```
- **Run a one-off command in a container**:
  ```bash
  docker-compose run <service> <command>
  ```