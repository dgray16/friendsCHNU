<?php
/**
 * Created by PhpStorm.
 * User: serhiy
 * Date: 29.02.16
 * Time: 22:56
 */

namespace app\modules\search\models;


use app\models\user\User;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class SearchForm extends Model
{
    public $name;
    public $birth_day;

    public function search() {
        $query = User::find()->joinWith('info');

        if ($this->birth_day) {
            $query->where(['user_info.birth_day' => $this->birth_day]);
        }

        return new ActiveDataProvider([
            'query' => $query
        ]);
    }
}