<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "question".
 *
 * @property int $QuestionId ID号
 * @property int $SurveyInfoId 问卷ID
 * @property int $QuestionType 问题类型，0单选，1多选,2问答
 * @property string $QuestionTopic 问题主题
 * @property int $QuestionNo 问题编号，数字，用来排序
 * @property int $isRequired 是否必填：1是，0否 
 * @property string $Direction 备注
 * @property int $AddDate 建立时间
 */
class Question extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SurveyInfoId', 'QuestionType', 'QuestionTopic', 'QuestionNo', 'isRequired', 'Direction', 'AddDate'], 'required'],
            [['SurveyInfoId', 'QuestionType', 'QuestionNo', 'isRequired', 'AddDate'], 'integer'],
            [['QuestionTopic'], 'string', 'max' => 200],
            [['Direction'], 'string', 'max' => 100],
        ];
    }

   public function getOptions(){
        return $this->hasMany(Options::className(),['QuestionId'=>'QuestionId']);
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'QuestionId' => '问题ID',
            'SurveyInfoId' => '问卷ID',
            'QuestionType' => '问题类型',
            'QuestionTopic' => '问题主题',
            'QuestionNo' => '问题编号',
            'isRequired' => '是否必填',
            'Direction' => '备注',
            'AddDate' => '建立时间',
        ];
    }
}
