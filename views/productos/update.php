<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Productos $model */

$this->title = Yii::t('app', 'Update Productos: {name}', [
    'name' => $model->id_producto,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Productos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_producto, 'url' => ['view', 'id_producto' => $model->id_producto]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="productos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
