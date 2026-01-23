all: data perm

data:
	@mkdir -p docker/data/app
	@mkdir -p docker/data/db

perm:
	@sudo chmod -R 777 ./docker/data/app