<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Question;

/**
 * QuestionSearch represents the model behind the search form of `app\models\Question`.
 */
class QuestionSearch extends Question
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['QuestionId', 'SurveyInfoId', 'QuestionType', 'QuestionNo', 'isRequired', 'AddDate'], 'integer'],
            [['QuestionTopic', 'Direction'], 'safe'],
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
    public function search($params,$id)//将ID传到排列模块
    {
        $query = Question::find()->where(['SurveyInfoId'=>$id]);//给问卷ID赋值

        // add conditions that should always apply here

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
            'QuestionId' => $this->QuestionId,
            'SurveyInfoId' => $this->SurveyInfoId,
            'QuestionType' => $this->QuestionType,
            'QuestionNo' => $this->QuestionNo,
            'isRequired' => $this->isRequired,
            'AddDate' => $this->AddDate,
        ]);

        $query->andFilterWhere(['like', 'QuestionTopic', $this->QuestionTopic])
            ->andFilterWhere(['like', 'Direction', $this->Direction]);

        return $dataProvider;
    }
}
