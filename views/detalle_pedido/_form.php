<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Detalle_Pedido $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="detalle--pedido-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pedido')->textInput() ?>

    <?= $form->field($model, 'id_producto')->textInput() ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <?= $form->field($model, 'subtotal')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
