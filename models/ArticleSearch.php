<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Article;

/**
 * ArticleSearch represents the model behind the search form of `app\models\Article`.
 */

class ArticleSearch extends Article
{
    public $text;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['text', 'string'],
        ];
    }

    /**
     * {@inheritdoc}
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
    public function search($params)
    {
        $query = Article::find()->orderBy('created_at DESC');

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

        $query->filterWhere(['like', 'title', $this->text])
            ->orFilterWhere(['like', 'body', $this->text]);

        return $dataProvider;
    }

    // public function reset($params)
    // {
    //     $query = Article::find()->orderBy('created_at DESC');
    //     $dataProvider = new ActiveDataProvider([
    //         'query' => $query,
    //     ]);
    //     echo 'ok';
    //     $this->load($params);
    //     return $dataProvider;

    // }
}
