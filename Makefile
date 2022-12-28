build: 
	docker-compose -f ./.docker/docker-compose.yml build
up:
	docker-compose -f ./.docker/docker-compose.yml up -d
down:
	docker-compose -f ./.docker/docker-compose.yml down
stop:
	docker-compose -f ./.docker/docker-compose.yml stop
start:
	docker-compose -f ./.docker/docker-compose.yml start
php-bash:
	docker-compose -f ./.docker/docker-compose.yml exec php8.1 bash
nginx-bash:
	docker-compose -f ./.docker/docker-compose.yml exec nginx bash