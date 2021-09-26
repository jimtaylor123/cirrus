# Cirrus HQ Customer management app

The app is available at http://54.74.115.224/

Set up instructions for local usage are shown below.

Suggested improvements, if more time were available:

1. A domain name 
2. SSL certificate, redirect all http traffic to https
3. Refactor MonthlyUsage class: 
   1. Rename as usageBill
   2. Instead of month and year, have a start and end date that defaults to start and end of month but can be any other start and end period
   3. Allow other currencies, perhaps with a currency table and foreign key ("currency_id").
4. Introduce coding standards with Larastan and PHP CS Fixer.
5. Write a few php unit integration tests to ensure the api endpoints return what we expect.
6. Implement our "API" endpoints according to the JSON api spec
7. Switch from boostrap to vuetify for front end component library

# Set up

Run the following commands: 

```bash

cp .env.example .env

composer install

php artisan key:generate

npm install && npm run dev (x2?)

docker build -t jimtaylor/cirrustest .

docker-copmose up -d

```

Your project should now be available to view at localhost.

After you have your db credentials, edit the values in .env and run 

```bash
php artisan migrate:fresh --seed
```

# Log in as test user

Username: jim@jimtaylor.space

Password: Password123