<?php

/**
 * @link http://www.matacms.com/
 * @copyright Copyright (c) 2015 Qi Interactive Limited
 * @license http://www.matacms.com/license/
 */

namespace matacms\theme\simple\assets;

use yii\web\AssetBundle;

class HistoryAsset extends AssetBundle
{

    public $sourcePath = '@vendor/matacms/matacms-simple-theme/web';

    public $css = [
    'css/history/history.css',
    ];

    public $js = [
    'js/lib/timeago/timeago.js',
    'js/history/history.js'
    ];

    public $depends = [
    'matacms\theme\simple\assets\ThemeAsset',
    ];

}
