<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Detalle_PedidoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="detalle--pedido-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_detalle') ?>

    <?= $form->field($model, 'id_pedido') ?>

    <?= $form->field($model, 'id_producto') ?>

    <?= $form->field($model, 'cantidad') ?>

    <?= $form->field($model, 'subtotal') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
