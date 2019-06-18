<?php
namespace Adx\Tinymce;

use yii\helpers\Html;
use yii\widgets\InputWidget;

/**
 *
 * TinyMCE renders a tinyMCE js plugin for WYSIWYG editing.
 */
class Tinymce extends InputWidget
{
    /**
     * @var string The language to use. Defaults to null (en).
     */
    public $language;
   
    /**
     * @var array The options for the TinyMCE JS plugin.
     * 
     * Please refer to the TinyMCE JS plugin Web page for possible options.
     * @see http://www.tinymce.com/wiki.php/Configuration
     */
    public $clientOptions = [];
    
    /**
     * @inheritdoc
     */
    public function run()
    {
        if ($this->hasModel()) {
            echo Html::activeTextarea($this->model, $this->attribute, $this->options);
        } else {
            echo Html::textarea($this->name, $this->value, $this->options);
        }

        $this->registerClientScript();
    }

    /**
     * Registers tinyMCE js plugin
     */
    protected function registerClientScript()
    {
        $js = [];
        $view = $this->getView();

        TinymceAsset::register($view);

        $id = $this->options['id'];
        $this->clientOptions['selector'] = "#{$id}";

        if (null !== $this->language && 'en' !== $this->language) {
            $langFile = "langs/{$this->language}.js";
            $langAssetBundle = TinymceLangAsset::register($view);
            $langAssetBundle->js[] = $langFile;
            
            $this->clientOptions['language_url'] = "{$langAssetBundle->baseUrl}/{$langFile}";
            $this->clientOptions['language'] = "{$this->language}";
        }

        $options = \json_encode($this->clientOptions);

        $js[] = "tinymce.remove('#{$id}');tinymce.init({$options});";

        $view->registerJs(\implode("\n", $js));
    }
}