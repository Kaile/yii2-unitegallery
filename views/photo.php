<?php

use yii\base\Widget;
use yii\web\View;

/* @var $this View */
/* @var $items array */

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
$this->registerJs("$('#{$blockId}').unitegallery({slider_scale_mode: 'fit', slider_zoom_mousewheel: false});", View::POS_END);
