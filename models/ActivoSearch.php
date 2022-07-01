<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Activo;

/**
 * ActivoSearch represents the model behind the search form about `app\models\Activo`.
 */
class ActivoSearch extends Activo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_activo', 'id_area'], 'integer'],
            [['fecha_adquisicion', 'estado'], 'safe'],
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
        $query = Activo::find();

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
            'id_activo' => $this->id_activo,
            'fecha_adquisicion' => $this->fecha_adquisicion,
            'id_area' => $this->id_area,
        ]);

        $query->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}
