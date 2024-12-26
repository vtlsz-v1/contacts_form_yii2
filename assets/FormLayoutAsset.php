<?php

namespace app\assets;

use yii\web\AssetBundle;

class FormLayoutAsset extends AssetBundle
{

//    public $sourcePath = '@app/components';
// определяем свойства для ресурсов, доступных из web
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [ // указываем местоположение файлов ресурсов
        'css/styles.css',
    ];

    public $js = [
//        'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js',
        'js/scripts.js',
    ];

    public $depends = [ // зависимости  для стилей и скриптов
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapPluginAsset',
    ];

}