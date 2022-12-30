<?php

use kaile\unitegallery\assets\GalleryAsset;
use kaile\unitegallery\Gallery;
use yii\web\View;

    /** 
     * @var View $this
     * @var Gallery $widget
     */
    
    if ( ! $widget->withoutAssets ) {
        GalleryAsset::register($this);
    }
?>

<?php
$items = array_map(function($item) use ($widget) {

    $description = $item->hasAttribute($widget->descriptionAttribute) ? $item->{$widget->descriptionAttribute} : '';
    $author = $item->hasAttribute($widget->copyrightAuthorField) ? $item->{$widget->copyrightAuthorField} : '';
    $source = $item->hasAttribute($widget->copyrightSourceField) ? $item->{$widget->copyrightSourceField} : '';
    $copyrightDescription = $description ? trim($description, ' .') . '. ' : ''
        . ($author ? Yii::t('bg', 'Автор: {author}', ['author' => $author]) : '')
        .( $author ? '.' : '') . ($source ? Yii::t('bg', '. Источник: {source}', ['source' => $source]) : '');

    return (object) [
        'title' => $item->hasAttribute($widget->titleAttribute) ? $item->{$widget->titleAttribute} : '',
        'link' => $item->hasAttribute($widget->linkAttribute) ? $item->{$widget->linkAttribute} : '',
        'videoType' => $item->hasAttribute($widget->videoTypeAttribute) ? $item->{$widget->videoTypeAttribute} : '',
        'cover' => $item->hasAttribute($widget->coverAttribute) ? $item->{$widget->coverAttribute} : '',
        'description' => $description,
        'author' => $author,
        'source' => $source,
        'copyrightDescription' => $copyrightDescription,
    ];
}, $models);

$viewParams = [
    'items' => $items,
    'textpanelDescFontSize' => $widget->textpanelDescFontSize,
];

switch ($widget->type) {
    case Gallery::TYPE_PHOTO:
        echo $this->render($widget->photoView, $viewParams);
        break;
    case Gallery::TYPE_VIDEO:
        echo $this->render($widget->videoView, $viewParams);
        break;
    case Gallery::TYPE_AUDIO:
        echo $this->render($widget->audioView, $viewParams);
        break;
    default:
        throw new RuntimeException(Yii::t('bg', "Указан несуществующий тип галереи: '$galleryType'"));
}
