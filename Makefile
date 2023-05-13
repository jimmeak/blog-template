docker_compose_file = docker-compose.yml
docker_compose_file_example = docker-compose.example.yml


set-ip-addresses:
	sh ./.docker/set_localhost.sh

create-docker-compose:
	cp ./${docker_compose_file_example} ./${docker_compose_file}

prepare: create-docker-compose set-ip-addresses

start:
	docker compose up -d

stop:
	docker compose down

restart: dcd dcu


start-containers: set-ip-addresses create-docker-compose dcu
stop-and-remove-containers: dcd


web-bash:
	docker compose exec web bash
db-bash:
	docker compose exec database bash

migration:
	docker compose exec web bash -c "symfony console make:migration"

migration-run:
	docker compose exec web bash -c "symfony console doctrine:migrations:migrate -n"

update-database: migration migration-run

database-refresh:
	docker compose exec web bash -c "symfony console doctrine:database:drop --force"
	docker compose exec web bash -c "symfony console doctrine:database:create"
	docker compose exec web bash -c "symfony console doctrine:migrations:migrate -n"

database-refresh-and-update:
	docker compose exec web bash -c "symfony console doctrine:database:drop --force"
	docker compose exec web bash -c "symfony console doctrine:database:create"
	docker compose exec web bash -c "symfony console doctrine:migrations:migrate -n"
	docker compose exec web bash -c "symfony console make:migration"
	docker compose exec web bash -c "symfony console doctrine:migrations:migrate -n"

apply-new-migration:
	docker compose exec web bash -c "symfony console make:migration"
	docker compose exec web bash -c "symfony console doctrine:migrations:migrate -n"
