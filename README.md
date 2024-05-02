# Symfony Microservices Project

This project consists of two microservices built with Symfony:

1. **Users Service**: Handles user creation requests.
2. **Notifications Service**: Listens for user creation events and logs them.

## Prerequisites

Before getting started, ensure that you have the following installed on your system:

- Docker
- Docker Compose
- PHP
- Composer

## Installation and Setup

1. Clone the repository:

    ```bash
    git clone <repository-url>
    ```

2. Navigate to the project directory:

    ```bash
    cd <project-directory>
    ```

3. Build Docker images for the services:

    ```bash
    docker-compose build
    ```

4. Start Docker containers:

    ```bash
    docker-compose up -d
    ```

5. Install dependencies and set up the database schema:

    ```bash
    docker-compose exec users-service composer install
    docker-compose exec users-service php bin/console doctrine:schema:create --env=prod
    ```

6. Repeat the same steps for the `notifications-service` if necessary.

## Usage

### Users Service

#### Create User

Endpoint: `POST /users`

Request Body:

```json
{
    "email": "user@example.com",
    "firstName": "John",
    "lastName": "Doe"
}
