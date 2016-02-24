<?php
/**
 * Created by PhpStorm.
 * User: serhiy
 * Date: 24.02.16
 * Time: 22:06
 */

namespace app\components;


class TitleHelper
{
    public static function getTitle($title = null) {
        return ($title ? $title . ' ' : null) . \Yii::t('common', '"Association of Alumni and Friends of Chernivtsi University"');
    }
}