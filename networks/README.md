docker-compose network use cases

- default if not specified: docker compose creates a network for each stack
- reasons
  - Isolated Communication
    - communicate between containers in the same network but not with the outside work
  - Cross-service Communication
    - communicate across stacks or docker compose files
  - network modes
- use cases
  - microservices
  - database connection
  - multple networks
- network modes
  - bridge: default. containers interact though internal network and stay isolated from host or external network
  - host: binds directly to host network. useful when you need very low network latency or access to specific host resources. exposes container directly to host
  - none: disables networking for container
  - overlay: communication across containers on different docker hosts (eg k8s)
  - macvlan: unique MAC address to each container, making it appear as physical device. useful when you need to integrate containers into an existing physical network infrastructure