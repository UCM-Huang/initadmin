<?php
// +----------------------------------------------------------------------
// | tpvue [ 模块化渐进式后台 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2018-2019 http://tpvue.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: jry <598821125@qq.com>
// +----------------------------------------------------------------------

// 合并各个模块的路由配置
$module_list = [0 => ['name' => 'core']];
foreach ($module_list as $key => $value) {
    // todo:模块配置会在很多地方用到，这样加载会冗余，可以找一个合适的地方只加载一次，然后存到缓存中。
    $conf = require_once Env::get('app_path') . $value['name'] . '/tpvue/tpvue.php';
    if (is_array($conf['route']['resource'])) {
        foreach ($conf['route']['resource'] as $key2 => $value2) {
            Route::resource($key2, $value2);
        }
    }
}

return [

];
