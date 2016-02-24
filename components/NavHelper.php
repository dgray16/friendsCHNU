<?php
/**
 * Created by PhpStorm.
 * User: serhiy
 * Date: 24.02.16
 * Time: 21:10
 */

namespace app\components;


class NavHelper
{
    public static function buildMenuItems() {
        return [
            ['label' => \Yii::t('common', 'Home'), 'url' => ['/site/index']],
            ['label' => \Yii::t('common', 'About'), 'url' => ['/page/index', 'slug' => 'about']],
        ];
    }
}