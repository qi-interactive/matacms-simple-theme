<?php 

namespace matacms\theme\simple\assets;

use yii\web\AssetBundle;

class ThemeAsset extends AssetBundle {
 
  public $sourcePath = '@vendor/matacms/matacms-simple-theme/web';

  public $css = [
  'css/site.css',
  'css/variables.css'
  ];
  public $js = [
  'js/lib/modernizr/modernizr.js',
  ];

  public $depends = [
  'yii\web\YiiAsset',
  'yii\bootstrap\BootstrapAsset',
  ];
}