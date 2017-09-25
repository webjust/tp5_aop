# THINKPHP 5 API

## 需求分析

## 封装校验层
*D:\wamp\www\aop_api.dev\application\api\validate\BaseValidate.php*

    <?php    
    namespace app\api\validate;
    
    use app\lib\exception\ParameterException;
    use think\Request;
    use think\Validate;
    
    class BaseValidate extends Validate
    {
        public function goCheck() {
            $request = Request::instance();
            $data = $request->param();
            $result = $this->batch()->check($data);
            if (!$result) {
                $error = $this->getError();
                $e = new ParameterException([
                    'msg' => $error
                ]);
                //$e->msg = $error;   // 覆盖默认值
                //$e->errorCode = 10002;
                throw $e;
            } else {
                return true;
            }
        }
    }