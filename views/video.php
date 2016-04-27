<?php

use kaile\unitegallery\Gallery;
use yii\base\Widget;
use yii\web\View;

/* @var $this View */
/* @var $items array */

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