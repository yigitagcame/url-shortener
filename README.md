
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
- [POST] /create
- 
**Request structer:**
{
	url: <string>
}
**Response structers:**

Successful response status: 201
{
	status: 'successfull'
}

Unsuccesfull response status: 400
{
	status: 'bad parameter'
}


- {GET} /all
Successful response status: 200
[{
	url: <string>
	short_id: <string>
}]


## Test
```
php vendor/bin/phpunit
```