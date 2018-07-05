<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace ichsanmust\widgets;

use yii\web\AssetBundle;

/**
 * This asset bundle provides the javascript files required by [[Pjax]] widget.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class PjaxAsset3 extends AssetBundle
{
    public $sourcePath = '@ichsanmust/widgets/yii2-pjax';
    public $js = [
        'jquery.pjax3.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
