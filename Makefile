include .env

.PHONY: up down stop ps run logs build help
.DEFAULT_GOAL := up

RED=\033[0;31m
GREEN=\033[0;32m
NC=\033[0m # No Color

define info_message
	echo -e "\\e[0;42m" `date '+%H:%M:%S'` "$(1)\\e[0m"
endef

up:                                ## Up docker container
	@echo "Starting up containers for $(PROJECT_NAME)..."
	docker-compose pull
	docker-compose up -d --build --remove-orphans

down: stop

stop:                              ## Stopping docker container
	@echo "Stopping containers for $(PROJECT_NAME)..."
	@docker-compose stop

run:                            ## Creates and run shell in docker container by name. ex: run <service name>
	@docker-compose run --rm php sh

build:
	@docker-compose up --build

shell:                             ## Starting php docker container
	docker exec -ti -e COLUMNS=$(shell tput cols) -e LINES=$(shell tput lines) $(shell docker ps --filter name='$(PROJECT_NAME)_php' --format "{{ .ID }}") sh

ps:                                ## Show docker process
	@docker ps --filter name='$(PROJECT_NAME)*'

logs:                              ## Show logs with params
	@docker-compose logs -f $(filter-out $@,$(MAKECMDGOALS))

# https://stackoverflow.com/a/6273809/1826109
%:
	@:
