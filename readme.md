### Clique App

This is a simple HR app

To run it follow these steps:<br>
1- Create a database and set its name in .env file<br>
2- Run this `composer install`<br>
3- `npm install`<br>
4- `npm run dev`<br>
5- `php artisan migrate`<br>
6- `php artisan db:seed`<br>
7- now run your application and
login with one of these users:<br/>
<pre style="line-height: 80%;">
    A- type: admin<br/>
        username or email: SKING<br/>
        password: password<br/>
    B- type: manager<br/>
        username or email: NKOCHHAR<br/>
        password: password<br/>
    C- type: employee<br/>
        username or email: LDEHAAN<br/>
        password: password<br/>
</pre>


I added docker to run this app
`systemctl start docker`
`docker build --file .docker/Dockerfile -t 1clique .`
`docker images`
`chmod -R o+rw bootstrap/ storage/`
`docker run --name 1clique --rm -p 8989:80 1clique`
now u can open http://127.0.0.1:8989/
`docker ps`
`composer require predis/predis`


final steps to run :
`docker build --file .docker/Dockerfile -t 1clique .`
`docker-compose up --build`
`docker-compose up `
`docker-compose exec app /bin/bash`
`cd /srv/app`
`php artisan migrate`
`php artisan db:seed`
open http://127.0.0.1:8989/ and login

u can connect to mysql db on docker using workbench:
see Screenshot_2018-10-30_12-47-34.png
