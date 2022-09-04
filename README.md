### Application

Backend

|  Т            |    В       |
| ---------     | -----:     |
| Laravel       |   9.19 |

### Серверное ПО

|  Т            |    В       |
| ---------     | -----:     |
| PHP           |   8.0   |
| MySQL         |   8.0   |
| Nginx         |   1.23.1   |

# POSTMAN 
  Postman коллекции доступны по директории [postman](postman)


# УСТАНОВКА

#### 1. Клонируем проект

```code
git clone git@github.com:TilekKozy/test_dev.git
```

#### 2. Копируем env.example и создаем .env

```code
cp .env.example .env
```

#### 3. Заходим в проект и устанавливаем зависимости

```code
composer install && php artisan key:generate
```

#### 4. Запускаем миграции

```code
php artisan migrate
```

#### 5. Запускаем сиды

```code
php artisan db:seed
```

#### 6. Устанавливаем passport

```code
php artisan passport:install
php artisan passport:keys
```

# УСТАНОВКА С ПОМОЩЬЮ DOCKER

#### 1. Клонируем проект

```code
git clone git@github.com:TilekKozy/test_dev.git
```

#### 2. Установите в каталоге проекта такой уровень разрешений, чтобы ее владельцем был пользователь без привилегий root

```code
sudo chown -R $USER:$USER test_dev
```

#### 3. Перейдите в каталог test_dev

```code
cd test_dev
```

#### 4. Копируем env.example и создаем .env

```code
cp .env.example .env
```

#### 5. Копируем docker-lamp в директорию проекта

```code
git clone git@github.com:TilekKozy/docker-lamp.git
```

#### 6. Заходим в проект и устанавливаем зависимости

```code
docker run --rm -v $(pwd):/app composer install
```

#### 7. Запускаем одну команду для запуска всех контейнеров

```code
docker-compose up -d
```
#### 8. Запускаем терминал Bash внутри контейнера app

```code
docker exec -it app bash
```

#### 9. Генерируем ключ и запускаем миграции

```code
php artisan key:generate
php artisan migrate
```

#### 10. Запускаем сиды

```code
php artisan db:seed
```

#### 11. Устанавливаем passport

```code
php artisan passport:install
php artisan passport:keys
```
