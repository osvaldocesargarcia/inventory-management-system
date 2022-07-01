<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\tipo_activo;

/**
 * tipo_activoSearch represents the model behind the search form about `app\models\tipo_activo`.
 */
class tipo_activoSearch extends tipo_activo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipo_activo', 'id_activo'], 'integer'],
            [['nombre_activo'], 'safe'],
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
        $query = tipo_activo::find();

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
            'id_tipo_activo' => $this->id_tipo_activo,
            'id_activo' => $this->id_activo,
        ]);

        $query->andFilterWhere(['like', 'nombre_activo', $this->nombre_activo]);

        return $dataProvider;
    }
}
