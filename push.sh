#!/bin/bash

git status
echo "Enter commit message:"
read msg

git add .
git commit -m "$msg"
git push origin feature-tala

