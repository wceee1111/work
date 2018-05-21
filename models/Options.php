<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "options".
 *
 * @property int $OptionId ID号 
 * @property int $QuestionId 问题ID
 * @property int $OptionNo 选项编号，数字，用来排序
 * @property string $OptionContent 选项内容
 * @property int $OptionScore 选项分值（预留）
 * @property int $IsOther 是否有其他
 * @property string $Remark 备注
 * @property int $AddDate 建立日期
 */
class Options extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'options';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['QuestionId', 'OptionNo', 'OptionContent', 'AddDate'], 'required'],
            [['QuestionId', 'OptionNo', 'OptionScore', 'IsOther', 'AddDate'], 'integer'],
            [['OptionContent', 'Remark'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'OptionId' => 'ID号',
            'QuestionId' => '问题ID',
            'OptionNo' => '选项编号',
            'OptionContent' => '选项内容',
            'OptionScore' => '选项分值',
            'IsOther' => '是否有其他',
            'Remark' => '备注',
            'AddDate' => '建立日期',
        ];
    }
}
