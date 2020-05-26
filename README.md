# Clonazione
```
git clone https://github.com/manzolo/symfony-api-template
cd symfony-api-template
composer install

```
# Creazione tabelle database da entity
```
bin/console doctrine:migrations:migrate
```

Nel file .env
  per mysql

```
DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name
```
per sqlite3
```
DATABASE_URL="sqlite:///%kernel.project_dir%/var/cache/dbtest.sqlite"
```

# Per avviare il server web interno di symfony
bin/console server:start

# catalogo Api
http://127.0.0.1:8000/api

# Sicurezza
nel file config/packages/security.yml
  ## Cambiare username password
  ## scommentare anonymous: true per vederlo (in modalità sviluppo, in produzione lasciarlo commentato)
```
        api:
            pattern:   ^/api
            stateless: true
            #anonymous: true
```

# Per generare una nuova entity (tabella)
```
bin/console make:entity --api-resource
```

## Applicare le modifiche sul database

```
bin/console make:migration
bin/console doctrine:migrations:migrate

```
# Per ottenere un token (chiamata in GET, di tipo json)
```
http://127.0.0.1:8000/api/login_check
{"username":"admin","password":"admin"}
```

# Link utili:
https://www.wellnet.it/blog/consigli/come-integrare-api-platform-e-jwt-authentication-unapplicazione

https://codete.com/blog/api-platform-rest-api-from-scratch-vol-2/
