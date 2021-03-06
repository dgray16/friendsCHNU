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
            ['label' => \Yii::t('common', 'News'), 'url' => ['#']],
            ['label' => \Yii::t('common', 'Events'), 'url' => ['#']],
            ['label' => \Yii::t('common', 'Graduates'), 'url' => ['/graduates']],
            ['label' => \Yii::t('common', 'Adwords'), 'url' => ['#']],
            ['label' => \Yii::t('common', 'Search'), 'url' => ['/search']],
        ];
    }
}