<?php

namespace kaile\BootstrapGalery;

use Yii;
use yii\base\Widget;
use yii\db\ActiveQuery;

/**
 * Description of Galery
 *
 * @created 26.02.2016 14:06:15
 * @author Mihail Kornilov <fix-06 at yandex.ru>
 *
 * @since 1.0
 */
class Galery extends Widget
{
    /**
     * Constants that indicate what is the galery is it
     */
    const TYPE_PHOTO = 'photo'; // Default galery type if it is not set
    const TYPE_VIDEO = 'video';
    const TYPE_AUDIO = 'audio';

    /**
     * Type of galery widget
     *
     * @var string
     */
    public $type = '';

    /**
     * Query for data selecting
     *
     * @var ActiveQuery
     */
    public $query = null;

    /**
     * Model attribute that contains data for titles of galery items
     *
     * @var ActiveQuery
     */
    public $titleAttribute = 'title';

    /**
     * Model attribute that contains data for links of galery items
     *
     * @var string
     */
    public $linkAttribute = 'link';

    /**
     * Model attribute that contains data for descriptions of galery items
     * @var string
     */
    public $descriptionAttribute = 'description';

    /**
     * Full path for main view directory. Default sets to __DIR__ . '/views'.
     *
     * @var string
     */
    public $mainViewPath = '';

    /**
     * Main view name of galery
     *
     * @var string
     */
    public $mainView = 'galery';

    /**
     * Full path for views directory where galery items views are contains. Same as
     * [[$photoView]], [[$videoView]], [[$audioView]]. Default sets to __DIR__ . '/views'.
     *
     * @var string
     */
    public $itemsViewPath = '';

    /**
     * View name of photo galery items
     *
     * @var string
     */
    public $photoView = 'photo';

    /**
     * View name of video galery items
     *
     * @var string
     */
    public $videoView = 'video';

    /**
     * View name of audio galery items
     *
     * @var string
     */
    public $audioView = 'audio';

    /**
     * @inheritdoc
     */
    public function init()
    {
        if ( ! $this->query instanceof ActiveQuery ) {
            throw new \RuntimeException(Yii::t('bg', 'Неверно задан параметр [[query]] он должен быть объектом класса [[ActiveQuery]] или его потомка.'));
        }
        if (empty($this->type)) {
            $this->type = self::TYPE_PHOTO;
        }
        if (empty($this->mainViewPath)) {
            $this->mainViewPath = __DIR__ . DIRECTORY_SEPARATOR . 'views';
        }
        if (empty($this->itemsViewPath)) {
            $this->itemsViewPath = __DIR__ . DIRECTORY_SEPARATOR . 'views';
        }
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $models = $this->query->find()->all();

        echo $this->render(__DIR__ . DIRECTORY_SEPARATOR . $this->view, [
            'models' => $models,
            'widget' => $this,
        ]);
    }
}
