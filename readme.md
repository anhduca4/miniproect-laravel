<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Mini project curd users with laravel

This is mini project with unit test, docker, and swagger document created by Nguyen Anh Duc for test
Time line:
- Day 1 : 20h00 07-04-2019 - 23h00 07-04-2019
- Day 2 : 17h00 08-04-2019 - 21h00 08-04-2019

## How to run docker
Before run docker pls install docker https://docs.docker.com/install/. (Docker has test by Macos and ubuntu)
Please check port 8000 in local computer.
Clone this repository. Then cd to root project
``` 
 $ docker-compose -p web_test -f .cicd/docker/docker-compose.yml up --build -d web 
```
If want stop docker please run
```
$ docker-compose -p web_test -f .cicd/docker/docker-compose.yml up down
```
Link swagger available in:
- 127.0.0.1:8000/swagger/v1
Edit swagger in :
```
$ ./documents/swagger_v1
```
## Unit test

Please run
```
docker-compose -p web_test -f .cicd/docker/docker-compose.yml exec -T web phpunit
```



## Email

- doanduc.love@gmail.com
