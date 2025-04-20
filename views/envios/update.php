<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Envios $model */

$this->title = Yii::t('app', 'Update Envios: {name}', [
    'name' => $model->id_envio,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Envios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_envio, 'url' => ['view', 'id_envio' => $model->id_envio]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="envios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
