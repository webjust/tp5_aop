<?php

namespace app\api\controller\v1;

use app\api\model\Banner as BannerModel;
use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\BannerMissException;

// 命名空间别名

class Banner
{
    /**
     * 获取指定 id 的Banner信息
     * @param $id banner表的id号
     * @http GET
     * @url  /banner/:id
     */
    public function getBanner($id)
    {
        (new IDMustBePostiveInt())->goCheck();
        $banner = BannerModel::getBannerById($id);

        if (!$banner) {
            throw new BannerMissException();
        }
        return json($banner);
    }
}