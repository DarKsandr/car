## Задание:

Даны два списка. Список автомобилей и список пользователей.
C помощью laravel сделать api для управления списком использования автомобилей пользователями.
В один момент времени 1 пользователь может управлять только одним автомобилем. В один момент времени 1 автомобилем может управлять только 1 пользователь.

[Аренда автомобилей](http://localhost/rent)

[Swagger документация](http://localhost/api/documentation)

Файл с swagger документацией
```
/storage/api-docs/api-docs.json
```


## Установка
1. Склонировать проект
   ```
   git clone https://github.com/DarKsandr/shop.git
   ```
2. Установить зависимости приложения, перейдя в каталог приложения и выполнив следующую команду. Эта команда использует небольшой контейнер Docker, содержащий PHP и Composer, для установки зависимостей приложения:

    ```
    docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v $(pwd):/var/www/html \
        -w /var/www/html \
        laravelsail/php81-composer:latest \
        composer install --ignore-platform-reqs
    ```
3. Запустить проект
   ```
   ./vendor/bin/sail up -d
   ```
4. Копировать env файл и сгенерировать APP_KEY
   ```
   cp .env.example .env
   ./vendor/bin/sail artisan key:generate
   ```
5. Фикс env файла (./.env: строка 6: $'\r': команда не найдена)
   ```
   sed -i 's/\r$//' .env
   ```
6. Миграции и создание первоначальных данных
   ```
   ./vendor/bin/sail artisan migrate
   ./vendor/bin/sail artisan db:seed
   ```
7. Генерация Swagger
   ```
   ./vendor/bin/sail artisan l5-swagger:generate
   ```