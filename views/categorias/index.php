<?php

use app\models\Categorias;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\CategoriasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Categorias');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categorias-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Categorias'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_categoria',
            'nombre_categoria',
            // 'imagen_url:url',
            [
                'attribute' => 'imagen_url',
                'format' => 'html',
                'value' => function(Categorias $model) {
                    if ($model->imagen_url)
                        return Html::img(Yii::getAlias('@web') . '/image/' . $model->imagen_url, ['width' => '80px']);
                    return null;
                }
            ],

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Categorias $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_categoria' => $model->id_categoria]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
