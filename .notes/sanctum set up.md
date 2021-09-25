# sanctum set up 

composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan migrate

'api' => [
    \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
    'throttle:api',
    \Illuminate\Routing\Middleware\SubstituteBindings::class,
],

in sanctum.php SANCTUM_STATEFUL_DOMAINS in .env e.g. SANCTUM_STATEFUL_DOMAINS=http://cirrus-test.80.localhost/
in cors.php 'paths' => ['*'], 
in cors.php 'supports_credentials' => true,
in boostrap.js window.axios.defaults.withCredentials = true;
in .env SESSION_DRIVER=cookie

skipping bootstrap.js csrf step because axios is supposed to do it for us
