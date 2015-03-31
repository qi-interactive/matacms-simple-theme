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
class CalendarAsset extends AssetBundle
{
    public $sourcePath = '@vendor/matacms/matacms-simple-theme/web';

    public $css = [
    'css/calendar/calendar.css',
    ];
    public $js = [
    'js/calendar/calendar.js'
    ];

    public $depends = [
    'matacms\theme\simple\assets\ThemeAsset',
    ];
}
