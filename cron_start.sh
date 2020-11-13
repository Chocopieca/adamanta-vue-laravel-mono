#!/usr/bin/env /bin/bash

set -e

while [ true ]
do
    php /app/artisan schedule:run --verbose --no-interaction &
    sleep 60
done
