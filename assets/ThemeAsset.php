<?php 

namespace matacms\theme\simple\assets;

use yii\web\AssetBundle;

class ThemeAsset extends AssetBundle {
   
    public $sourcePath = '@vendor/matacms/matacms-simple-theme/web';

    public $css = [
        'css/theme.css',
    ];
    public $js = [
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}