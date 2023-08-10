composer_install:
	docker-compose exec php composer install --no-progress

composer_upgrade:
	docker-compose exec php composer upgrade -W --no-progress

yarn_install:
	docker-compose run --rm node yarn install --no-progress

yarn_upgrade:
	docker-compose run --rm node yarn upgrade --no-progress

upgrade: composer_upgrade yarn_upgrade

install: composer_install yarn_install

up:
	docker-compose up -d --build

down:
	docker-compose down

build:
	docker-compose run --rm node yarn run build
