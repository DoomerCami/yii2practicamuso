<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Categorias $model */

$this->title = Yii::t('app', 'Update Categorias: {name}', [
    'name' => $model->id_categoria,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categorias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_categoria, 'url' => ['view', 'id_categoria' => $model->id_categoria]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="categorias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
