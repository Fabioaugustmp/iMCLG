# Project Name

A brief description of your project.

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

### 2. Create your environment file

Copy the `.env.example` file to `.env`.

```bash
cp .env.example .env
```

### 3. Update your environment file

Open the `.env` file and update the database credentials to match the ones in `docker-compose.yml`.

```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_password
```

### 4. Build and run the containers

Run the following command to build the images and start the containers in detached mode.

```bash
docker-compose up -d --build
```

### 5. Run database migrations and seeders

Once the containers are up and running, execute the database migrations and seeders.

```bash
docker-compose exec app php artisan migrate --seed
```

### 6. Access the application

You can now access the application in your browser at [http://localhost:8000](http://localhost:8000).

## Docker Services

The `docker-compose.yml` file defines the following services:

- **app**: The Laravel application running on PHP-FPM.
- **nginx**: The Nginx web server that serves the application.
- **db**: The MySQL database.

## Stopping the application

To stop the application, run the following command:

```bash
docker-compose down
```
