# Instagram Clone

This repository is an Instagram clone project built using Laravel and Vue.js. It aims to replicate the core functionality of Instagram, allowing users to sign up, post photos, edit profile and follow other users.

## Table of Contents

1. [Running Locally](#running-locally)
1. [Tech Stack](#tech-stack)
1. [Routes](#routes)

## Running Locally

1. Clone this repo
1. `cd jobs-app`
1. `composer install`
1. `npm install`
1. `cp .env.example .env`
1. Add your local database credentials in the .env file
1. `php artisan migrate`
1. `php artisan storage:link`
1. `php artisan serve`
1. `npm run dev`

## Tech Stack

1. Laravel
1. Vue.js
1. Bootstrap
1. MySQL

## Routes

* / --> home page/landing page, showcasing all posts from users you follow
* /post/create --> shows the form to create a new post
* /post/:id --> shows a single post of a user
* /profile/:id --> shows the profile of a user, displaying their posts and profile details
* /profile/:id/edit --> shows the form to edit and update your profile
