# Variables
PROJECT_ID=infra-rhino-386109
SERVICE_NAME=photos-staging-kapable-info
REGION=europe-west1
IMAGE_NAME=europe-west1-docker.pkg.dev/$(PROJECT_ID)/docker-piwigo/piwigo:latest
LOCAL_IMAGE=piwigo:local
PORT=8080
TZ=Europe/Paris
MYSQL_USER=piwigo
MYSQL_PASSWORD=piwigo
MYSQL_DATABASE=piwigo
BUCKET_DATA=staging-piwigo-data

.PHONY: build deploy clean-cache release local-build local-run local help

help:
	@echo "Usage:"
	@echo "  make build         - Build the image on Google Cloud Build"
	@echo "  make deploy        - Deploy the latest image to Cloud Run Staging"
	@echo "  make clean-cache   - Clear Piwigo caches (templates_c and combined) on GCS"
	@echo "  make release       - Execute all steps: build, deploy and clean-cache"
	@echo "  make local-build   - Build the image locally"
	@echo "  make local-run     - Run the local image on port 8080"
	@echo "  make local         - Build and run locally"

build:
	gcloud builds submit --project $(PROJECT_ID) --config cloudbuild.yaml .

deploy:
	gcloud run deploy $(SERVICE_NAME) \
		--image $(IMAGE_NAME) \
		--region $(REGION) \
		--project $(PROJECT_ID) \
		--quiet

clean-cache:
	@echo "Clearing GCS caches..."
	-gcloud storage rm -r gs://$(BUCKET_DATA)/templates_c/* --project $(PROJECT_ID) --quiet
	-gcloud storage rm -r gs://$(BUCKET_DATA)/combined/* --project $(PROJECT_ID) --quiet

release: build deploy clean-cache
	@echo "✅ Release completed successfully!"

local-build:
	docker build -t $(LOCAL_IMAGE) .

local-run:
	-docker rm -f piwigo-local 2>/dev/null
	docker run --rm --name piwigo-local \
		-p $(PORT):80 \
		--link piwigo-db:database \
		-e TZ=$(TZ) \
		-e MYSQL_HOST=database \
		-e MYSQL_USER=$(MYSQL_USER) \
		-e MYSQL_PASSWORD=$(MYSQL_PASSWORD) \
		-e MYSQL_DATABASE=$(MYSQL_DATABASE) \
		-v $$(pwd)/themes/jo-mat-theme:/var/www/html/piwigo/themes/jo-mat-theme \
		-v $$(pwd)/photos/uploads:/var/www/html/piwigo/upload \
		-v $$(pwd)/photos/galleries:/var/www/html/piwigo/galleries \
		-v $$(pwd)/photos/_data:/var/www/html/piwigo/_data \
		$(LOCAL_IMAGE)

local: local-build local-run
