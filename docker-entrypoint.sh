#!/bin/sh
set -e

echo "==> Writing .env from environment variables..."

cat > /app/.env <<EOF
APP_NAME="${APP_NAME:-Portfolio}"
APP_ENV="${APP_ENV:-production}"
APP_KEY="${APP_KEY:-}"
APP_DEBUG="${APP_DEBUG:-false}"
APP_URL="${APP_URL:-https://vaneric-portfolio.onrender.com}"

LOG_CHANNEL=stderr
LOG_LEVEL=error

DB_CONNECTION=sqlite
DB_DATABASE=/app/database/database.sqlite

SESSION_DRIVER=file
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
EOF

echo "==> Generating app key if missing..."
php artisan key:generate --force

echo "==> Running migrations..."
php artisan migrate --force

echo "==> Caching config and routes..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "==> Starting server on port ${PORT:-10000}..."
exec php -S 0.0.0.0:${PORT:-10000} -t public
```

---

## Render Dashboard — Environment Variables

Go to your Render service → **Environment** tab and set these:
```
APP_NAME        = Portfolio
APP_ENV         = production
APP_DEBUG       = false
APP_URL         = https://vaneric-portfolio.onrender.com
APP_KEY         =                          ← leave blank, entrypoint generates it
```

> ⚠️ **Do not commit `.env` to GitHub.** The entrypoint script writes it fresh every time the container starts using Render's injected variables.

---

## Also add `.env` to `.gitignore`

Make sure your `.gitignore` has:
```
.env