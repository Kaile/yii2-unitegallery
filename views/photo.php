<?php

use yii\web\View;
use kaile\BootstrapGallery\assets\GalleryAsset;
use yii\base\Widget;

/* @var $this View */
/* @var $items array */
GalleryAsset::register($this);

$blockId = 'links-' . Widget::$autoIdPrefix . ++Widget::$counter;
?>

<div id="<?= $blockId ?>" class="bg-photo-items center-block links">
        <?php foreach ($items as $item): ?>
            <img 
                src="<?= $item->link ?>" 
                alt="<?= $item->title ?>" 
                data-type="image"
                data-image="<?= $item->link ?>"
                data-description="<?= $item->description ?>"
            />
        <?php endforeach ?>
</div>

<?php
$this->registerJs("$('#{$blockId}').unitegallery({slider_scale_mode: 'fit'});", View::POS_END);
