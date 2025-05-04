<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Categorias $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="categorias-form">

    <?php $form = ActiveForm::begin(['id'=>'create-categoria-form',
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?php if($model->imagen_url): ?>
        <div class="from-group">
            <?= Html::label('Imagen Actual')?>
            <div>
            <?= Html::img(Yii::getAlias('@web' . '/image/' . $model->imagen_url, ['style'=>'width: 200px'])) ?>
            </div>
        </div>
    <?php endif; ?>
    
    <?= $form->field($model, 'nombre_categoria')->textInput([
    'maxlength' => true,
    'placeholder' => 'Título de la categoría',
    'required' => true
    ]) ?>


    <?php // = $form->field($model, 'imagen_url')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'imageFile')->fileInput()->label('Selecionar imagen') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
