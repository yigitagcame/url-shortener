
# URL Shortener

URL Shortener, instructions are below.

## Configuration
- Rename .env.example to .env at root of the project
- Edit .env file and set required values. ) [docker env values set as default]

## Install
- Install composer globally (https://getcomposer.org/)
- Install docker (https://docs.docker.com/get-docker/) and docker-compose (https://docs.docker.com/compose/install/) [optional] or {their own LAMP stack}
- And run following command
```
composer install

./vendor/bin/sail up ) [optional] or {their own LAMP stack}

php artisan migrate
```


## Api Endpoints
- [POST] /urls

**Request structer:**

{
	url: < string>
}


**Response structers:**

Successful response status: 201
Body:

{
	success: '1'
}

Unsuccesfull response status: 400
Body:

{
	success: '0'
}


- {GET} /urls

Successful response status: 200

Body:
[{
	url: < string>
	short_id: < string>
}]


## Test
```
php vendor/bin/phpunit
```