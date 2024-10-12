# Dependencies fetching
composer install
npm install

# Environment file and key generation
cp .env.example .env
php artisan key:generate

# SQLite database setup
touch database/database.sqlite
php artisan migrate
