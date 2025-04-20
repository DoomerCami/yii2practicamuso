<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Productos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="productos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'precio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stock')->textInput() ?>

    <?= $form->field($model, 'talla')->dropDownList([ 'S' => 'S', 'M' => 'M', 'L' => 'L', 'XL' => 'XL', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_categoria')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
