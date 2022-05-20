#!/usr/bin/env sh

git checkout production
git merge main --no-edit
git push origin production
git checkout main

# Copiat de https://forge.laravel.com/servers/512103/sites/1487951#/application
wget https://forge.laravel.com/servers/506169/sites/1507990/deploy/http?token=6dotl58B10pU9wEn7H5kNZAsI8TZksDgI5fU4YVg -0 /dev/null
