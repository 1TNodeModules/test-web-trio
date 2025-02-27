Test Web Atrio 

Clone the repository

    git clone git@gitlab.com:yanicehalli/test-web-atrio.git

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate database model

    php artisan migrate

Generate seeders 

    php artisan db:seed

Launch app 

    npm run dev, php artisan serve

API doc 

    storage/app/private/specs


Evaluation 

Back 2h30  => soucis d'env :/
Front      => 1h20 
git et spec => le reste

