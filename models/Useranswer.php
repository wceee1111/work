<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "useranswer".
 *
 * @property int $UAid ID号
 * @property int $Uid 问卷用户ID
 * @property int $QuestionId 问题ID
 * @property int $OptionId 选项ID
 * @property string $CheckboxId 多选题ID
 * @property string $OptionContent 选项内容(多选题或建 议)
 * @property string $OtherContent 其他选项的内容
 * @property int $AddDate 插入日期
 */
class Useranswer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */



    /*public function afterFind() {
        $this->CheckboxId = explode(',',$this->CheckboxId);
        parent::afterFind();
    }*/

    public static function tableName()
    {
        return 'useranswer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Uid', 'QuestionId', 'AddDate'], 'required'],
            [['Uid', 'QuestionId', 'OptionId', 'AddDate'], 'integer'],
            [['OptionId', 'CheckboxId',], 'required','message'=>'请选择一个选项'],
            [['CheckboxId'], 'default', 'value' => null],
            [['OptionContent'], 'string', 'max' => 250],
            [['OtherContent'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'UAid' => 'Uaid',
            'Uid' => 'Uid',
            'QuestionId' => 'Question ID',
            'OptionId' => 'Option ID',
            'CheckboxId' => 'Checkbox ID',
            'OptionContent' => 'Option Content',
            'OtherContent' => 'Other Content',
            'AddDate' => 'Add Date',
        ];
    }
}
