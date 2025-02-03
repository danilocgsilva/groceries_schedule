# Groceries schedule

An web application where you register all your expenses with groceries. Based on data you provide, it forecasts new purhcases and calculates total expenses.

This is a platform in woprking in progress.

## Risign an environment to develop

Enter in the `docker` folder and run `docker compose up -d --build`.

## Running application for development

1. Enter in the container
2. Change the owner of storage for `www-data` user: `chown -Rv www-data storage`
2. Run: `composer dev`

## What does the application do?

* Register a grocery item.
* Register a purchase of the item.
* Register a place, where purchase happened.
