<?php
namespace Adx\Tinymce;

use yii\web\AssetBundle;

class TinymceAsset extends AssetBundle
{
    public $sourcePath = '@vendor/tinymce/tinymce';

    public $js = [
        'tinymce.min.js'
    ];
}
