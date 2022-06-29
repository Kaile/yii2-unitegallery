<?php

namespace kaile\unitegallery\assets;

use yii\web\AssetBundle;

class UnitegalleryAsset extends AssetBundle
{
    public $sourcePath = '@bower/unitegallery/dist';

    public $css = [
        'css/unite-gallery.css',
        'themes/default/ug-theme-default.css',
    ];

    public $js = [
        'js/unitegallery.js',
        'themes/default/ug-theme-default.js',
    ];
}
