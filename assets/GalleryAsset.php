<?php

namespace kaile\BootstrapGallery\assets;

use yii\web\AssetBundle;

class GalleryAsset extends AssetBundle
{
	public $sourcePath = '@vendor/kaile/yii2-bootstrap-gallery';

	public $css = [
		'//blueimp.github.io/Gallery/css/blueimp-gallery.min.css',
		'css/bootstrap-image-gallery.min.css',
	];

	public $js = [
		'//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js',
		'js/bootstrap-image-gallery.min.js',
	];

	public $depends = [
		'app\assets\AppAsset',
	];
}
