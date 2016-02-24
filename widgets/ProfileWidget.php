<?php
/**
 * Created by PhpStorm.
 * User: serhiy
 * Date: 24.02.16
 * Time: 22:37
 */

namespace app\widgets;


use app\models\user\ClientLoginForm;
use yii\bootstrap\Widget;

class ProfileWidget extends Widget
{
    public function run()
    {
        if (\Yii::$app->user->isGuest) {
            $model = new ClientLoginForm();

            return $this->render('profile/login', [
                'model' => $model
            ]);
        }

        return $this->render('profile/menu');
    }
}