# A simple CRM project

Crm Project based on Laravel framework - under development

## Installing
Installation and setting up database: use the following commands:
* composer install
* php artisan:migrate
* php artisan db:seed


## Features
* Country management,
* Account management,
* Contact and notes management-(contacts and notes associated with each account). 
* File uploads 
* Recent activity log on dashboard page.
* Simple Elasticsearch implementation. 
* Both RestApi and Web interface. 

## Rest Api docs:

### Authenticate user

Method- POST:
```
URI- /api/authenticate – params- email, password
```
Description – authenticates the user and creates jtw.
### User registration user:
Method- POST:
```
URI- /api/createRegistration - params- email, password, username.
```
### Get all users:
Method- GET:
```
URI- /api/users – params- token
```
### Get a single user:
Method- GET:
```
URI- /api/users/1 – params- token
```
### Update user:
Method- PUT:
```
URI- /api/users/1 – params- token, email, password, username, pic (file)
```
### Delete user:
Method- DELETE:
```
URI- /api/users/1 – params- token
```
### Get all countries:
Method- GET:
```
URI- /api/countries – params- token
```
### Get a single country:
Method- GET:
```
URI- /api/countries/1 – params- token
```
### Create a country:
Method- POST:
```
URI- /api/countries– params- token, name, description
```
### Update a country:
Method- PUT:
```
URI- /api/countries– params- token, name, description (optional)
```
### Delete a country:

Method- DELETE:
```
URI- /api/countries/1
```
### Get accounts for a country:
Method- GET:
```
URI- /api/countries/1/accounts – params- token
```
### Get all accounts:
Method- GET:
```
URI- /api/accounts – params- token
```
### Get a single account:
Method- GET:
```
URI- /api/account/1 – params- token
```
### Create an account:
Method- POST:
```
URI- /api/countries– params- token, country_id, user_id, name, description,street, city, country, zip, phone.

```
### Update an account:

Method- PUT:
```
URI- /api/accounts– params- token name, description, street, city, country, zip, phone (optional)
```
### Delete an account:
Method- DELETE:
```
URI- /api/accounts/1
```
### Get contacts for an account:
Method- GET:
```
URI- /api/accounts/1/contacts – params- token
```
### Get contact for an account:
Method- GET:
```
URI- /api/accounts/1/contacts/1 – params- token
```
### Get notes for an account:
Method- GET:
```
URI- /api/accounts/1/notes – params- token
```
### Get note for an account:
Method- GET:
```
URI- /api/accounts/1/notes/1 – params- token
```
### Get all contacts:
Method- GET:
```
URI- /api/contacts – params- token
```
### Get a single contact:
Method- GET:
```
URI- /api/contacts /1 – params- token
```
### Create a contact:
Method- POST:
```
URI- /api/contacts – params- token, account_id, user_id, firstname, lastname, email, skype, phone, company.
```
### Update a contact:
Method- PUT:
```
URI- /api/contacts– params- token, account_id, user_id, firstname, lastname, email, skype, phone, company (optional)
```
### Delete a contact:

Method- DELETE:
```
URI- /api/contacts/1
```
### Get all notes:
Method- GET:
```
URI- /api/notes – params- token
```
### Get a single note:
Method- GET:
```
URI- /api/notes/1 – params- token
```
### Create a note:
Method- POST:
```
URI- /api/notes – params- token, account_id, user_id, name, description, doc (file upload).
```
### Update a note:
Method- PUT:
```
URI- /api/notes–  token, account_id, user_id, name, description, doc (file upload).
```
### Delete a note:
Method- DELETE:
```
URI- /api/notes/1
```



## Packages used
* [JSON Web Token Authentication for Laravel & Lumen](https://github.com/tymondesigns/jwt-auth) 
* [Laravel & Fractal](https://github.com/salebab/larasponse)
* [Logger](https://github.com/spatie/activitylog)
* [Elaticquent](https://github.com/elasticquent/Elasticquent)
