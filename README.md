<!-- PROJECT LOGO -->
<br />
<div align="center">
  <h3 align="center">Docker Laravel MySQL Nginx Starter</h3>

  <p align="center">
    Project Starter For Web Application Development with Laravel, MySQL, Nginx, and Docker.
    <br />
  </p>
</div>

<div align="center">

  <a href="">[![Contributors][contributors-shield]][contributors-url]</a>
  <a href="">[![Stargazers][stars-shield]][stars-url]</a>
  <a href="">[![Issues][issues-shield]][issues-url]</a>

</div>

<!-- ABOUT THE PROJECT -->
## Features

* [Docker](https://www.docker.com/)
* [Dockerfile with Alpine](https://hub.docker.com/_/alpine)
* [Nginx](https://www.nginx.com)
* [Laravel 10](https://laravel.com/)
* [MySQL](https://www.mysql.com/)
* [PHP 8.2](https://nodejs.org)
* [Node](https://nodejs.org)
* [NPM](https://www.npmjs.com)
* [PHP Prettier](https://github.com/prettier/plugin-php)
* [Github Action Check Code Format Using Prettier](https://github.com/ishaqadhel/docker-laravel-mysql-nginx-starter/actions)

<!-- GETTING STARTED -->
## Getting Started

Follow the instruction below to setting up your project.

### Prerequisites

- Download and Install [Docker](https://docs.docker.com/engine/install/)

<!-- USAGE EXAMPLES -->
## Run App
  - cp ./src/.env.example ./src/.env
  - docker compose build
  - docker compose up -d
  - docker exec php /bin/sh -c "composer install && chmod -R 777 storage && php artisan key:generate && php artisan migrate:fresh --seed"
  - php artisan migrate
  - php artisan db:seed
  - php artisan jwt:secret
  - Go to http://localhost:8001 or any port you set to open laravel
  - php artisan serve -> Call Api http://localhost:8000

  ***NOTE***: Login User: {
    "email": "johndoe@example.com",
    "password": "password"
  } 


<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/ishaqadhel/docker-laravel-mysql-nginx-starter.svg?style=for-the-badge
[contributors-url]: https://github.com/ishaqadhel/docker-laravel-mysql-nginx-starter/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/ishaqadhel/docker-laravel-mysql-nginx-starter.svg?style=for-the-badge
[forks-url]: https://github.com/ishaqadhel/docker-laravel-mysql-nginx-starter/network/members
[stars-shield]: https://img.shields.io/github/stars/ishaqadhel/docker-laravel-mysql-nginx-starter.svg?style=for-the-badge
[stars-url]: https://github.com/ishaqadhel/docker-laravel-mysql-nginx-starter/stargazers
[issues-shield]: https://img.shields.io/github/issues/ishaqadhel/docker-laravel-mysql-nginx-starter.svg?style=for-the-badge
[issues-url]: https://github.com/ishaqadhel/docker-laravel-mysql-nginx-starter/issues
[license-shield]: https://img.shields.io/github/license/ishaqadhel/docker-laravel-mysql-nginx-starter.svg?style=for-the-badge
[license-url]: https://github.com/ishaqadhel/docker-laravel-mysql-nginx-starter/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/linkedin_username
[product-screenshot]: images/screenshot.png
