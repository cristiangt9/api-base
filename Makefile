up:
	docker-compose up -d --build

down:
	docker-compose down
	
composer:
	docker-compose exec backend-laravel-service composer install --prefer-dist