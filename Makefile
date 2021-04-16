DC = docker-compose

.DEFAULT_GOAL := help
.PHONY : help
help : Makefile
	@sed -n 's/^##//p' $<

##
## Docker
##---------------------------------------------------------------------------
.PHONY: up down

## up			: Mount the dev containers and run dev server
up:
	docker-compose up -d
	docker-compose exec php-cli php -S 0.0.0.0:80 -t public

## down			: Stops, remove the containers
down:
	docker-compose down

##
## Tools
##---------------------------------------------------------------------------
.PHONY: init sh

## init			: Init environment, install dependencies
init:
	@if [ -f .env ]; \
	then\
		echo '\033[1;41m/!\ The .env.dist file has changed. Please check your .env file (this message will not be displayed again).\033[0m';\
		touch .env;\
	else\
		echo cp .env.dist .env;\
		cp .env.dist .env;\
	fi
	cp docker-compose.override.yml.dist docker-compose.override.yml
	./app/composer install

## sh			: Access the php container via shell
sh:
	docker-compose exec php-cli sh