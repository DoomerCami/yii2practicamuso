<?php

namespace app\models;

use GuzzleHttp\Psr7\UploadedFile as Psr7UploadedFile;
use Yii;
use yii\rest\UpdateAction;
use yii\web\UploadedFile;

/**
 * This is the model class for table "categorias".
 *
 * @property int $id_categoria
 * @property string|null $nombre_categoria
 * @property string|null $imagen_url
 *
 * @property Productos[] $productos
 */
class Categorias extends \yii\db\ActiveRecord
{

    public $imageFile;
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
            [['nombre_categoria', 'imagen_url'], 'default', 'value' => null],
            [['nombre_categoria'], 'string', 'max' => 100],
            [['imagen_url'], 'string', 'max' => 225],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
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
            'imagen_url' => Yii::t('app', 'Imagen Url'),
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            if($this->isNewRecord){
                if($this->save(false)){
                    return false;
                }
            }
            if($this->imageFile instanceof UploadedFile){
                $filename = $this->id_categoria . '.' . $this->imageFile->extension;
                $path = Yii::getAlias('@webroot/image/') . $filename;
                
                if($this->imageFile->saveAs($path)){
                    if($this->imagen_url && $this->imagen_url !== $filename){
                        $this->deleteimagen_url();
                    }

                    $this->imagen_url = $filename;
                }
            }
            return $this->save(false);
        }
        return false;
        
    }

    public function deleteimagen_url()
    {
        $path = Yii::getAlias('@webroot/image/') . $this->imagen_url;
        if(file_exists($path)){
            unlink($path);
        }
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
