<?php

/**
 * @link http://www.matacms.com/
 * @copyright Copyright (c) 2015 Qi Interactive Limited
 * @license http://www.matacms.com/license/
 */

namespace matacms\theme\simple\assets;

use yii\web\AssetBundle;

class HostAsset extends AssetBundle {
   
    public $sourcePath = '@vendor/matacms/matacms-simple-theme/web';

    public $css = [
        'css/layout/navigation.css'
    ];
    
    public $js = [
        'js/layout/main.js',
        'js/layout/header.js',
        'js/layout/ajaxLoader.js',
        'js/layout/navigator.js'
    ];

    public $depends = [
        'matacms\theme\simple\assets\ThemeAsset'
    ];

}
