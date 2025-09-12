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

## Running Locally with Artisan

If you are not using Docker, you can run the application locally using the `php artisan serve` command. Here are the steps to get it running:

1.  **Set the `APP_URL`**: Open the `.env` file and make sure the `APP_URL` is set to the correct URL of your application, including the port number. For example:

    ```
    APP_URL=http://127.0.0.1:8000
    ```

2.  **Create the storage link**: If you haven't already, create the symbolic link to the storage directory:

    ```bash
    php artisan storage:link
    ```

3.  **Clear caches**: To make sure your application is using the latest configuration, clear all the caches:

    ```bash
    php artisan cache:clear
    php artisan route:clear
    php artisan view:clear
    php artisan config:clear
    ```

4.  **Run the server**: Start the development server:

    ```bash
    php artisan serve
    ```

    This will usually start the server at `http://127.0.0.1:8000`.

## File Storage

This application uses Laravel's file storage system to handle file uploads, such as the PDFs for billings. By default, files are stored in the `storage/app/public` directory. However, to make these files accessible from the web, a symbolic link needs to be created from `public/storage` to `storage/app/public`.

To create this symbolic link, you need to run the following command from the root of the project:

```bash
docker-compose exec app php artisan storage:link
```

**When to run this command:**

You only need to run this command **once** after cloning the project or after running `composer install` for the first time. If you ever delete the `public/storage` directory, you will need to run this command again.

**What this command does:**

*   `docker-compose exec app`: This part of the command tells Docker to execute the following command inside the `app` service container, which is where the PHP application is running.
*   `php artisan storage:link`: This is the Laravel artisan command that creates the symbolic link.

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

## Default Login Credentials

For initial login, you can use the following credentials:

*   **Email:** `admin@argon.com`
*   **Password:** `secret`

After logging in, it is recommended to change the password for security reasons.

## Test Users

### Admin User

*   **Email:** `admin@example.com`
*   **Password:** `password`

This user has the `admin` role and can access the company management view at the `/companies` route.

### Customer User

*   **Email:** `customer@example.com`
*   **Password:** `password`

This user has the `user` role and can only see the assets assigned to them.


https://argon-dashboard-laravel.creative-tim.com/profile
