<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Envios]].
 *
 * @see Envios
 */
class EnviosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Envios[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Envios|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
