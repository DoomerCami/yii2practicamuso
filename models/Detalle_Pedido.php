<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalle_pedido".
 *
 * @property int $id_detalle
 * @property int|null $id_pedido
 * @property int|null $id_producto
 * @property int|null $cantidad
 * @property float|null $subtotal
 *
 * @property Pedidos $pedido
 * @property Productos $producto
 */
class Detalle_Pedido extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detalle_pedido';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pedido', 'id_producto', 'cantidad', 'subtotal'], 'default', 'value' => null],
            [['id_pedido', 'id_producto', 'cantidad'], 'integer'],
            [['subtotal'], 'number'],
            [['id_pedido'], 'exist', 'skipOnError' => true, 'targetClass' => Pedidos::class, 'targetAttribute' => ['id_pedido' => 'id_pedido']],
            [['id_producto'], 'exist', 'skipOnError' => true, 'targetClass' => Productos::class, 'targetAttribute' => ['id_producto' => 'id_producto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_detalle' => Yii::t('app', 'Id Detalle'),
            'id_pedido' => Yii::t('app', 'Id Pedido'),
            'id_producto' => Yii::t('app', 'Id Producto'),
            'cantidad' => Yii::t('app', 'Cantidad'),
            'subtotal' => Yii::t('app', 'Subtotal'),
        ];
    }

    /**
     * Gets query for [[Pedido]].
     *
     * @return \yii\db\ActiveQuery|PedidosQuery
     */
    public function getPedido()
    {
        return $this->hasOne(Pedidos::class, ['id_pedido' => 'id_pedido']);
    }

    /**
     * Gets query for [[Producto]].
     *
     * @return \yii\db\ActiveQuery|ProductosQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Productos::class, ['id_producto' => 'id_producto']);
    }

    /**
     * {@inheritdoc}
     * @return Detalle_PedidoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new Detalle_PedidoQuery(get_called_class());
    }

}
