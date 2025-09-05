# Real Estate Management Application

This project is a real estate management application with a Spring Boot backend and an Angular frontend.

## Prerequisites

Make sure you have Docker and Docker Compose installed on your system.

- [Docker](https://docs.docker.com/get-docker/)
- [Docker Compose](https://docs.docker.com/compose/install/)

## Getting Started

Follow these steps to get the application up and running.

### 1. Clone the repository

```bash
git clone <repository-url>
cd <repository-directory>
```

### 2. Build and run the containers

Run the following command to build the images and start the containers in detached mode.

```bash
docker-compose up -d --build
```

### 3. Access the application

You can now access the application in your browser:

- **Frontend (Angular):** [http://localhost](http://localhost)
- **Backend (Spring Boot):** [http://localhost:8080](http://localhost:8080)

## Docker Services

The `docker-compose.yml` file defines the following services:

- **backend**: The Spring Boot application running on Java 11.
- **frontend**: The Angular application served by Nginx.
- **db**: The MySQL database.

## Stopping the application

To stop the application, run the following command:

```bash
docker-compose down
```
