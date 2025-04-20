<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pagos".
 *
 * @property int $id_pago
 * @property int|null $id_pedido
 * @property string|null $metodo_pago
 * @property string|null $fecha_pago
 * @property float|null $monto
 *
 * @property Pedidos $pedido
 */
class Pagos extends \yii\db\ActiveRecord
{

    /**
     * ENUM field values
     */
    const METODO_PAGO_TARJETA = 'Tarjeta';
    const METODO_PAGO_PAYPAL = 'PayPal';
    const METODO_PAGO_TRANSFERENCIA = 'Transferencia';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pagos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pedido', 'metodo_pago', 'monto'], 'default', 'value' => null],
            [['id_pedido'], 'integer'],
            [['metodo_pago'], 'string'],
            [['fecha_pago'], 'safe'],
            [['monto'], 'number'],
            ['metodo_pago', 'in', 'range' => array_keys(self::optsMetodoPago())],
            [['id_pedido'], 'exist', 'skipOnError' => true, 'targetClass' => Pedidos::class, 'targetAttribute' => ['id_pedido' => 'id_pedido']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pago' => Yii::t('app', 'Id Pago'),
            'id_pedido' => Yii::t('app', 'Id Pedido'),
            'metodo_pago' => Yii::t('app', 'Metodo Pago'),
            'fecha_pago' => Yii::t('app', 'Fecha Pago'),
            'monto' => Yii::t('app', 'Monto'),
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
     * {@inheritdoc}
     * @return PagosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PagosQuery(get_called_class());
    }


    /**
     * column metodo_pago ENUM value labels
     * @return string[]
     */
    public static function optsMetodoPago()
    {
        return [
            self::METODO_PAGO_TARJETA => Yii::t('app', 'Tarjeta'),
            self::METODO_PAGO_PAYPAL => Yii::t('app', 'PayPal'),
            self::METODO_PAGO_TRANSFERENCIA => Yii::t('app', 'Transferencia'),
        ];
    }

    /**
     * @return string
     */
    public function displayMetodoPago()
    {
        return self::optsMetodoPago()[$this->metodo_pago];
    }

    /**
     * @return bool
     */
    public function isMetodoPagoTarjeta()
    {
        return $this->metodo_pago === self::METODO_PAGO_TARJETA;
    }

    public function setMetodoPagoToTarjeta()
    {
        $this->metodo_pago = self::METODO_PAGO_TARJETA;
    }

    /**
     * @return bool
     */
    public function isMetodoPagoPaypal()
    {
        return $this->metodo_pago === self::METODO_PAGO_PAYPAL;
    }

    public function setMetodoPagoToPaypal()
    {
        $this->metodo_pago = self::METODO_PAGO_PAYPAL;
    }

    /**
     * @return bool
     */
    public function isMetodoPagoTransferencia()
    {
        return $this->metodo_pago === self::METODO_PAGO_TRANSFERENCIA;
    }

    public function setMetodoPagoToTransferencia()
    {
        $this->metodo_pago = self::METODO_PAGO_TRANSFERENCIA;
    }
}
