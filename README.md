# THINKPHP 5 API

## 需求分析
- 创建api模块、控制器、模型
- 定义路由
- 获取请求的参数Request,自动验证
- 验证层的使用、规则、自定义规则，封装验证层（验证不通过抛出异常）
- 全局异常处理

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