<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Detalle_Pedido]].
 *
 * @see Detalle_Pedido
 */
class Detalle_PedidoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Detalle_Pedido[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Detalle_Pedido|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
