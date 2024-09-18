<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# How To Use
Make sure that your windows installed WSL, Ubuntu, and Docker.
You can follow the steps below to install Laravel Sail and start it, or you can read the [official guides](https://laravel.com/docs/11.x/sail) to proceed the installation.

### Set System Environments
Copy the `.env.example` and rename it as `.env`

### Virtualization Tools Installation
Check if Ubuntu is installed:
```bash
wsl --list --verbose
#   NAME              STATE           VERSION
# * Ubuntu            Running         2
#   docker-desktop    Running         2
```
If Ubuntu doesn't show up in the list, you can install it by:
```bash
wsl --install -d Ubuntu
wsl --set-default Ubuntu
```

### Start The Containers
Then you can use `bash` command to log into the Ubuntu terminal:
```bash
bash
```
Use the following command to run Laravel Sail<br>
```bash
# Notice: This should be ran in the Ubuntu bash terminal
./vendor/bin/sail up --build -d
```
Set a command alias to facilitate the developing process
```bash
# Notice: This should be ran in the Ubuntu bash terminal
alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'
```
After the setting, you may manipulate Laravel easily by:
```bash
# Notice: This should be ran in the Ubuntu bash terminal
sail up --build -d
```

### Access The Service
Once all dependent container are started, you may access the service by [http://localhost](http://localhost) <br>
If you are using `Postman v2.1^` to proceed the test, you may use the [configuration](./postman/Laravel.postman_collection.json) to import the APIs at once.
|Method|API|Payload|Header|
|---|---|---|---|
|GET|{{base_url}}/orders|{}|{}|
|POST|{{base_url}}/orders/create|{"name": "test", "price": 1000}|{"Authorization" : "Bearer <JWT_TOKEN>"}|
|PUT|{{base_url}}/orders/{id}|{"name": "test2"}|{"Authorization" : "Bearer <JWT_TOKEN>"}|
|DEL|{{base_url}}/orders/{id}|{}|{"Authorization" : "Bearer <JWT_TOKEN>"}|
|POST|{{base_url}}/auth/signup|{"name": "user3", "password": "123456789", "password_confirmation": "123456789", "email": "user3@test.com"}|{}|
|POST|{{base_url}}/auth/login|{"email": "user3@test.com","password": "123456789"}|{}|

First start operations:
```bash
# Notice: This should be ran in the Ubuntu bash terminal
sail artisan migrate
sail artisan key:generate
```
Once you finish works, remember to stop and remove the container to release your data storage.
```bash
# Notice: This should be ran in the Ubuntu bash terminal
sail down -v
```
To clear the cache:
```bash
# Notice: This should be ran in the Ubuntu bash terminal
sail artisan route:clear
sail artisan config:clear
sail artisan cache:clear
sail composer dump-autoload
```

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
