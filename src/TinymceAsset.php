<?php
namespace Adx\Tinymce;

use yii\web\AssetBundle;

class TinymceAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@vendor/tinymce/tinymce';

    /**
     * @inheritdoc
     */
    public $js = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $min = YII_ENV_DEV ? '' : '.min';
        $this->js[] = "tinymce{$min}.js";
    }
}
