<?php

namespace app\models\record;

use Yii;

/**
 * This is the model class for table "record_content".
 *
 * @property integer $id
 * @property integer $record_id
 * @property string $language
 * @property string $title
 * @property string $content
 *
 * @property Record $record
 */
class RecordContent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'record_content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['record_id', 'language', 'title', 'content'], 'required'],
            [['record_id'], 'integer'],
            [['content'], 'string'],
            [['language'], 'string', 'max' => 20],
            [['title'], 'string', 'max' => 255],
            [['record_id'], 'exist', 'skipOnError' => true, 'targetClass' => Record::className(), 'targetAttribute' => ['record_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'record_id' => 'Record ID',
            'language' => 'Language',
            'title' => 'Title',
            'content' => 'Content',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecord()
    {
        return $this->hasOne(Record::className(), ['id' => 'record_id']);
    }
}
