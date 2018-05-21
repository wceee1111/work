<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "surveyinfo".
 *
 * @property int $SurveyInfoId ID号
 * @property int $ColumnId 栏目编号
 * @property string $SurveyName 问卷名称
 * @property string $SurveyDescription 问卷简介
 * @property int $SurveyStarttime 开始时间
 * @property int $SurveyEndtime 结束时间
 * @property string $auther 作者
 */
class Surveyinfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'surveyinfo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ColumnId', 'auther'], 'integer'],
            [['SurveyName', 'SurveyDescription', 'auther'], 'required'],
            [['ColumnId', 'SurveyStarttime', 'SurveyEndtime'], 'default', 'value' => null],
            [['SurveyName'], 'string', 'max' => 20],
            [['SurveyDescription'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SurveyInfoId' => 'Survey Info ID',
            'ColumnId' => '栏目编号',
            'SurveyName' => '问卷名称',
            'SurveyDescription' => '问卷简介',
            'SurveyStarttime' => '开始时间',
            'SurveyEndtime' => '结束时间',
            'auther' => '作者',
        ];
    }
}
