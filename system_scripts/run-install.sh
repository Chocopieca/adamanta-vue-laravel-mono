#!/bin/bash

get_env() {
  if [ -z "$1" ]; then
    echo "environment variable name is required"
    return
  fi

  local ENV_FILE=${PWD}/.env
  if [ ! -z "$2" ]; then
    ENV_FILE="$2"
  fi

  local VAR=$(grep $1 "$ENV_FILE" | xargs)
  IFS="=" read -ra VAR <<< "$VAR"
  echo ${VAR[1]}
}

echo 'Create .env files'
cp $PWD/.env.example $PWD/.env
echo "cp .env"

echo "Run containers"
docker-compose up -d
echo "Ok"

echo "Install app dependencies"
docker exec -it adamanta_app sh ./system_scripts/install/app_dependencies.sh
echo "Ok"
