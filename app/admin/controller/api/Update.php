<?php

// +----------------------------------------------------------------------
// | ThinkAdmin
// +----------------------------------------------------------------------
// | 版权所有 2014~2019 广州楚才信息科技有限公司 [ http://www.cuci.cc ]
// +----------------------------------------------------------------------
// | 官方网站: http://demo.thinkadmin.top
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )
// +----------------------------------------------------------------------
// | gitee 代码仓库：https://gitee.com/zoujingli/ThinkAdmin
// | github 代码仓库：https://github.com/zoujingli/ThinkAdmin
// +----------------------------------------------------------------------

namespace app\admin\controller\api;

use think\admin\Controller;

/**
 * 系统更新接口
 * Class Update
 * @package app\admin\controller\api
 */
class Update extends Controller
{
    /**
     * 获取文件列表
     */
    public function tree()
    {
        $plugs = new \think\admin\plugs\Plugs();
        $this->success('获取当前文件列表成功！', $plugs->buildFileList([
            'think', 'app/admin', 'public/static',
        ], ['public/static/self']));
    }

    /**
     * 读取线上文件数据
     * @param string $encode
     */
    public function get($encode)
    {
        $this->file = dirname($this->app->getAppPath()) . '/' . decode($encode);
        if (file_exists($this->file)) {
            $this->success('读取文件成功！', [
                'format' => 'base64', 'content' => base64_encode(file_get_contents($this->file)),
            ]);
        } else {
            $this->error('获取文件内容失败！');
        }
    }

}
