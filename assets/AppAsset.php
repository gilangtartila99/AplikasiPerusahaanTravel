<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700',
        'css/bootstrap.min.css',
        'css/animate.min.css',
        'css/font-awesome.min.css',
        'css/lightbox.css',
        'css/main.css',
        'css/presets/preset1.css',
        'css/responsive.css',
    ];
    public $js = [
        'js/bootstrap.min.js',
        'http://maps.google.com/maps/api/js?sensor=true',
        'js/jquery.inview.min.js',
        'js/wow.min.js',
        'js/mousescroll.js',
        'js/smoothscroll.js',
        'js/jquery.countTo.js',
        'js/lightbox.min.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
