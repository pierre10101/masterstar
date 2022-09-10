sail := vendor/bin/sail

.PHONY: down
down:
	$(sail) down -v

.PHONY: up
up:
	$(sail) up -d # get services running

.PHONY: setup
setup: 
	    docker run --rm -u "$(shell id -u):$(shell id -g)" \
		-v $(shell pwd):/var/www/html \
		-w /var/www/html \
		laravelsail/php81-composer:latest \
		composer install --ignore-platform-reqs

.PHONY: backend-install
backend-install:
	$(sail) composer i

.PHONY: backend-setup
backend-setup:
	make backend-install
	$(sail) artisan key:generate

.PHONY: backend-migrate
backend-migrate:
	$(sail) artisan migrate --seed

.PHONY: frontend-clean
frontend-clean:
	rm -rf node_modules 2>/dev/null || true
	rm package-lock.json 2>/dev/null || true
	rm yarn.lock 2>/dev/null || true
	$(sail) yarn cache clean

.PHONY: frontend-install
frontend-install:
	make frontend-clean
	$(sail) yarn install
	$(sail) yarn dev

.PHONY: dev
dev:
	make up
	make backend-setup
	make frontend-install

.PHONY: watch
watch:
	$(sail) yarn dev