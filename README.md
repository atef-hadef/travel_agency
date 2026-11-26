<div align="center">

# ✈️ Travel Agency Web Application

**A Symfony 6.4 platform for a travel agency: flights, hotels, travel packages, bookings and an admin back-office.**

![PHP](https://img.shields.io/badge/PHP-8.1+-777BB4?style=flat-square&logo=php&logoColor=white)
![Symfony](https://img.shields.io/badge/Symfony-6.4-000000?style=flat-square&logo=symfony&logoColor=white)
![Doctrine](https://img.shields.io/badge/Doctrine-ORM%203-F58220?style=flat-square)
![EasyAdmin](https://img.shields.io/badge/EasyAdmin-4-0A66C2?style=flat-square)
![Docker](https://img.shields.io/badge/Docker-Compose-2496ED?style=flat-square&logo=docker&logoColor=white)

</div>

---

## Features

| Area | Details |
|---|---|
| **Catalogue** | Flights, hotels and travel packages, linked to destinations |
| **Bookings** | Booking flow for authenticated users |
| **Accounts** | Registration, login, user profile |
| **Admin back-office** | EasyAdmin dashboard with CRUD for bookings, flights, hotels, packages and users |
| **Data tooling** | Doctrine fixtures, sample-data command, `app:make-user-admin` command |
| **Quality** | PHPUnit functional tests for registration, security and admin ([TESTING.md](TESTING.md)) |

## Architecture

```mermaid
flowchart LR
    B[Browser] --> C[Symfony controllers<br/>Home, Flight, Hotel, Package, Booking, Profile]
    C --> T[Twig templates]
    C --> R[Doctrine repositories]
    R --> DB[(Database)]
    A[EasyAdmin<br/>/admin] --> R
    S[Symfony Security<br/>form login + roles] -.protects.-> C
    S -.protects.-> A
```

Entities: `User`, `Destination`, `Flight`, `Hotel`, `Package`, `Booking`. The schema is documented in [`database_diagram.puml`](database_diagram.puml).

## Tech stack

PHP 8.1+ · Symfony 6.4 · Doctrine ORM 3 + Migrations · EasyAdmin 4 · KnpPaginator · Twig · Webpack Encore + Stimulus · PHPUnit · Docker Compose

## Getting started

**Prerequisites:** PHP 8.1+, Composer, Node.js and npm, Docker (optional, for the database).

```bash
git clone https://github.com/atef-hadef/travel_agency.git
cd travel_agency

composer install
npm install

# Local configuration (never commit .env.local)
cp .env .env.local
```

Edit `.env.local`:

```bash
# generate a secret:  php -r 'echo bin2hex(random_bytes(16)), PHP_EOL;'
APP_SECRET=<your-generated-secret>
DATABASE_URL="mysql://user:password@127.0.0.1:3306/travel_agency?serverVersion=8.0"
```

> The default `DATABASE_URL` targets MySQL. `compose.yaml` provides a PostgreSQL service instead: if you use it, change `DATABASE_URL` accordingly.

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load        # optional sample data

npm run build                                  # or: npm run watch
symfony server:start                           # http://localhost:8000
```

### Create an administrator

1. Register a user through the site.
2. Promote it:

```bash
php bin/console app:make-user-admin user@example.com
```

The back-office is then available at `/admin`.

## Testing

```bash
php bin/phpunit
```

See [TESTING.md](TESTING.md) and [MANUAL_TESTING.md](MANUAL_TESTING.md) for the automated and manual test plans.

## Project structure

```
├── src/
│   ├── Controller/        public controllers + Admin/ (EasyAdmin CRUD)
│   ├── Entity/            User, Destination, Flight, Hotel, Package, Booking
│   ├── Repository/        Doctrine repositories
│   ├── Form/ Security/    forms and authentication
│   ├── Command/           sample data, make-user-admin
│   └── DataFixtures/      fixtures
├── templates/             Twig views
├── assets/                JavaScript / Stimulus / styles
├── tests/                 PHPUnit tests
├── config/                Symfony configuration
└── compose.yaml           database service
```

## Security notes

- Secrets belong in `.env.local` or the environment, not in `.env`.
- Change all default database credentials before any deployment.

## License

No license has been specified yet.

## Author

**Atef Ben Hadef**: [GitHub](https://github.com/atef-hadef) · [LinkedIn](https://linkedin.com/in/atef-ben-hadef)
