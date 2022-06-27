<?php

namespace kaile\unitegallery\assets;

use yii\web\AssetBundle;

class GalleryAsset extends AssetBundle
{
    public $sourcePath = '@vendor/kaile/yii2-unitegallery';

    public $css = [
        'css/unite-gallery.min.css',
        'themes/default/ug-theme-default.css',
        'css/gallery.css',
    ];

    public $js = [
        'js/unitegallery.js',
        'themes/default/ug-theme-default.min.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
