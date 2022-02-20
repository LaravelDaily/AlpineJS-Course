## Livewire Kit: Star Rating in Livewire

### How to use

- Copy `.env.example` file to `.env` and edit database credentials there
- Run `composer install`
- Run `php artisan key:generate`
- Run `php artisan migrate --seed` (it has some seeded data for your testing)
- That's it: launch the main URL
- You will see Tailwind CSS version, for Bootstrap visit `/bootstrap` URL


### Files of the Component

- app/Http/Livewire/Rate.php
- app/Models/Rating.php
- resources/views/livewire/tailwind/rate.blade.php
- resources/views/livewire/bootstrap/rate.blade.php
- public/img/star-active.png 
- public/img/star-inactive.png 
