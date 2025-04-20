<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Envios $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="envios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pedido')->textInput() ?>

    <?= $form->field($model, 'direccion_envio')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fecha_envio')->textInput() ?>

    <?= $form->field($model, 'empresa_envio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero_guia')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
