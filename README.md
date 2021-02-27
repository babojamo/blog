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

### Setup Env File
create .env file and copy .env.example content to the create .env

Replace database values

```
DB_CONNECTION=mysql
DB_HOST=host.docker.internal
DB_PORT=4306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

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
http://localhost:3000/register
##### Account Registration
After registration login your test account to start posting blogs
http://localhost:3000/login
##### Posting New Blog
http://localhost:3000/posts/new


# Todo
- Replicate the front-end application to Vue JS
- Upload project to a repo (Github, Gitlab, etc.)

# Available End-points

### Auth API
API Endpoints that needs JWT Token authorization

**Posts**
- POST: http://localhost:8000/api/posts
- PATCH: http://localhost:8000/api/posts/first-post
- DELETE: http://localhost:8000/api/posts/new-title

**Posts/Comments**
- POST : http://localhost:8000/api/posts/first-post/comments
- PATCH: http://localhost:8000/api/posts/first-post/comments/1
- DELETE: http://localhost:8000/api/posts/first-post/comments/1

**Logout**
- POST: http://localhost:8000/api/logout

### Guest API
Public endpoints that don't need JWT Token

**Posts**
- GET: http://localhost:8000/api/posts?=page=1
- GET: http://localhost:8000/api/posts/first-post

**Posts/Comments**
- GET: http://localhost:8000/api/posts/first-post/comments



**User Authorization**
- POST: http://localhost:8000/api/register
- POST: http://localhost:8000/api/login



