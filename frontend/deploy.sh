yarn build
rm -rf ../backend/js 
rm -rf ../backend/css
cp -r dist/* ../backend
rm -r dist