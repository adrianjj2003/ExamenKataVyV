.PHONY : main build-image build-container start test shell stop clean
main: build-image build-container

build-image:
	docker build -t docker-php-boilerplate .

build-container:
	docker run -dt --name docker-php-ExamenKata -v .:/PruebaKatas/ExamenKata docker-php-boilerplate
	docker exec docker-php-ExamenKata composer install

start:
	docker start docker-php-ExamenKata

test: start
	docker exec docker-php-ExamenKata ./vendor/bin/phpunit tests/TiendaTest.php

shell: start
	docker exec -it docker-php-ExamenKata /bin/bash

stop:
	docker stop docker-php-ExamenKata

clean: stop
	docker rm docker-php-ExamenKata
	rm -rf vendor
