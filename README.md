# verify

###该git项目主要是添加了一些验证类(目前只添加了身份证验证类，以后会添加手机号码验证、银行卡号验证等等)

##### 1、在composer.json中添加如下代码，并执行composer install(或者执行执行composer require zhangqiang/verify)：
```
  "require": {
      "zhangqiang/verify" : "*"
  },
  "repositories": [
      {
          "type": "composer",
          "url": "https://packagist.org"
      }
  ]
```

##### 2、在yii的composents中添加如下配置：
```
  'components'     => [
		'idcard' => [
            'class' => 'Verify\idcard\IdcardVerify'
        ]
	],
```

##### 3、代码中调用

```
  if(\Yii::$app->idcard->check('41128219910222051')){
      echo "该身份证号码正确";
  } else {
      echo "该身份证号码有误";
  }
```
