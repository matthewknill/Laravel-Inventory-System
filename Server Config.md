# Server Configuration
### Install web server and PHP

```bash
sudo apt-get update
sudo apt-get install apache2
sudo apt-get -y install wget curl zip unzip php7.3 php7.3-zip php7.3-cli php7.3-common php7.3-opcache php7.3-curl php7.3-mbstring php7.3-mysql php7.3-zip php7.3-xml
```

### Setup composer

```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
sudo chmod 755 composer-setup.php
php -r "if (hash_file('sha384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
php -r "unlink('composer-setup.php');"
```

### Setup Laravel

```bash
cd /var/www/html
sudo composer require php-di/php-di
sudo composer create-project --prefer-dist laravel/laravel 'WebInterface'
sudo php artisan serve
```

### Setup IDE Helper
```bash
cd /var/www/html
wget https://gist.githubusercontent.com/barryvdh/bb6ffc5d11e0a75dba67/raw/a852a2ad3c478b503d0f5d2b97fae87195683ad3/.phpstorm.meta.php

php artisan ide-helper:generate
php artisan ide-helper:models # set no to make helper models rather than editing
```

### Change Web Root for Laravel

```bash
sudo nano /etc/apache2/sites-available/000-default.conf
```
Change `DocumentRoot /var/www/html` to `DocumentRoot /var/www/html/src/Interfaces/WebInterface/public`
```bash
sudo service apache2 restart
```

### Enable Root SSH Login

```bash
sudo sed -i 's/#PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config
sudo service ssh restart
```

### Add Key

```bash
php artisan key:generate
```

### Add to etc/hosts

```bash
127.0.0.1       laravel.dev
```

### Configure MySQL
```sql
GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY '<password>' WITH GRANT OPTION;
```

**Configure MySQL for Laravel:**  
Change password in `.env` file.
