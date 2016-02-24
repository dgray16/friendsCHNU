<?php

namespace app\modules\admin;


class Module extends \yii\base\Module
{
    public $controllerPath = 'app/modules/admin/controllers';

    public function init()
    {
        $this->layout = 'index';
        parent::init();
    }
}