<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categorias".
 *
 * @property int $id_categoria
 * @property string|null $nombre_categoria
 *
 * @property Productos[] $productos
 */
class Categorias extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categorias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_categoria'], 'default', 'value' => null],
            [['nombre_categoria'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_categoria' => Yii::t('app', 'Id Categoria'),
            'nombre_categoria' => Yii::t('app', 'Nombre Categoria'),
        ];
    }

    /**
     * Gets query for [[Productos]].
     *
     * @return \yii\db\ActiveQuery|ProductosQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Productos::class, ['id_categoria' => 'id_categoria']);
    }

    /**
     * {@inheritdoc}
     * @return CategoriasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoriasQuery(get_called_class());
    }

}
