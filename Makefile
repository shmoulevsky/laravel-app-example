SHELL=/bin/bash -e


help: ## Справка
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_-]+:.*?## / {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

up: ## Запуск проекта
	@./vendor/bin/sail up
	@echo "Started succesfull!"

bash: ## Доступ к консоли веба
	@./vendor/bin/sail bash



default: help
