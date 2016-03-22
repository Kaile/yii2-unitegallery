<?php
    use yii\web\View;
    use kaile\unitegallery\Gallery;

    /* @var $this View */
?>

<?php
$items = array_map(function($item) use ($widget) {
    return (object) [
        'title' => $item->hasAttribute($widget->titleAttribute) ? $item->{$widget->titleAttribute} : '',
        'link' => $item->hasAttribute($widget->linkAttribute) ? $item->{$widget->linkAttribute} : '',
        'description' => $item->hasAttribute($widget->descriptionAttribute) ? $item->{$widget->descriptionAttribute} : '',
    ];
}, $models);

switch ($widget->type) {
    case Gallery::TYPE_PHOTO:
        echo $this->render($widget->photoView, ['items' => $items]);
        break;
    case Gallery::TYPE_VIDEO:
        echo $this->render($widget->videoView, ['items' => $items]);
        break;
    case Gallery::TYPE_AUDIO:
        echo $this->render($widget->audioView, ['items' => $items]);
        break;
    default:
        throw new \RuntimeException(Yii::t('bg', "”казан несуществующий тип галереи: '$galleryType'"));
}
