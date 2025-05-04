<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Pagos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pagos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pedido')->textInput() ?>

    <?= $form->field($model, 'metodo_pago')->dropDownList([ 'Tarjeta' => 'Tarjeta', 'PayPal' => 'PayPal', 'Transferencia' => 'Transferencia', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'fecha_pago')->textInput([
    'maxlength' => true,
    'placeholder' => 'YYYY/MM/DD HH:MM:SS',
    'required' => true
    ]) ?>

    <?= $form->field($model, 'monto')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
