<?php

/**
 * @link http://www.matacms.com/
 * @copyright Copyright (c) 2015 Qi Interactive Limited
 * @license http://www.matacms.com/license/
 */

namespace matacms\theme\simple\assets;

use yii\web\AssetBundle;

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
