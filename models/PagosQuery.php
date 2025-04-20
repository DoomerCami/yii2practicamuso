<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Pagos]].
 *
 * @see Pagos
 */
class PagosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Pagos[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Pagos|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
