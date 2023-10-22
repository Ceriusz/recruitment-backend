Instalacja zależności:
composer install

Uruchomienie kontenerów:
./vendor/bin/sail up -d

Uruchomienie migracji:
./vendor/bin/sail php artisan migrate

Uruchomienie seedera (100 książek i 10 kategorii)
./vendor/bin/sail php artisan db:seed

Strona dostępna pod adresem:
http://localhost/books
