<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RolUsuario;

/**
 * RolUsuarioSearch represents the model behind the search form about `app\models\RolUsuario`.
 */
class RolUsuarioSearch extends RolUsuario
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_rol'], 'integer'],
            [['nombre_rol'], 'safe'],
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
        $query = RolUsuario::find();

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
            'id_rol' => $this->id_rol,
        ]);

        $query->andFilterWhere(['like', 'nombre_rol', $this->nombre_rol]);

        return $dataProvider;
    }
}
