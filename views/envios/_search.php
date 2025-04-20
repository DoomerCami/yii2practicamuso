<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\EnviosSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="envios-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_envio') ?>

    <?= $form->field($model, 'id_pedido') ?>

    <?= $form->field($model, 'direccion_envio') ?>

    <?= $form->field($model, 'fecha_envio') ?>

    <?= $form->field($model, 'empresa_envio') ?>

    <?php // echo $form->field($model, 'numero_guia') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
