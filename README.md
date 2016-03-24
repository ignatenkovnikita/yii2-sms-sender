Client for service sms sender
=============================
Client for service sms sender

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist ignatenkovnikita/yii2-sms-sender "*"
```

or add

```
"ignatenkovnikita/yii2-sms-sender": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Add this to your main configuration's components array:

```php
'smsSender' => [
            'class' => \ignatenkovnikita\smssender\ClientSmsSender::className(),
            'gate' => your_gate,
            'sender' => your_name_sender,
            'credentials' => [
                'ID' => your_id_,
                'name' => yout_name_,
                'password' => your_pasword
            ]
        ],
```
Typical component usage
-----------------------
```php
Yii::$app->refillMobile->send(7 your_phone, your_message_text);
Yii::$app->refillMobile->state(your_message_id_response);
```