# ---- Étape 1 : installation des dépendances PHP ----
FROM composer:2 AS vendor
WORKDIR /app
COPY . .
RUN composer install --no-dev --no-interaction --no-scripts --prefer-dist --ignore-platform-reqs

# ---- Étape 2 : image d'exécution ----
# VULN-07 (conteneur) : image de base non minimale et conteneur exécuté en root
# (aucune instruction USER) -> détecté par Trivy (vulnérabilités OS + mauvaise configuration).
FROM php:8.2-cli
WORKDIR /var/www/html

COPY . .
COPY --from=vendor /app/vendor ./vendor

RUN touch database/database.sqlite \
    && php artisan package:discover --ansi

EXPOSE 8000
CMD ["sh", "-c", "php artisan migrate --force --seed && php artisan serve --host=0.0.0.0 --port=8000"]
