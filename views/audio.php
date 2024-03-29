<?php

use yii\base\Widget;
use yii\web\View;

/* @var $this View */
/* @var $items array */
/* @var $textpanelDescFontSize int */

$blockId = 'links-' . Widget::$autoIdPrefix . ++Widget::$counter;
?>

<div id="<?= $blockId ?>" class="bg-photo-items center-block links">
    <?php foreach ($items as $item): ?>
        <?php $description = trim($item->description, ' .')
            . ($item->author ? Yii::t('bg', '. Автор: {author}', ['author' => $item->author]) : '')
            . ($item->source ? Yii::t('bg', '. Источник: {source}', ['source' => $item->source]) : '')
        ?>
        <img
            alt="<?= $item->title ?>"
            src="https://bunkr-private-prod.s3.amazonaws.com/b/f/4/bf46f0e2-2c04-4446-8c06-4f56a4722db2_orig.png"
            data-image="https://bunkr-private-prod.s3.amazonaws.com/b/f/4/bf46f0e2-2c04-4446-8c06-4f56a4722db2_orig.png"
            data-type="html5video"
            data-videomp4="<?= $item->link ?>"
            data-description="<?= $description ?>"
        />
    <?php endforeach ?>
</div>
<?php $this->registerJs("$('#{$blockId}').unitegallery({textpanel_desc_font_size: $textpanelDescFontSize});", View::POS_END);