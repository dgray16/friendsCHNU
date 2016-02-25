<?php
/**
 * Created by PhpStorm.
 * User: serhiy
 * Date: 25.02.16
 * Time: 19:35
 */

namespace app\modules\profile;


use yii\filters\AccessControl;

class Module extends \yii\base\Module
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public $controllerPath = 'app/modules/profile/controllers';
}