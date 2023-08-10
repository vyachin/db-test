composer_install:
	docker-compose exec php composer install --no-progress

upgrade:
	docker-compose exec php composer upgrade -W --no-progress

install: composer_install

up:
	docker-compose up -d --build

down:
	docker-compose down
