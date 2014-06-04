#!/bin/sh

./bin/composer.phar dump-autoload --optimize
mkdir -p config

if [ ! -f ./config/google.key ]; then
    echo "paste-your-api-key" > ./config/google.key
    echo "Warning! Paste your GooglePlacesAPI key to './config/google.key'"
fi
