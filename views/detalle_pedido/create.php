<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Detalle_Pedido $model */

$this->title = Yii::t('app', 'Create Detalle Pedido');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detalle Pedidos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalle--pedido-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
