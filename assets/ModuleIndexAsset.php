<?php

/**
 * @link http://www.matacms.com/
 * @copyright Copyright (c) 2015 Qi Interactive Limited
 * @license http://www.matacms.com/license/
 */

namespace matacms\theme\simple\assets;

use yii\web\AssetBundle;

class ModuleIndexAsset extends AssetBundle
{

    public $sourcePath = '@vendor/matacms/matacms-simple-theme/web';

    public $css = [
    ];
    public $js = [
	    'js/module/moduleIndex.js',
    ];

    public $depends = [
    	'matacms\theme\simple\assets\RearrangeAsset',
    ];

}
