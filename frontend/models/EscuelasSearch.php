<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Escuelas;

/**
 * EscuelasSearch represents the model behind the search form about `app\models\Escuelas`.
 */
class EscuelasSearch extends Escuelas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idInstitucion', 'idEscuela'], 'integer'],
            [['nombreEscuela'], 'safe'],
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
        $query = Escuelas::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith('idInstitucion0');
        
        $query->andFilterWhere([
           // 'idInstitucion' => $this->idInstitucion,
            'idEscuela' => $this->idEscuela,
        ]);

        $query->andFilterWhere(['like', 'nombreEscuela', $this->nombreEscuela])
        	  ->andFilterWhere(['like', 'Instituciones.nombreInstitucion', $this->idInstitucion]);

        return $dataProvider;
    }
}
