<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Envios $model */

$this->title = Yii::t('app', 'Create Envios');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Envios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="envios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
