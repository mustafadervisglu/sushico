# Sushico Blog App

## Kurulum

```
composer install
```

## Çalıştırma

Uygulamayı çalıştırmak için önce docker-compose ile mysql ve redis
servislerini ayağa kaldırın.

```
docker-compose -d up
```

> Bu adımda veritabanı ve tabloları otomatik olarak oluşturulmaktadır

Ardından aşağıdaki komut ile uygulamayı çalıştırabilirsiniz.

```
php -S localhost:8000 -t public
```

## Postman Koleksiyonunu Kullanma

Sushico.postman_collection.json dosyasını postman içine import ederek apiyi kullanabilirsiniz
