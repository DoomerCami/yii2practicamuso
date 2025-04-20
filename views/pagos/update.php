<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Pagos $model */

$this->title = Yii::t('app', 'Update Pagos: {name}', [
    'name' => $model->id_pago,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pagos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pago, 'url' => ['view', 'id_pago' => $model->id_pago]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="pagos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
