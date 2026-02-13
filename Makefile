data:
	@mkdir -p docker/data/app
	@mkdir -p docker/data/db
	@mkdir -p docker/data/grafana
	@mkdir -p docker/data/prometheus

perm: data
	@sudo chmod -R 777 ./docker/data/app
	@sudo chmod -R 777 ./docker/data/grafana
	@sudo chmod -R 777 ./docker/data/prometheus

rebuild:
	@docker compose down -v
	@docker compose up --build

appscript:
	@docker exec -it digitall-app bash setup.sh

# lazy developers script
lazy: perm
	@docker compose up --build -d
	@docker exec -it digitall-app bash setup.sh
	@docker compose ps
	@echo "Complete!"
	@echo "URLs:"
	@echo " - Website: http://localhost:8000"
	@echo " - Adminer: http://localhost:8081"
	@echo " - Grafana: http://localhost:8003"

admin:
	@docker exec -it digitall-app php artisan twill:superadmin

cert:
	@mkdir -p docker/nginx/ssl
	@openssl req -x509 -nodes -days 365 \
		-newkey rsa:2048 \
  		-keyout docker/nginx/ssl/server.key \
  		-out docker/nginx/ssl/server.crt