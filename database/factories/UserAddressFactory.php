<?php

use Faker\Generator as Faker;

$factory->define(App\Models\UserAddress::class, function (Faker $faker) {
    $addresses = [
        ['湖南省','长沙市','芙蓉区'],
        ['湖南省','郴州市','临武县'],
        ['广东省','深圳市','宝安区'],
        ['北京市','市辖区','怀柔区'],
        ["江苏省", "南京市", "浦口区"],
        ["江苏省", "苏州市", "相城区"],
    ];

    $address = $faker->randomElement($addresses);

    return [
        'province'      => $address[0],
        'city'          => $address[1],
        'district'      => $address[2],
        //把百分号（%）符号替换成一个作为参数进行传递的变量
        'address'       => sprintf('第%d街道第%d号',$faker->randomNumber(2),$faker->randomNumber(3)),
        'zip'           => $faker->postcode,
        'contact_name'  => $faker->name,
        'contact_phone' => $faker->phoneNumber,
    ];
});
