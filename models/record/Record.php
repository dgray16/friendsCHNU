<?php

namespace app\models\record;

use omgdef\multilingual\MultilingualBehavior;
use omgdef\multilingual\MultilingualQuery;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "record".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Category $category
 * @property RecordContent[] $recordContents
 */
class Record extends \yii\db\ActiveRecord
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
                'langForeignKey' => 'record_id',
                'tableName' => '{{%record_content}}',
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
        return 'record';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'created_at', 'updated_at'], 'integer'],
            ['slug', 'string', 'max' => 250],
            ['slug','required'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecordContents()
    {
        return $this->hasMany(RecordContent::className(), ['record_id' => 'id']);
    }
}
