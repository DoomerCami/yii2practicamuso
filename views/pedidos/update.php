<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Pedidos $model */

$this->title = Yii::t('app', 'Update Pedidos: {name}', [
    'name' => $model->id_pedido,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pedidos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pedido, 'url' => ['view', 'id_pedido' => $model->id_pedido]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="pedidos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
