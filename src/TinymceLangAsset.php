<?php
namespace Adx\Tinymce;

use yii\web\AssetBundle;

class TinymceLangAsset extends AssetBundle
{
    public $sourcePath = __DIR__ . '/Resources/assets/langs';

    public $depends = [
        TinymceAsset::class,
    ];
}