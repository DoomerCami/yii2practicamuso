<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "productos".
 *
 * @property int $id_producto
 * @property string|null $nombre
 * @property string|null $descripcion
 * @property float|null $precio
 * @property int|null $stock
 * @property string|null $talla
 * @property string|null $color
 * @property int|null $id_categoria
 *
 * @property Categorias $categoria
 * @property DetallePedido[] $detallePedidos
 */
class Productos extends \yii\db\ActiveRecord
{

    /**
     * ENUM field values
     */
    const TALLA_S = 'S';
    const TALLA_M = 'M';
    const TALLA_L = 'L';
    const TALLA_XL = 'XL';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion', 'precio', 'stock', 'talla', 'color', 'id_categoria'], 'default', 'value' => null],
            [['descripcion', 'talla'], 'string'],
            [['precio'], 'number'],
            [['stock', 'id_categoria'], 'integer'],
            [['nombre'], 'string', 'max' => 100],
            [['color'], 'string', 'max' => 50],
            ['talla', 'in', 'range' => array_keys(self::optsTalla())],
            [['id_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categorias::class, 'targetAttribute' => ['id_categoria' => 'id_categoria']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_producto' => Yii::t('app', 'Id Producto'),
            'nombre' => Yii::t('app', 'Nombre'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'precio' => Yii::t('app', 'Precio'),
            'stock' => Yii::t('app', 'Stock'),
            'talla' => Yii::t('app', 'Talla'),
            'color' => Yii::t('app', 'Color'),
            'id_categoria' => Yii::t('app', 'Id Categoria'),
        ];
    }

    /**
     * Gets query for [[Categoria]].
     *
     * @return \yii\db\ActiveQuery|CategoriasQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categorias::class, ['id_categoria' => 'id_categoria']);
    }

    /**
     * Gets query for [[DetallePedidos]].
     *
     * @return \yii\db\ActiveQuery|DetallePedidoQuery
     */
    public function getDetallePedidos()
    {
        return $this->hasMany(DetallePedido::class, ['id_producto' => 'id_producto']);
    }

    /**
     * {@inheritdoc}
     * @return ProductosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductosQuery(get_called_class());
    }


    /**
     * column talla ENUM value labels
     * @return string[]
     */
    public static function optsTalla()
    {
        return [
            self::TALLA_S => Yii::t('app', 'S'),
            self::TALLA_M => Yii::t('app', 'M'),
            self::TALLA_L => Yii::t('app', 'L'),
            self::TALLA_XL => Yii::t('app', 'XL'),
        ];
    }

    /**
     * @return string
     */
    public function displayTalla()
    {
        return self::optsTalla()[$this->talla];
    }

    /**
     * @return bool
     */
    public function isTallaS()
    {
        return $this->talla === self::TALLA_S;
    }

    public function setTallaToS()
    {
        $this->talla = self::TALLA_S;
    }

    /**
     * @return bool
     */
    public function isTallaM()
    {
        return $this->talla === self::TALLA_M;
    }

    public function setTallaToM()
    {
        $this->talla = self::TALLA_M;
    }

    /**
     * @return bool
     */
    public function isTallaL()
    {
        return $this->talla === self::TALLA_L;
    }

    public function setTallaToL()
    {
        $this->talla = self::TALLA_L;
    }

    /**
     * @return bool
     */
    public function isTallaXl()
    {
        return $this->talla === self::TALLA_XL;
    }

    public function setTallaToXl()
    {
        $this->talla = self::TALLA_XL;
    }
}
