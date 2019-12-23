set -e
rm -rf ./dist
mkdir ./dist
php src/generate.php site build > dist/index.html
php src/merge-css.php ./src ./src/templates/site.html.twig ./dist/index.css
./node_modules/.bin/purifycss ./dist/index.css ./dist/index.html -o ./dist/index.min.css -i
php src/include-css.php ./dist/index.html
rm ./dist/index.css
rm ./dist/index.min.css

echo "Filesize: " 
ls -lha dist/index.html | nawk '{print $5}'

gzip dist/index.html
echo "Gzipped filesize: " 
ls -lha dist/index.html.gz | nawk '{print $5}'
gunzip dist/index.html.gz

php src/generate.php one-page build > dist/one-page.html
php src/merge-css.php ./src ./src/templates/one-page.html.twig ./dist/index.css
./node_modules/.bin/purifycss ./dist/index.css ./dist/one-page.html -o ./dist/index.min.css -i
php src/include-css.php ./dist/one-page.html
rm ./dist/index.css
rm ./dist/index.min.css

aws s3 cp ./dist/index.html s3://antoineviau.com/index.html --acl public-read --profile antoineviau
aws s3 cp ./dist/index.html s3://antoineviau.com/one-page.html --acl public-read --profile antoineviau


	