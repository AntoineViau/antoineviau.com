set -e
rm -rf ./dist
mkdir ./dist
php src/index.php build > dist/index.html


php build.php merge ./src ./src/index.php
./node_modules/.bin/purifycss ./dist/index.css ./dist/index.html -o ./dist/index.min.css -i
php build.php include-css
rm ./dist/index.css
rm ./dist/index.min.css

echo "Filesize: " 
ls -lha dist/index.html | nawk '{print $5}'

gzip dist/index.html
echo "Gzipped filesize: " 
ls -lha dist/index.html.gz | nawk '{print $5}'
gunzip dist/index.html.gz

aws s3 cp ./dist/index.html s3://antoineviau.com/index.html --acl public-read --profile antoineviau


	