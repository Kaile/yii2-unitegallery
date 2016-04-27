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
            alt="<?= $item->title ?>"
            src="https://bunkr-private-prod.s3.amazonaws.com/b/f/4/bf46f0e2-2c04-4446-8c06-4f56a4722db2_orig.png"
            data-image="https://bunkr-private-prod.s3.amazonaws.com/b/f/4/bf46f0e2-2c04-4446-8c06-4f56a4722db2_orig.png"
            data-type="html5video"
            data-videomp4="<?= $item->link ?>"
            data-description="<?= $item->description ?>"
        />
    <?php endforeach ?>
</div>
<?php $this->registerJs("$('#{$blockId}').unitegallery();", View::POS_END);