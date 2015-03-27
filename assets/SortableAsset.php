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
class SortableAsset extends AssetBundle
{
    public $sourcePath = '@vendor/matacms/matacms-simple-theme/web';

    public $css = [
    ];
    public $js = [
    'js/lib/jquery-ui-1.8.19.custom.min.js',
    'js/rearrange/sortable.js',
    ];

    public $depends = [
    'matacms\theme\simple\assets\ThemeAsset',
    ];
}