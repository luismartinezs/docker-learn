**Learning Program: Getting Up to Speed with Docker and Docker Compose for Your Vue Widget Integration**

---

**Overview:**

Your goal is to learn enough Docker and Docker Compose to add a Vue.js widget as a service to an existing PHP application that already uses Docker Compose. This practical learning program is designed to get you hands-on experience quickly, focusing on the essentials needed for your task.

---

### **Week 1: Foundations and Practical Application**

#### **Day 1: Understanding Docker Basics**

- **Objectives:**
  - Grasp fundamental Docker concepts: Images, Containers, Dockerfile.
  - Set up the Docker environment on your machine.

- **Activities:**
  - **Install Docker Desktop:**
    - [Download and install Docker Desktop](https://www.docker.com/products/docker-desktop).
  - **Learn by Doing:**
    - **Hello World Container:**
      - Run your first container:
        ```bash
        docker run hello-world
        ```
      - Observe the output and understand what happened.
  - **Reading:**
    - [Docker Overview](https://docs.docker.com/get-started/overview/)
    - [Containers and Immutability](https://docs.docker.com/get-started/overview/#containers-and-immutability)

#### **Day 2: Working with Docker Images and Containers**

- **Objectives:**
  - Build and run Docker images.
  - Understand how to write a Dockerfile.

- **Activities:**
  - **Create a Simple Node.js App:**
    - Write a basic Node.js "Hello World" application.
  - **Write a Dockerfile:**
    - Create a `Dockerfile` to containerize the Node.js app.
      ```dockerfile
      FROM node:14
      WORKDIR /app
      COPY . .
      RUN npm install
      CMD ["node", "app.js"]
      ```
  - **Build and Run the Image:**
    - Build the image:
      ```bash
      docker build -t my-node-app .
      ```
    - Run the container:
      ```bash
      docker run -p 3000:3000 my-node-app
      ```
    - Test it by accessing `http://localhost:3000`.

- **Reading:**
  - [Dockerfile Reference](https://docs.docker.com/engine/reference/builder/)
  - [Best Practices for Writing Dockerfiles](https://docs.docker.com/develop/develop-images/dockerfile_best-practices/)

#### **Day 3: Introduction to Docker Compose**

- **Objectives:**
  - Understand what Docker Compose is and when to use it.
  - Learn how to define services in a `docker-compose.yml` file.

- **Activities:**
  - **Review Existing `docker-compose.yml`:**
    - Examine the `docker-compose.yml` from the PHP project.
    - Identify existing services and configurations.
  - **Create a Simple Multi-Service Application:**
    - Set up a basic web application with a frontend and backend service.
    - Define services in `docker-compose.yml`:
      ```yaml
      version: '3'
      services:
        web:
          image: nginx
          ports:
            - "8080:80"
        api:
          image: my-node-app
          ports:
            - "3000:3000"
      ```
  - **Run Services with Docker Compose:**
    - Start the application:
      ```bash
      docker-compose up
      ```
    - Test both services.

- **Reading:**
  - [Docker Compose Overview](https://docs.docker.com/compose/)
  - [Compose File Reference](https://docs.docker.com/compose/compose-file/compose-file-v3/)

#### **Day 4: Containerizing a Vue.js Application**

- **Objectives:**
  - Build and containerize a Vue.js application.
  - Write a Dockerfile for the Vue.js app.

- **Activities:**
  - **Set Up a Vue.js Project:**
    - Use Vue CLI to create a new project:
      ```bash
      npm install -g @vue/cli
      vue create my-vue-app
      ```
  - **Write a Dockerfile:**
    - Create a `Dockerfile` in the Vue.js project directory:
      ```dockerfile
      FROM node:14 as build-stage
      WORKDIR /app
      COPY package*.json ./
      RUN npm install
      COPY . .
      RUN npm run build

      FROM nginx:stable-alpine
      COPY --from=build-stage /app/dist /usr/share/nginx/html
      EXPOSE 80
      CMD ["nginx", "-g", "daemon off;"]
      ```
  - **Build and Run the Docker Image:**
    - Build the image:
      ```bash
      docker build -t my-vue-app .
      ```
    - Run the container:
      ```bash
      docker run -p 8080:80 my-vue-app
      ```
    - Access the app at `http://localhost:8080`.

- **Reading:**
  - [Dockerizing a Vue.js App](https://vuejs.org/v2/cookbook/dockerize-vuejs-app.html)
  - [Multi-Stage Builds](https://docs.docker.com/develop/develop-images/multistage-build/)

#### **Day 5: Integrating Vue.js Service into Docker Compose**

- **Objectives:**
  - Add the Vue.js service to the existing `docker-compose.yml`.
  - Understand networking between services.

- **Activities:**
  - **Add Vue.js Service:**
    - Add a service definition for the Vue.js app in `docker-compose.yml`:
      ```yaml
      vue-app:
        build: ./path-to-vue-app
        ports:
          - "8080:80"
      ```
  - **Configure Networking:**
    - Ensure the Vue app can communicate with other services if needed.
  - **Test the Setup:**
    - Bring up all services:
      ```bash
      docker-compose up
      ```
    - Verify that all services are running and accessible.

- **Reading:**
  - [Networking in Compose](https://docs.docker.com/compose/networking/)
  - [Docker Compose Networking Tutorial](https://docs.docker.com/compose/gettingstarted/)

#### **Day 6: Environment Variables and Configuration**

- **Objectives:**
  - Manage configuration using environment variables.
  - Use `.env` files with Docker Compose.

- **Activities:**
  - **Pass Environment Variables:**
    - Modify `docker-compose.yml` to include environment variables for the Vue.js app if needed.
  - **Use a `.env` File:**
    - Create a `.env` file to store environment-specific variables.
  - **Update the Vue.js App to Read Environment Variables:**
    - Use `process.env` in your Vue.js code.

- **Reading:**
  - [Environment Variables in Compose](https://docs.docker.com/compose/environment-variables/)
  - [Mode and Environment Variables in Vue.js](https://cli.vuejs.org/guide/mode-and-env.html)

#### **Day 7: Volume Management and Persisting Data**

- **Objectives:**
  - Understand volumes and data persistence in Docker.
  - Use bind mounts for development.

- **Activities:**
  - **Use Volumes for Hot Reloading:**
    - Modify `docker-compose.yml` to include volumes for the Vue.js app:
      ```yaml
      volumes:
        - ./path-to-vue-app:/app
      ```
    - Enable hot reloading in development mode.
  - **Test Changes:**
    - Make changes to the Vue.js code and observe live updates.

- **Reading:**
  - [Using Volumes](https://docs.docker.com/storage/volumes/)
  - [Bind Mounts vs Volumes](https://docs.docker.com/storage/#choose-the-right-type-of-mount)

---

### **Week 2: Deepening Knowledge and Finalizing Implementation**

#### **Day 8: Debugging and Logs**

- **Objectives:**
  - Learn how to debug Docker containers.
  - Access logs and troubleshoot issues.

- **Activities:**
  - **Inspect Containers:**
    - Use `docker ps`, `docker logs`, `docker exec`.
  - **Debug Common Issues:**
    - Practice with intentional errors in Dockerfile or `docker-compose.yml`.

- **Reading:**
  - [Debugging Docker Containers](https://docs.docker.com/config/containers/logging/)

#### **Day 9: Optimizing Docker Images**

- **Objectives:**
  - Learn best practices for optimizing Docker images.
  - Reduce image size and build time.

- **Activities:**
  - **Optimize the Vue.js Dockerfile:**
    - Use lightweight base images.
    - Clean up unnecessary files.
  - **Rebuild and Compare Image Sizes:**
    - Use `docker images` to compare.

- **Reading:**
  - [Image Size Reduction Tips](https://docs.docker.com/develop/develop-images/reduce-image-size/)

#### **Day 10: Security Considerations**

- **Objectives:**
  - Understand basic security practices in Docker.

- **Activities:**
  - **Run Containers with Least Privilege:**
    - Avoid running as root user inside containers.
  - **Update Docker and Images Regularly:**
    - Learn how to keep images up to date.

- **Reading:**
  - [Docker Security Best Practices](https://cheatsheetseries.owasp.org/cheatsheets/Docker_Security_Cheat_Sheet.html)

#### **Day 11-12: Integration Testing**

- **Objectives:**
  - Test the full application stack with the new Vue.js service.

- **Activities:**
  - **End-to-End Testing:**
    - Verify that the Vue.js widget integrates correctly with the PHP application.
  - **Fix Issues:**
    - Troubleshoot any integration problems.

#### **Day 13: Documentation and Handover**

- **Objectives:**
  - Document the changes and setup process for future reference.

- **Activities:**
  - **Update `README.md`:**
    - Include instructions on how to build and run the project.
  - **Document Environment Setup:**
    - Note any prerequisites or environment configurations.

#### **Day 14: Review and Next Steps**

- **Objectives:**
  - Review what you've learned.
  - Identify areas for further learning if needed.

- **Activities:**
  - **Self-Assessment:**
    - Reflect on your comfort level with Docker and Docker Compose.
  - **Plan for Ongoing Learning:**
    - Bookmark useful resources for future reference.

---

**Additional Resources:**

- **Docker Documentation:** [https://docs.docker.com/](https://docs.docker.com/)
- **Docker Compose Documentation:** [https://docs.docker.com/compose/](https://docs.docker.com/compose/)
- **Vue.js Docker Samples:** [https://github.com/docker/labs/tree/master/developer-tools/nodejs/vue](https://github.com/docker/labs/tree/master/developer-tools/nodejs/vue)

---

**Tips for Success:**

- **Stay Hands-On:** Focus on typing out commands and code yourself rather than copy-pasting.
- **Experiment Freely:** Don't hesitate to try out different configurations to see how they affect the system.
- **Consult Documentation:** Docker's official docs are comprehensive and helpful.
- **Ask for Help:** If you get stuck, communities like Stack Overflow or Docker forums can be valuable.
