<?php

namespace kaile\unitegallery\assets;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class GalleryAsset extends AssetBundle
{
    public $sourcePath = '@vendor/kaile/yii2-unitegallery/css';

    public $css = [
        'gallery.css',
    ];

    public $depends = [
        JqueryAsset::class,
        UnitegalleryAsset::class,
    ];
}
