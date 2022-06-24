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
    return (object) [
        'title' => $item->hasAttribute($widget->titleAttribute) ? $item->{$widget->titleAttribute} : '',
        'link' => $item->hasAttribute($widget->linkAttribute) ? $item->{$widget->linkAttribute} : '',
        'description' => $item->hasAttribute($widget->descriptionAttribute) ? $item->{$widget->descriptionAttribute} : '',
        'videoType' => $item->hasAttribute($widget->videoTypeAttribute) ? $item->{$widget->videoTypeAttribute} : '',
        'cover' => $item->hasAttribute($widget->coverAttribute) ? $item->{$widget->coverAttribute} : '',
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
