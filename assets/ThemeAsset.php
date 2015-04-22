<?php 

namespace matacms\theme\simple\assets;

use yii\web\AssetBundle;

class ThemeAsset extends AssetBundle {

  public $sourcePath = '@vendor/matacms/matacms-simple-theme/web';

  public $css = [
  'css/form/form.css',
  'css/grid/grid.css',
  'css/carousel/carousel-and-snippet.css',
  'css/modal/modal.css',
  'css/theme.css',
  ];
  public $js = [
  'js/lib/modernizr/modernizr.js',
  'js/layout/theme.js',
  'js/layout/main.js'
  ];

  public $depends = [
  'yii\web\YiiAsset',
  'yii\bootstrap\BootstrapAsset',
  ];
}