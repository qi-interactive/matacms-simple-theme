<?php

/**
 * @link http://www.matacms.com/
 * @copyright Copyright (c) 2015 Qi Interactive Limited
 * @license http://www.matacms.com/license/
 */

namespace matacms\theme\simple\assets;

use yii\web\AssetBundle;

class ThemeAsset extends AssetBundle {

    public $sourcePath = '@vendor/matacms/matacms-simple-theme/web';

    public $css = [
        'css/form/form.css',
        'css/grid/grid.css',
        'css/modal/modal.css',
        'css/theme.css',
        'css/carousel/carousel-and-snippet.css',
        'css/overlay/overlay.css',
        'css/datepicker/datepicker.css'
    ];
    public $js = [
        'js/lib/modernizr/modernizr.js',
        'js/layout/theme.js',
        'js/layout/main.js',
        'js/rearrange/draggabilly.pkgd.min.js',
        'js/rearrange/dragdrop.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset'
    ];

}
