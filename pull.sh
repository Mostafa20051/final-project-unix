#!/bin/bash

echo "Pulling latest changes from GitHub..."
git pull origin feature-tala || exit 1

echo "Restarting containers..."
docker compose down
docker compose up -d --build

echo "Done "
