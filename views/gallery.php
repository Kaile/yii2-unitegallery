<?php
    use yii\web\View;
    use kaile\BootstrapGallery\Gallery;

    /* @var $this View */
?>

<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        <?= Yii::t('bg', 'Предыдущий') ?>
                    </button>
                    <button type="button" class="btn btn-primary next">
                        <?= Yii::t('bg', 'Следующий') ?>
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$items = array_map(function($model) use ($widget) {
    return [
        'title' => $model->hasAttribute($widget->titleAttribute) ? $model->{$widget->titleAttribute} : '',
        'link' => $model->hasAttribute($widget->linkAttribute) ? $model->{$widget->linkAttribute} : '',
        'description' => $model->hasAttribute($widget->descriptionAttribute) ? $model->{$widget->descriptionAttribute} : '',
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
        throw new \RuntimeException(Yii::t('bg', "Указан несуществующий тип галереи: '$galleryType'"));
        break;
}
