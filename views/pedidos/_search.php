<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PedidosSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pedidos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_pedido') ?>

    <?= $form->field($model, 'id_usuario') ?>

    <?= $form->field($model, 'fecha_pedido') ?>

    <?= $form->field($model, 'estado') ?>

    <?= $form->field($model, 'total') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
