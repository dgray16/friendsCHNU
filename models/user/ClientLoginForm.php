<?php
/**
 * Created by PhpStorm.
 * User: serhiy
 * Date: 24.02.16
 * Time: 22:43
 */

namespace app\models\user;


use Yii;
use yii\base\Model;

class ClientLoginForm extends Model
{
    public $email;
    public $password;
    public $rememberMe = true;
    private $_user;

    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            ['email', 'email'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, Yii::t('common', 'Incorrect email or password.'));
            }
        }
    }

    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }
    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findOne(['email' => $this->email]);
        }
        return $this->_user;
    }

    public function attributeLabels()
    {
        return [
            'password' => Yii::t('common', 'Password'),
            'rememberMe' => Yii::t('common', 'Remember Me')
        ];
    }
}