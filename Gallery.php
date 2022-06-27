<?php

namespace kaile\unitegallery;

use Yii;
use yii\base\Widget;
use yii\db\ActiveQuery;
use RuntimeException;

/**
 * Description of Gallery
 *
 * @created 26.02.2016 14:06:15
 * @author Mihail Kornilov <fix-06 at yandex.ru>
 *
 * @since 1.0
 */
class Gallery extends Widget
{
    /**
     * Constants that indicate what is the gallery is it
     */
    const TYPE_PHOTO = 'photo'; // Default gallery type if it is not set
    const TYPE_VIDEO = 'video';
    const TYPE_AUDIO = 'audio';

    /**
     * Constants for slides types
     */
    const VIDEO_TYPE_YOUTUBE = 'youtube';
    const VIDEO_TYPE_VIMEO = 'vimeo';
    const VIDEO_TYPE_HTML5 = 'html5video';
    const VIDEO_TYPE_WISTIA = 'wistia';

    /**
     * Indicates that galery controls are present
     *
     * @var boolean
     */
    public static $enabled = false;

    /**
     * Type of gallery widget
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
     * Model attribute that contains data for titles of gallery items
     *
     * @var ActiveQuery
     */
    public $titleAttribute = 'title';

    /**
     * Model attribute that contains data for links of gallery items
     *
     * @var string
     */
    public $linkAttribute = 'link';

    /**
     * Model attribute that contains data for descriptions of gallery items
     * 
     * @var string
     */
    public $descriptionAttribute = 'description';

    /**
     * Type attribute of slides
     *
     * @var string
     */
    public $videoTypeAttribute = 'type';

    /**
     * Cover attribute for img preview (for video e.g.)
     *
     * @var string
     */
    public $coverAttribute = 'cover';

    /**
     * Full path for main view directory. Default sets to __DIR__ . '/views'.
     *
     * @var string
     */
    public $mainViewPath = '';

    /**
     * Main view name of gallery
     *
     * @var string
     */
    public $mainView = 'gallery';

    /**
     * Full path for views directory where gallery items views are contains. Same as
     * [[$photoView]], [[$videoView]], [[$audioView]]. Default sets to __DIR__ . '/views'.
     *
     * @var string
     */
    public $itemsViewPath = '';

    /**
     * View name of photo gallery items
     *
     * @var string
     */
    public $photoView = 'photo';

    /**
     * View name of video gallery items
     *
     * @var string
     */
    public $videoView = 'video';

    /**
     * View name of audio gallery items
     *
     * @var string
     */
    public $audioView = 'audio';
    
    /**
     * Do not register asset bundle
     * 
     * @var bool
     */
    public $withoutAssets = false;
    
    /**
     * Font size for description in textpanel of photo gallery
     * 
     * @var int
     */
    public $textpanelDescFontSize = 12;

    /**
     * @inheritdoc
     */
    public function init()
    {
        if ( ! $this->query instanceof ActiveQuery ) {
            throw new RuntimeException(Yii::t('bg', 'Неверно задан параметр [[query]] он должен быть объектом класса [[ActiveQuery]] или его потомка.'));
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
        $this->registerTranslations();
    }

    /**
     * Register config that sets translation settings for extension in application
     */
    public function registerTranslations()
    {
        Yii::$app->i18n->translations['bg*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'ru-RU',
            'basePath' => '@app/vendor/kaile/yii2-bootstrap-gallery/messages',
            'fileMap' => [
                'vendor/kaile/yii2-bootstrap-gallery/bg' => 'bg.php',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $models = $this->query->all();

        echo $this->render($this->mainView, [
            'models' => $models,
            'widget' => $this,
            'textpanelDescFontSize' => $this->textpanelDescFontSize,
        ]);
    }

    public static function getVideoId($link, $videoType)
    {
        $result = null;

        switch ($videoType) {
            case static::VIDEO_TYPE_VIMEO:
                $result = static::getVimeoId($link);
                break;
            case static::VIDEO_TYPE_WISTIA:
                $result = static::getWistiaId($link);
                break;
            case static::VIDEO_TYPE_YOUTUBE:
                $result = static::getYoutubeId($link);
        }

        return $result;
    }

    /**
     * Get vimeo video identifier if exists.
     * 
     * @return string|boolean if is vimeo video link then return it identifier,
     * else return false
     */
    public static function getVimeoId($link)
    {
        throw new RuntimeException('Vimeo video link generation is not implemented');
    }

    /**
     * Get wistia video identifier if exists.
     * 
     * @return string|boolean if is wistia video link then return it identifier,
     * else return false
     */
    public static function getWistiaId($link)
    {
        throw new RuntimeException('Wistia video link generation is not implemented');
    }
    
    /**
     * Get youtube video identifier if exists.
     * 
     * @return string|boolean if is youtube video link then return it identifier,
     * else return false
     */
    public static function getYoutubeId($link)
    {
        $matches = [];
        if (preg_match('/(youtube\.com\/watch\?v=(.*))|(youtu\.be\/(.*))/', $link, $matches)) {
            return empty($matches[1]) ? $matches[4] : $matches[2];
        } else {
            return false;
        }
    }
}
