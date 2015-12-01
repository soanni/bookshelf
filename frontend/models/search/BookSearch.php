<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Book;

/**
 * BooksSearch represents the model behind the search form about `frontend\models\Books`.
 */
class BookSearch extends Book
{
    public $date_begin;
    public $date_end;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'date_create', 'date_update', 'preview', 'date', 'author_id', 'date_begin','date_end'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(),
            [
                'date_begin' => 'Publish date (begin)',
                'date_end' => 'Publish date (end)'
            ]
        );
    }

    public function beforeValidate(){
        if($this->date_begin != null){
            $new_date_begin = date('Y-m-d',strtotime($this->date_begin));
            $this->date_begin = $new_date_begin;
        }
        if($this->date_end != null){
            $new_date_end = date('Y-m-d',strtotime($this->date_end));
            $this->date_end = $new_date_end;
        }
        return parent::beforeValidate();
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
    public function search($params)
    {
        $query = Book::find();
        $query->joinWith(['author']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
            'sort' => [
                'defaultOrder' => [
                    'date_create' => SORT_DESC,
                    'title' => SORT_ASC,
                ]
            ],
        ]);

        $dataProvider->setSort(
            [
                'attributes' => [
                    'id',
                    'name' => [
                        'asc' => ['name' => SORT_ASC],
                        'desc' => ['name' => SORT_DESC],
                        'label' => "Book's Title"
                    ],
                    'authorName' => [
                        'asc' => ['authors.id' => SORT_ASC],
                        'desc' => ['authors.id' => SORT_DESC],
                        'label' => 'Author'
                    ],
                    'date' => [
                        'asc' => ['date' => SORT_ASC],
                        'desc' => ['date' => SORT_DESC],
                        'label' => 'Date published'
                    ],
                    'date_create' => [
                        'asc' => ['date_create' => SORT_ASC],
                        'desc' => ['date_create' => SORT_DESC],
                        'label' => 'Date create'
                    ],
                ]
            ]
        );

        if(!($this->load($params) && $this->validate())){
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'date_create' => $this->date_create,
            'date_update' => $this->date_update,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'author_id', $this->author_id])
            ->andFilterWhere(['>', 'date', $this->date_begin])
            ->andFilterWhere(['<', 'date', $this->date_end]);

        return $dataProvider;
    }

}
