# Variables
PROJECT_ID=infra-rhino-386109
SERVICE_NAME=photos-staging-kapable-info
REGION=europe-west1
IMAGE_NAME=europe-west1-docker.pkg.dev/$(PROJECT_ID)/docker-piwigo/piwigo:latest
BUCKET_DATA=staging-piwigo-data

.PHONY: build deploy clean-cache release help

help:
	@echo "Usage:"
	@echo "  make build         - Build the image on Google Cloud Build"
	@echo "  make deploy        - Deploy the latest image to Cloud Run Staging"
	@echo "  make clean-cache   - Clear Piwigo caches (templates_c and combined) on GCS"
	@echo "  make release       - Execute all steps: build, deploy and clean-cache"

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
