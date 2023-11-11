## Laravel book-app

Laravel book-app to projekt stworzony w oparciu o framework Laravel, umożliwiajacy wykonywanie akcji w bibliotece książek.

## Wymagania wstępne

Przed rozpoczęciem pracy należy zainstalować następujące narzędzia:
- PHP (zalecana wersja 8.0 + )
- Composer
  
## Instalacja
Należy sklonować projekt do swojego lokalnego środowiska:

- https://github.com/daniel-jedrasiewicz/book-app

Zainstalować zależności PHP za pomocą Composera:

- composer install

Skonfigurować środowisko:

- Skopiuj plik .env.example i nazwij go .env. Następnie dostosuj zmienne środowiskowe
- W pliku .env ustaw swoje dane dostępowe do bazy mysql
(
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=
DB_PASSWORD=
)

Wykonaj migracje:

- php artisan migrate

Wygeneruj klucz poleceniem:

- php artisan key:generate

Uruchom serwer deweloperski:

 - php artisan serve


### Użycie

Aplikacja umożliwia akcje związane z biblioteką książek za pomocą prostego interfejsu użytkownika. W panelu administracyjnym można:

- Dodawanie nowych książek
- Edycję książek
- Wyświetlenie szczegółów na temat ksiażki i autora
- Usuwanie książek z biblioteki

## Rozwój i dostosowanie

Projekt jest otwarty na rozwijanie i dostosowywanie do własnych potrzeb. Można dodawać nowe funkcjonalności jak dostępność książek, wypożyczalnia. Lista autorów wraz z edycją i dodawaniem.

## Autor

Napisane przez: Daniel Jędrasiewicz

## Licencja

Ten projekt jest dostępny na licencji MIT. 
