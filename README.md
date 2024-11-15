# phpCrud

http://localhost/phpCrud/crud/index.php

Vytvorenie databázy
1. V phpMyAdmin klikni na **Databases**.
2. Vytvor novú databázu s názvom `eshop`.
3. Potom klikni na **Import** v hornej lište a vyber súbor `database/eshop.sql`, ktorý je súčasťou tohto projektu.
4. Klikni na **Go**.

### Krok 4: Spustenie projektu
1. Skopíruj celý projekt do priečinka `htdocs` v inštalácii XAMPP (napr. `C:\xampp\htdocs\my_project`).
2. Otvor webový prehliadač a prejdite na [http://localhost/my_project](http://localhost/my_project).
3. Aplikácia by mala byť teraz funkčná a prepojená s databázou.

### Krok 5: Konfigurácia pripojenia k databáze
Ak je potrebné upravit pripojenie k databáze (napr. zmeniť užívateľské meno alebo heslo), otvorte súbor `config.php` a upravte nastavenia pripojenia podľa svojich potrieb:
```php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');  // Predvolený užívateľ v XAMPP
define('DB_PASSWORD', '');      // Predvolené heslo je prázdne
define('DB_NAME', 'eshop');     // Názov databázy