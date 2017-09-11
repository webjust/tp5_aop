<?php

namespace app\api\model;

use think\Db;

class Banner
{
    public static function getBannerById($id)
    {
        return Db::query("select * from banner_item where banner_id=?", [$id]);
    }
}