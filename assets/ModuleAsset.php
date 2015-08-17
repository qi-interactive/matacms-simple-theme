<?php

/**
 * @link http://www.matacms.com/
 * @copyright Copyright (c) 2015 Qi Interactive Limited
 * @license http://www.matacms.com/license/
 */

namespace matacms\theme\simple\assets;

use yii\web\AssetBundle;

class ModuleAsset extends AssetBundle {

    public $sourcePath = '@vendor/matacms/matacms-simple-theme/web';

    public $css = [
    'css/module/module.css'
    ];
    public $js = [
    'js/module/module.js',
    'js/layout/forms.js',
    'js/module/carousel.js',
    ];

    public $depends = [
    'matacms\theme\simple\assets\ThemeAsset',
    ];

}
