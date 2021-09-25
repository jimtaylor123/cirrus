# Cirrus HQ Customer management app

# Set up

cp .env.example .env
composer install
php artisan key:generate
php artisan migrate:fresh --seed
npm install && npm run dev (x2?)

# Log in as test user

jim@jimtaylor.space
Password123