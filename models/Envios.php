<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "envios".
 *
 * @property int $id_envio
 * @property int|null $id_pedido
 * @property string|null $direccion_envio
 * @property string|null $fecha_envio
 * @property string|null $empresa_envio
 * @property string|null $numero_guia
 *
 * @property Pedidos $pedido
 */
class Envios extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'envios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pedido', 'direccion_envio', 'fecha_envio', 'empresa_envio', 'numero_guia'], 'default', 'value' => null],
            [['id_pedido'], 'integer'],
            [['direccion_envio'], 'string'],
            [['fecha_envio'], 'safe'],
            [['empresa_envio', 'numero_guia'], 'string', 'max' => 100],
            [['id_pedido'], 'exist', 'skipOnError' => true, 'targetClass' => Pedidos::class, 'targetAttribute' => ['id_pedido' => 'id_pedido']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_envio' => Yii::t('app', 'Id Envio'),
            'id_pedido' => Yii::t('app', 'Id Pedido'),
            'direccion_envio' => Yii::t('app', 'Direccion Envio'),
            'fecha_envio' => Yii::t('app', 'Fecha Envio'),
            'empresa_envio' => Yii::t('app', 'Empresa Envio'),
            'numero_guia' => Yii::t('app', 'Numero Guia'),
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
     * @return EnviosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EnviosQuery(get_called_class());
    }

}
