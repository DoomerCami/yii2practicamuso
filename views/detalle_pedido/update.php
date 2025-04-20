<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Detalle_Pedido $model */

$this->title = Yii::t('app', 'Update Detalle Pedido: {name}', [
    'name' => $model->id_detalle,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detalle Pedidos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_detalle, 'url' => ['view', 'id_detalle' => $model->id_detalle]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="detalle--pedido-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
