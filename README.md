# Sushico Blog App

## Kurulum
Bilgisayarınızda php, composer ve docker yüklü olmalıdır.
```
composer install
```

## Çalıştırma

Uygulamayı çalıştırmak için önce docker-compose ile mysql ve redis
servislerini ayağa kaldırın.

```
docker-compose up -d
```

> Bu adımda veritabanı ve tabloları otomatik olarak oluşturulmaktadır

Ardından aşağıdaki komut ile uygulamayı çalıştırabilirsiniz.

```
php -S localhost:8000 -t public
```

## Postman Koleksiyonunu Kullanma

Sushico.postman_collection.json dosyasını postman içine import ederek apiyi kullanabilirsiniz
