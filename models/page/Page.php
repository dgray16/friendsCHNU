<?php

namespace app\models\page;

use omgdef\multilingual\MultilingualBehavior;
use omgdef\multilingual\MultilingualQuery;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "page".
 *
 * @property integer $id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property PageContent[] $pageContents
 */
class Page extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
          'm1' => [
              'class' => MultilingualBehavior::className(),
              'languages' => [
                  'uk' => 'Ukraine',
                  'en-US' => 'English'
              ],
              'defaultLanguage' => 'uk',
              'langForeignKey' => 'page_id',
              'tableName' => '{{%page_content}}',
              'attributes' => [
                  'title', 'content'
              ]
          ], TimestampBehavior::className()
        ];
    }

    public static function find()
    {
        return new MultilingualQuery(self::className());
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPageContents()
    {
        return $this->hasMany(PageContent::className(), ['page_id' => 'id']);
    }
}
