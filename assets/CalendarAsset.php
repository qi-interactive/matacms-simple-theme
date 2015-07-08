<?php

/**
 * @link http://www.matacms.com/
 * @copyright Copyright (c) 2015 Qi Interactive Limited
 * @license http://www.matacms.com/license/
 */

namespace matacms\theme\simple\assets;

use yii\web\AssetBundle;


class CalendarAsset extends AssetBundle
{
    
    public $sourcePath = '@vendor/matacms/matacms-simple-theme/web';

    public $css = [
    'css/calendar/calendar.css',
    'css/calendar/calendar-module.css',
    ];

    public $js = [
    'js/calendar/calendar.js'
    ];


    public $depends = [
    'matacms\theme\simple\assets\ThemeAsset',
    ];

}
