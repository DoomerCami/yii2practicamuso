<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property int $id_usuario
 * @property string|null $nombre
 * @property string|null $correo
 * @property string|null $contraseña
 * @property string|null $direccion
 * @property string|null $telefono
 * @property string|null $fecha_registro
 *
 * @property Pedidos[] $pedidos
 */
class Usuarios extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'correo', 'contraseña', 'direccion', 'telefono'], 'default', 'value' => null],
            [['direccion'], 'string'],
            [['fecha_registro'], 'safe'],
            [['nombre', 'correo'], 'string', 'max' => 100],
            [['contraseña'], 'string', 'max' => 255],
            [['telefono'], 'string', 'max' => 20],
            [['correo'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => Yii::t('app', 'Id Usuario'),
            'nombre' => Yii::t('app', 'Nombre'),
            'correo' => Yii::t('app', 'Correo'),
            'contraseña' => Yii::t('app', 'Contraseña'),
            'direccion' => Yii::t('app', 'Direccion'),
            'telefono' => Yii::t('app', 'Telefono'),
            'fecha_registro' => Yii::t('app', 'Fecha Registro'),
        ];
    }

    /**
     * Gets query for [[Pedidos]].
     *
     * @return \yii\db\ActiveQuery|PedidosQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedidos::class, ['id_usuario' => 'id_usuario']);
    }

    /**
     * {@inheritdoc}
     * @return UsuariosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsuariosQuery(get_called_class());
    }

}
