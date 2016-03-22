<?php

use yii\web\View;
use yii\base\Widget;
use kaile\unitegallery\Gallery;
use kaile\unitegallery\assets\GalleryAsset;

/* @var $this View */
/* @var $items array */
GalleryAsset::register($this);

$blockId = 'links-' . Widget::$autoIdPrefix . ++Widget::$counter;
?>

<div id="<?= $blockId ?>" class="bg-photo-items center-block links">
        <?php foreach ($items as $item): ?>
            <img
                alt="<?= $item->title ?>"
                data-type="youtube"
                data-videoid="<?= Gallery::getYoutubeId($item->link) ?>"
                data-description="<?= $item->description ?>"
            />
        <?php endforeach ?>
</div>
<?php $this->registerJs("$('#{$blockId}').unitegallery();", View::POS_END);