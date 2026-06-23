.DEFAULT_GOAL := help

help: ## Show list of available commands
	@grep -E '^[^ :]+:.*?## .*' -h $(MAKEFILE_LIST) | sort -d -t: -k1,1 | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-20s\033[0m %s\n", $$1, $$2}'

dev: up ## Start Backend Dev Server
	@docker compose run --rm front_dev pnpm dev

up: ## Start servers
	@docker compose up -d nginx

tinker: ## Run the artisan tinker command
	@docker compose run --rm app ./artisan tinker

