# Docker learn

## basic node app

- Create Dockerfile
  - Copy package.json and lock file and install deps
  - copy rest of the app files
  - expose port
  - run command to serve app
- install nodemon for hot reload
- add script to package.json to run nodemon
- create docker-compose.yml file
  - define app service
    - in volumes sync local dir with app in container to see real time changes
- docker-compose up --build to build docker image
- docker-compose up to run app

## basic node app within subfolder