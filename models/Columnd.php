<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "columnd".
 *
 * @property int $ColumnId ID号
 * @property int $ColumnNo 栏目编号
 * @property string $ColumnName 栏目名称
 * @property string $Remark 备注
 * @property string $AddDate 日期
 */
class Columnd extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'columnd';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ColumnNo', 'ColumnName', 'AddDate'], 'required'],
            [['ColumnNo'], 'integer'],
            [['AddDate'], 'safe'],
            [['ColumnName'], 'string', 'max' => 50],
            [['Remark'], 'string', 'max' => 200],
            [['ColumnNo'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ColumnId' => 'Column ID',
            'ColumnNo' => '栏目编号',
            'ColumnName' => '栏目名称',
            'Remark' => '备注',
            'AddDate' => '日期',
        ];
    }
}
