<?php

use kaile\unitegallery\Gallery;
use yii\base\Widget;
use yii\web\View;

/* @var $this View */
/* @var $items array */
/* @var $textpanelDescFontSize int */

$blockId = 'links-' . Widget::$autoIdPrefix . ++Widget::$counter;
?>

<div id="<?= $blockId ?>" class="bg-photo-items center-block links">
        <?php foreach ($items as $item): ?>
            <img
                alt="<?= $item->title ?>"
                data-type="<?= $item->videoType ?>"
                data-description="<?= $item->description ?>"
                <?= $item->videoType !== Gallery::VIDEO_TYPE_HTML5 ? 'data-videoid="' . Gallery::getVideoId($item->link, $item->videoType) . '"' : '' ?>
                <?= $item->videoType === Gallery::VIDEO_TYPE_HTML5 ? "data-image=\"{$item->cover}\"" : '' ?>
                <?= $item->videoType === Gallery::VIDEO_TYPE_VIMEO ? "data-thumb=\"{$item->cover}\"" : '' ?>
            />
        <?php endforeach ?>
</div>
<?php $this->registerJs("$('#{$blockId}').unitegallery({textpanel_desc_font_size: $textpanelDescFontSize});", View::POS_END);