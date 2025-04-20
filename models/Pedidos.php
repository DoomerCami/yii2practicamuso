<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedidos".
 *
 * @property int $id_pedido
 * @property int|null $id_usuario
 * @property string|null $fecha_pedido
 * @property string|null $estado
 * @property float|null $total
 *
 * @property DetallePedido[] $detallePedidos
 * @property Envios[] $envios
 * @property Pagos[] $pagos
 * @property Usuarios $usuario
 */
class Pedidos extends \yii\db\ActiveRecord
{

    /**
     * ENUM field values
     */
    const ESTADO_PENDIENTE = 'Pendiente';
    const ESTADO_ENVIADO = 'Enviado';
    const ESTADO_ENTREGADO = 'Entregado';
    const ESTADO_CANCELADO = 'Cancelado';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pedidos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_usuario', 'estado', 'total'], 'default', 'value' => null],
            [['id_usuario'], 'integer'],
            [['fecha_pedido'], 'safe'],
            [['estado'], 'string'],
            [['total'], 'number'],
            ['estado', 'in', 'range' => array_keys(self::optsEstado())],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::class, 'targetAttribute' => ['id_usuario' => 'id_usuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pedido' => Yii::t('app', 'Id Pedido'),
            'id_usuario' => Yii::t('app', 'Id Usuario'),
            'fecha_pedido' => Yii::t('app', 'Fecha Pedido'),
            'estado' => Yii::t('app', 'Estado'),
            'total' => Yii::t('app', 'Total'),
        ];
    }

    /**
     * Gets query for [[DetallePedidos]].
     *
     * @return \yii\db\ActiveQuery|DetallePedidoQuery
     */
    public function getDetallePedidos()
    {
        return $this->hasMany(DetallePedido::class, ['id_pedido' => 'id_pedido']);
    }

    /**
     * Gets query for [[Envios]].
     *
     * @return \yii\db\ActiveQuery|EnviosQuery
     */
    public function getEnvios()
    {
        return $this->hasMany(Envios::class, ['id_pedido' => 'id_pedido']);
    }

    /**
     * Gets query for [[Pagos]].
     *
     * @return \yii\db\ActiveQuery|PagosQuery
     */
    public function getPagos()
    {
        return $this->hasMany(Pagos::class, ['id_pedido' => 'id_pedido']);
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery|UsuariosQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::class, ['id_usuario' => 'id_usuario']);
    }

    /**
     * {@inheritdoc}
     * @return PedidosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PedidosQuery(get_called_class());
    }


    /**
     * column estado ENUM value labels
     * @return string[]
     */
    public static function optsEstado()
    {
        return [
            self::ESTADO_PENDIENTE => Yii::t('app', 'Pendiente'),
            self::ESTADO_ENVIADO => Yii::t('app', 'Enviado'),
            self::ESTADO_ENTREGADO => Yii::t('app', 'Entregado'),
            self::ESTADO_CANCELADO => Yii::t('app', 'Cancelado'),
        ];
    }

    /**
     * @return string
     */
    public function displayEstado()
    {
        return self::optsEstado()[$this->estado];
    }

    /**
     * @return bool
     */
    public function isEstadoPendiente()
    {
        return $this->estado === self::ESTADO_PENDIENTE;
    }

    public function setEstadoToPendiente()
    {
        $this->estado = self::ESTADO_PENDIENTE;
    }

    /**
     * @return bool
     */
    public function isEstadoEnviado()
    {
        return $this->estado === self::ESTADO_ENVIADO;
    }

    public function setEstadoToEnviado()
    {
        $this->estado = self::ESTADO_ENVIADO;
    }

    /**
     * @return bool
     */
    public function isEstadoEntregado()
    {
        return $this->estado === self::ESTADO_ENTREGADO;
    }

    public function setEstadoToEntregado()
    {
        $this->estado = self::ESTADO_ENTREGADO;
    }

    /**
     * @return bool
     */
    public function isEstadoCancelado()
    {
        return $this->estado === self::ESTADO_CANCELADO;
    }

    public function setEstadoToCancelado()
    {
        $this->estado = self::ESTADO_CANCELADO;
    }
}
