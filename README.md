# Simple Blog API
This is a simple blog API which uses [Laravel 8 Framework](https://github.com/laravel/laravel)
## Application Setup
 - Clone the repository
 - Install required laravel and NPM packages

If you are using windows just run setup.bat file and for none windows you can use the setup.sh file to install the packages.

### Manual Installation
Manually Run the Scripts for package installation
##### Install NPM PAckages
npm i
##### Laravel Packages
composer install -d '[appdirectory]\api'

## Run Servers
For windows user you can run test.bat and it will run independent commands for Node and Laravel Test Server, for none  windows server run these commands independently
##### React Front End Test Server
npm start
##### Laravel Test Server
php api/artisan serve

Front End Server http://localhost:3000
Laravel API Server http://localhost:8000

# Application Usage
##### Account Registration
Register a test account on the link below
http://localhost:3000/admin/register
##### Account Registration
After registration login your test account to start posting blogs
http://localhost:3000/admin/login
##### Posting New Blog
http://localhost:3000/admin/posts/new


# Todo
- Replicate the front-end application to Vue JS
- Upload project to a repo (Github, Gitlab, etc.)