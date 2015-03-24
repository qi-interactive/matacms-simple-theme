<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace matacms\theme\simple\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ModuleAsset extends AssetBundle {
    public $sourcePath = '@vendor/matacms/matacms-simple-theme/web';

    public $css = [
    'css/form.css',
    'css/module.css'
    ];
    public $js = [
    'js/layout/theme.js'
    ];

    public $depends = [
    'matacms\theme\simple\assets\ThemeAsset',
    ];
}