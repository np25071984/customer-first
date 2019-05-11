<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Customer First

Test repository for educational purposes only.

## Dev environment

Three docker containers: php-fpm, mysql, nginx. Local storage with configs and source code. Composer runs from one more container and returns result to host system. So, the host is completely free from development software and contain a text editor only.

`docker run --rm -v $(pwd):/app composer update`

## Autherization system

Standard Laravel authorisation system with user validation by email was extended with `admin` role.
`App\Http\Middleware\IsAdmin` middleware was added for admin section.

## Categories

Categories based on parent-child tree hierarchy, ordered by simple int value.
Every category  has to have `slug` value. We can add infinity number of new `slugs` and request any of them. In case the `slug` obsolete, the app returns 301 redirection to the last one.

`CategorySlug` object injects directly to a `Controller`.

`Category` object contains:
 * `ItemContainer` objects which located all way down through the hierarchy tree

## Brands

Simple `Brand` model.

`BrandSlug` object injects directly to a `Controller`.

## Goods model

`Item` model contains a product entity. `ItemContainer` model contains any number of `Items`. It makes possible to combine similar products and inherit properties.

`ItemContainer` object contains:
 * `Item` list
 * `Brand`
 
`Items` object contains:
 * `ItemContainer`

`ItemSlug` object injects directly to a `Controller`.

TODO:
 * Admin extends User
 * CRUD Brand