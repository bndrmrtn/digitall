<img src="https://raw.githubusercontent.com/bndrmrtn/digitall/refs/heads/main/public/favicon.svg" alt="DigitAll Logo" style="max-height: 100px; width: auto;">

# DigitAll

A simple webshop application for school project.

# Setup

## Must have software

- Docker ([Install](https://docs.docker.com/engine/install))
- Make (`sudo apt install make`)

## Lazy-setup

This is a lazy one command setup for people who just want things working.
```bash
make lazy
```

## Folders and permissions

Before we start our project, we must run the below command
that creates the data folders for each container
and sets the required permissions for them:

```bash
make data # this will run data and perm both
make perm
```

## Permission errors

If any permission error happens, run this make command:
```bash
make perm # this will solve docker directory permission errors
```

## Containers

To start our application we should run the docker compose
command below:

```bash
docker compose up --build -d # -d is the same as --detach
```

After all of our containers started, we must run
some commands inside our application
when started for the first
time or the `--build` flag applied.

## For first time build

Run the bash shell inside our app
with `-i` interactive and `-t` TTY for experience:

```bash
docker exec -it digitall-app bash setup.sh
```

Twill may have a small dialog that waits for user inputs.

# Ports

| Name                | Service    | Port | Description                                                          |
|---------------------|------------|------|----------------------------------------------------------------------|
| php-fpm             | app        | 9000 | The main application that executes php scripts.                      |
| Website (via NGINX) | nginx      | 8000 | The NGINX router that handles traffic and sends them to `php-fpm`    |
| MySQL               | db         | 3306 | MySQL Database                                                       |
| Adminer             | adminer    | 8081 | MySQL Admin Dashboard                                                |
| Grafana             | grafana    | 8003 | Dashboard and visualization for metrics, logs, and application stats |
| Prometheus          | prometheus | 8004 | Time‑series database and monitoring system for application metrics   |
| cAdvisor            | cadvisor   | 8005 | Container‑level resource usage and performance metrics               |
