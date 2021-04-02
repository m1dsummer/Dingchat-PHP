PROJECT_ROOT=$(dirname $(readlink -f "$0"))
cd "$PROJECT_ROOT/docker"
docker-compose up -d