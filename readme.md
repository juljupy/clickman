## Backend Software Developer Test

In this test I cover the following topics:

- Login Users.
- Login Users with Facebook account.
- Register user with email confirmation code.
- Users CRUD.
- Roles CRUD.
- ACL Implementation for permissions.
- Import / Export Users from / to XLS, XLSX, CSV.

## Login Users.

User can login with email and password credentials.

## Login Users with Facebook account.

User can login with Facebook account, if the user doesn't exist it will be created and logued in automatically.

The library used:

Laravel Socialite (https://github.com/laravel/socialite).

The scripts to control this proccess are:

- app/SocialAccount.php
- app/SocialAccountService.php

## Register user with email confirmation code.

User can register through Register link, after it fills the register form an email is sent to the emal that the user has entered with a confirmation link.
The user to login is the email registered and password is the email registered too.
The new user registered is stored with Customer Role.

## Users CRUD.

There are modules to process CRUD for users, and assign Roles to it (All this options are controlled by permissions assigned in roles modules).

## Roles CRUD.

There are modules to process CRUD for Roles, here the Administrator user can create Dinamic Roles with several permissions.

## ACL Implementation for permissions

Behind scenes Roles and Permissions assigned to the Logued user controls options and functions inside the webapp.

## Import / Export Users from / to XLS, XLSX, CSV.

Administrator user can Import and Export user data From and To XLS, XLSX, CSV.

The new user imported is stored with Customer Role and password is the email.

The library Laravel Excel v2.1.* for Laravel 5 has been used to proccess easily (https://github.com/Maatwebsite/Laravel-Excel).

## Demo users

- email: admin@mail.com
- password: adminclick
Role: admin

- email: agent@mail.com
- password: agentclick
Role: agent

- email: customer@mail.com
- password: customerclick
Role: customer