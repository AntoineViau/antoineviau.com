#!/bin/bash
# set -ex
php src/generate.php site > src/index.html
./node_modules/.bin/static src &
inotifywait -m -q -r -e close_write ./src --exclude index.html |
while read -r filename event; do
	php src/generate.php site > src/index.html
	php src/generate.php one-page > src/one-page.html
done


