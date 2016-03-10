<?php

use yii\web\View;
use kaile\BootstrapGallery\assets\GalleryAsset;

/* @var $this View */
/* @var $items array */
GalleryAsset::register($this);
?>

<div id="links" class="bg-photo-items row">
        <?php foreach ($items as $item): ?>
            <?php $item = (object) $item ?>
            <a href="<?= $item->link ?>" title="<?= $item->title ?>" data-gallery>
                <img src="<?= $item->link ?>" alt="<?= $item->title ?>" class="col-xs-2" />
            </a>
        <?php endforeach ?>
</div>
