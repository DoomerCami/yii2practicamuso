<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Pedidos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pedidos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_usuario')->textInput() ?>

    <?= $form->field($model, 'fecha_pedido')->textInput([
    'maxlength' => true,
    'placeholder' => 'YYYY/MM/DD HH:MM:SS',
    'required' => true
    ]) ?>

    <?= $form->field($model, 'estado')->dropDownList([ 'Pendiente' => 'Pendiente', 'Enviado' => 'Enviado', 'Entregado' => 'Entregado', 'Cancelado' => 'Cancelado', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'total')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
