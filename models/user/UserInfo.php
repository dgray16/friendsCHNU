<?php

namespace app\models\user;

use Yii;

/**
 * This is the model class for table "user_info".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $sur_name
 * @property string $birth_day
 * @property string $telephone
 * @property integer $entry_year
 * @property integer $graduation_year
 * @property string $description
 *
 * @property User $user
 */
class UserInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'first_name', 'last_name', 'sur_name', 'birth_day', 'telephone', 'entry_year', 'graduation_year'], 'required'],
            [['user_id', 'entry_year', 'graduation_year'], 'integer'],
            [['birth_day'], 'safe'],
            [['description'], 'string'],
            [['first_name', 'last_name', 'sur_name', 'telephone'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('profile', 'ID'),
            'user_id' => Yii::t('profile', 'User ID'),
            'first_name' => Yii::t('profile', 'First Name'),
            'last_name' => Yii::t('profile', 'Last Name'),
            'sur_name' => Yii::t('profile', 'Sur Name'),
            'birth_day' => Yii::t('profile', 'Birth Day'),
            'telephone' => Yii::t('profile', 'Telephone'),
            'entry_year' => Yii::t('profile', 'Entry Year'),
            'graduation_year' => Yii::t('profile', 'Graduation Year'),
            'description' => Yii::t('profile', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
