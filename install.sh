# compile the frontend code and copy them to backend/ folder

PROJECT_ROOT=$(dirname $(readlink -f "$0"))
cd "$PROJECT_ROOT/frontend"
yarn
yarn build
rm -rf ../backend/js
cp -r dist/js ../backend
rm -rf ../backend/css
cp -r dist/css ../backend
cp dist/index.html ../backend