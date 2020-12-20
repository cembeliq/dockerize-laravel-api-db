step by step to install:
1. install docker
2. install docker-compose
3. go to root project directory
4. run in terminal: docker build -t my-laravel-image .
5. run: docker-compose up -d
6. run: mysql -u root -pkledopayment -h 172.20.0.2 -> set ip based on kledopayment-db container. You can check ip with command: docker inspect kledopayment-db
7. in the mysql cli: create database kledopayment
8. enter to container "kledopayment-web" -> docker exec -it kledopayment-web /bin/bash
9. run in the container for create migrations table-> php artisan migrate:install
10. run: php artisan migrate