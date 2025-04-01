.PHONY : main build-image build-container start test shell stop clean
main: build-image build-container

build-image:
	docker build -t docker-php-boilerplate .

build-container:
	docker run -dt --name docker-php-StringCalculator -v .:/KataStringCalculator docker-php-boilerplate
	docker exec docker-php-StringCalculator composer install

start:
	docker start docker-php-StringCalculator

test: start
	docker exec docker-php-StringCalculator ./vendor/bin/phpunit tests/$(target)

shell: start
	docker exec -it docker-php-StringCalculator /bin/bash

stop:
	docker stop docker-php-StringCalculator

clean: stop
	docker rm docker-php-StringCalculator
	rm -rf vendor

##Para que salga la carpeta vendor: docker exec docker-php-StringCalculator composer update
