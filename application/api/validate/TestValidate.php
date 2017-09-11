<?php

namespace app\api\validate;

use think\Validate;

class TestValidate extends Validate
{
    protected $rule = [
        'name' => 'require|max:8',
        'email' => 'email'
    ];
}