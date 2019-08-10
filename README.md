# Spis Treści
- Konfiguracja
- Nowy projekt
- Istniejący projekt
- Developerka

# Konfiguracja
### Konfiguracja wordpressu znajduję się w pliku `wp-config-example.php`

- Zapisać plik `wp-config-example.php` -> `wp-config.php`
- Zmienić dane `db_name` -> `nazwa tabeli w phpmyadmin (utf8_general_ci)`
`dir_name` -> `nazwa folderu projektu na lokalu`


# Nowy projekt

Tworzenie nowego projektu: 
- przekopiować pliki starteru
- przekopiować pliki wordpressa do katalogu `wp`
- stworzyć bazę danych w phpmyadmin
> UWAGA! wszystkie pliki templatki znajdują się w katalogu src łącznie z .php, developerki dokonujemy tylko w katalogu `src/` pliki będą automatycznie kopiowane do katalogu `app/templates/<theme>/`, który jest poza repozytorium.

# Istniejący projekt

Odtwarzanie projektu z repozytorium
- sklonowanie istniejącego repozytorium `git clone ...`
- przekopiować pliki wordpressa do katalogu `wp`
- stworzyć bazę danych w phpmyadmin
- sklonować bazę danych z serwera DEV


# Developerka
- instalacja modułów `npm install`
- stworzyć plik `browsersync.yml`
- praca developerska `gulp`

> UWAGA! nie usuwać linijki z `/* [inject <type>] */` służy do określenia miejesca wstrzykiwania kodu
