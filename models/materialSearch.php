<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\material;

/**
 * materialSearch represents the model behind the search form about `app\models\material`.
 */
class materialSearch extends material
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_material'], 'integer'],
            [['nombre_material'], 'safe'],
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
    public function search($params)
    {
        $query = material::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_material' => $this->id_material,
        ]);

        $query->andFilterWhere(['like', 'nombre_material', $this->nombre_material]);

        return $dataProvider;
    }
}
