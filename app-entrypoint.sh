#!/bin/sh
set -o errexit
set -o pipefail

if [ "${1}" == "php" ] && [ "$2" == "artisan" ] && [ "$3" == "serve" ]; then
  echo "Installing/Updating Laravel dependencies (composer)"
  if [[ ! -d /app/vendor ]]; then
    composer install
    echo "Dependencies installed"
  elif [[ "${SKIP_COMPOSER_UPDATE:-false}" != "true" ]]; then
    composer update
    echo "Dependencies updated"
  fi
fi

exec tini -- "$@"