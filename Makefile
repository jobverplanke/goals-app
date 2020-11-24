up:
	@docker-compose up

down:
	@docker-compose down -v --remove-orphans

ssh:
	@docker-compose exec php sh

list-routes-objectives:
	@docker-compose exec php php artisan route:list --name=objectives

clear-cache:
	@docker-compose exec php php artisan optimize:clear

dump-autoload:
	@docker-compose exec php composer dumpautoload

dry-format:
	@composer dry-format

format:
	@composer format
