<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\tipo_activo_material;

/**
 * tipo_activo_materialSearch represents the model behind the search form about `app\models\tipo_activo_material`.
 */
class tipo_activo_materialSearch extends tipo_activo_material
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipo_activo_material', 'id_tipo_activo', 'id_material'], 'integer'],
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
        $query = tipo_activo_material::find();

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
            'id_tipo_activo_material' => $this->id_tipo_activo_material,
            'id_tipo_activo' => $this->id_tipo_activo,
            'id_material' => $this->id_material,
        ]);

        return $dataProvider;
    }
}
