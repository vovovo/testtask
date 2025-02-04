# Тестовое задание

Запуск и заполнение фикстурами:
```
make init && make fixtures-load
```
Примеры запросов:
```
### Calculate Price
POST http://127.0.0.1:8337/calculate-price
Accept: application/json
Content-Type: application/json

{
"product" : "0194ce07-5f72-70ca-b332-b8fe5ac91ca3",
"taxNumber" : "GR123456789",
"couponCode" : "P15"
}

### Execute Purchase
POST http://127.0.0.1:8337/purchase
Accept: application/json
Content-Type: application/json

{
"product" : "0194ce07-5f72-70ca-b332-b8fe5ac91ca3",
"taxNumber" : "GR123456789",
"couponCode" : "P15",
"paymentProcessor": "custom"
}
```

 