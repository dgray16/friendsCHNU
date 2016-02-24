<?php

namespace app\modules\admin;


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
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }


    public $controllerPath = 'app/modules/admin/controllers';

    public function init()
    {
        $this->layout = 'index';
        \Yii::$app->user->loginUrl = '/admin/default/login';
        parent::init();
    }
}