all: data perm

data:
	@mkdir -p docker/data/app
	@mkdir -p docker/data/db
	@mkdir -p docker/data/grafana
	@mkdir -p docker/data/prometheus

perm:
	@sudo chmod -R 777 ./docker/data/app
	@sudo chmod -R 777 ./docker/grafana
	@sudo chmod -R 777 ./docker/prometheus

rebuild:
	@docker compose down -v
	@docker compose up --build

appscript:
	@docker exec -it digitall-app bash setup.sh