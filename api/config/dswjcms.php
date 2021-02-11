<?php

return [

    /*
    |--------------------------------------------------------------------------
    | DSWJCMS个性化配置
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | Homestead windows
    |--------------------------------------------------------------------------
    |
    |  windows下搭建的Homestead，因软链接无法使用，故进行了特别处理
    |
    */

    'homestead' => env('HOMESTEAD_WINDOWS', false),
    'failuretime'=> env('DSWJCMS_FAILURE_TIME', 60), // 失效时间秒，默认60秒
    'versions'=> env('API_VERSIONS',1),   //当前版本
    'applySecret'=> env('APP_KEY', 'base64:fWsEXaOLffoLqe6sGWzhbNOelLeT6seibcE9+e5q9Ao='), //API密钥串
];
