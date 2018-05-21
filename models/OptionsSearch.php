<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Options;

/**
 * OptionsSearch represents the model behind the search form of `app\models\Options`.
 */
class OptionsSearch extends Options
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['OptionId', 'QuestionId', 'OptionNo', 'OptionScore', 'IsOther', 'AddDate'], 'integer'],
            [['OptionContent', 'Remark'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params,$id)
    {
        $query = Options::find()->where(['QuestionId'=>$id]);

        // add conditions that should always apply here

        ;
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'OptionId' => $this->OptionId,
            'QuestionId' => $this->QuestionId,
            'OptionNo' => $this->OptionNo,
            'OptionScore' => $this->OptionScore,
            'IsOther' => $this->IsOther,
            'AddDate' => $this->AddDate,
        ]);

        $query->andFilterWhere(['like', 'OptionContent', $this->OptionContent])
            ->andFilterWhere(['like', 'Remark', $this->Remark]);

        return $dataProvider;
    }
}
