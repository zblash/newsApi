## Haberler API

Laravel içerisinde gelen token based api ile geliştirilen küçük çaplı bir Restful uygulamadır.

### Kullanımı

- [GET] Haber Listesi : /news?api_token=apitoken

- [GET] Tekil Haber İçeriği : /news/{id}?api_token=apitoken

- [GET] Kategoriye Göre Haberler /groups/news/{id}?api_token=apitoken

- [GET] Kategori Listesi /groups?api_token=apitoken

- [GET] Tekil Kategori İçeriği /groups/{id}?api_token=apitoken

- [POST] Api Erişim Token : /get_token?username=username&password=password