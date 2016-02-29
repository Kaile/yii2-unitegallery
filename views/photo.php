<?php

use yii\web\View;

/* @var $this View */
/* @var $items array */
?>

<div id="links" class="bg-photo-items row">
        <?php foreach ($items as $item): ?>
            <a href="<?= $item->link ?>" title="<?= $item->title ?>" data-galery>
                <img src="<?= $item->link ?>" alt="<?= $item->title ?>" class="col-xs-2" />
            </a>
        <?php endforeach ?>
</div>
