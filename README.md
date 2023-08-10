

## Laravel app example

This Laravel app example can be used as a base template for own projects. In this app I show an example of
project structuring.

App features:
- Project structured in modules
- Basic auth (JWT auth) and register system
- Swagger (http://127.200.200.200/api/docs)
- Laravel 10
- Docker (php 8.2, PosgresSQL, Meliasearch, Mailhog)

How launch app
- for launch: make up (or ./vendor/bin/sail up)
- to run container bash: make bash (or ./vendor/bin/sail bash)
- install composer dependencies
- you can change project IP in env (by default http://127.200.200.200)
