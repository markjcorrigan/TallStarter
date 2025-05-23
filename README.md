I am working on the TallStarter from Mortenbak per information here:

Tallstarter - A Laravel Livewire Starter Kit
Latest Version on Packagist Project Status: Active – The project has reached a stable, usable state and is being actively developed. GitHub last commit GitHub Sponsors

This Starter kit contains my starting point when developing a new Laravel project. Its based on the official Livewire Starter kit, and includes the following features:

✅ User Management,
✅ Role Management,
✅ Permissions Management,
✅ Localization options
✅ Separate Dashboard for Super Admins
✅ Updated for Laravel 12.0 and Livewire 3.0
Admin dashboard view:
alt text

Supporting multiple languages:
alt text

TALL stack
It uses the TALL stack, which stands for:

Tailwind CSS
Alpine.js
Laravel
Laravel Livewire using the components.
Further it includes:
Among other things, it also includes:

Flux UI for flexible UI components (free version)
Laravel Pint for code style fixes
PestPHP for testing
missing-livewire-assertions for extra testing of Livewire components by Christoph Rumpel
LivewireAlerts for SweetAlerts
Spatie Roles & Permissions for user roles and permissions
Strict Eloquent Models for safety
Laravel Debugbar for debugging
Laravel IDE helper for IDE support
Upcoming features
I'm considering adding the following features, depending on my clients' most common requirements:

Wire Elements / Modals for modals (still deciding - for now I'm using Flux UI for this)
Laravel Cashier for Stripe integration
Installation
alt text

laravel new my-project --using=mortenebak/tallstarter
You could also just use this repository as a starting point for your own project by clicking use template. If installing manually, these are the steps to install:

1. Install dependencies
   composer install
   npm install
   npm run build # or npm run dev
2. Configure environment
   Setup your .env file and run the migrations.

cp .env.example .env
php artisan key:generate
php artisan storage:link
3. Migration
   php artisan migrate
4. Seeding
   php artisan db:seed
5. Creating the first Super Admin user
   php artisan app:create-super-admin
6. Set default timezone if different from UTC
   // config/app.php
   return [
   // ...

   'timezone' => 'Europe/Copenhagen' // Default: UTC

   // ...
   ];
   Developing
   Check for code style issues
   composer review
   This command will run, in order:

Laravel/Pint
PHPStan
Rector (dry-run)
PestPHP
Ensuring that your code is up to standard and tested.

Contributing
Feel free to contribute to this project by submitting a pull request.

Credits
I'd like to thank all the people who have contributed to the packages used in this project. Especially Spatie for their great packages, Livewire and Alpinejs for their awesome framework and the Laravel community for their great work. And of course Laravel for their awesome framework, and their Livewire Starter Kit, which this kit is based on.

Contributers
Take a look at the contributors who have helped make this project better. Many thanks!

Donate
If you like this project, please consider donating to support it.

Thanks to:

Grazulex
