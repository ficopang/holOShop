# holOShop

## Run the development server locally

#### Prepare the project
On your local machine, clone this repo:

```bash
git clone https://github.com/ORLANDOWTP/holOShop
cd holOShop
```

Now, copy the env file

```bash
cp .env.example .env
```

After that fill the env file value
```dotenv
// .env
...

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=holoshop
DB_USERNAME=root
DB_PASSWORD=

#These are used for mailtrap email configuration
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=Get your username at mailtrap.io
MAIL_PASSWORD=Get your password at mailtrap.io
MAIL_ENCRYPTION=tls

...

```
#### Install Vendor
```bash
composer i
```
#### Link Storage
```bash
php artisan storage:link
```
#### Run migration and seeder
```bash
php artisan migrate:refresh --seed
```
#### Run the web
```bash
php artisan serve
```
