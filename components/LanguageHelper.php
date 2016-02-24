<?php
/**
 * Created by PhpStorm.
 * User: serhiy
 * Date: 24.02.16
 * Time: 21:20
 */

namespace app\components;


use pjhl\multilanguage\helpers\Languages;

class LanguageHelper
{
    private static $language;

    public static function getLanguage() {
        if (!self::$language) {
            self::$language = Languages::all()->getConfigCurrent()['url'];
        }

        return self::$language;
    }
}