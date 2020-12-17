start:
	php artisan serve --host 0.0.0.0

test:
	php artisan test

lint:
	composer run-script phpcs -- --standard=PSR12 public

lint-fix:
	composer phpcbf
