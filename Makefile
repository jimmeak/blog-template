docker_compose_file = docker-compose.yml
docker_compose_file_example = docker-compose.example.yml

dcu:
	docker compose up -d

dcd:
	docker compose down

set-ip-addresses:
	sh ./.docker/set_localhost.sh

create-docker-compose:
	cp ./${docker_compose_file_example} ./${docker_compose_file}

start-containers: set-ip-addresses create-docker-compose dcu
stop-and-remove-containers: dcd


database-refresh:
	docker compose exec web bash -c "symfony console doctrine:database:drop --force"
	docker compose exec web bash -c "symfony console doctrine:database:create"
	docker compose exec web bash -c "symfony console doctrine:migrations:migrate -n"

database-refresh-with-new:
	docker compose exec web bash -c "symfony console doctrine:database:drop --force"
	docker compose exec web bash -c "symfony console doctrine:database:create"
	docker compose exec web bash -c "symfony console doctrine:migrations:migrate -n"
	docker compose exec web bash -c "symfony console make:migration"
	docker compose exec web bash -c "symfony console doctrine:migrations:migrate -n"

apply-new-migration:
	docker compose exec web bash -c "symfony console make:migration"
	docker compose exec web bash -c "symfony console doctrine:migrations:migrate -n"
