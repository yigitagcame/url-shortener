
# URL Shortener

 

URL Shortener Laravel based, redis backed url shortining service.

  
## Install
- Install composer globally (https://getcomposer.org/)
- Install docker (https://docs.docker.com/get-docker/) and docker-compose (https://docs.docker.com/compose/install/)
- And run following command
```
composer install

./vendor/bin/sail up
```
## Configuration
- Rename .env.example to .env at root of the project
- Edit .env file and set reuqired values.

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
	status: 'successfull'
}

Unsuccesfull response status: 400
Body:

{
	status: 'bad parameter'
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