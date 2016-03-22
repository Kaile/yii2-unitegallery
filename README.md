Bootstrap Gallery
================
Yii2 extension unitegallery for photos, videos and audio traks

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist kaile/yii2-unitegallery "*"
```

or add

```
"kaile/yii2-unitegallery": "^1.0"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \kaile\unitegallery\Gallery::widget([
    'query' => $gallery->getGaleryItems(),             // ActiveQuery for selecting gallery items
    'type' => \kaile\unitegallery\Gallery::TYPE_PHOTO  // Default value if `type` is not set
    'titleAttribute' => 'title',                       // `title` by default
    'linkAttribute' => 'link',                         // `link` by default
    'descriptionAttribute' => 'description',           // `description` by default
]); ?>```