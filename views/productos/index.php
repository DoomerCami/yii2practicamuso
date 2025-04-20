<?php

use app\models\Productos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\ProductosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Productos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Productos'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_producto',
            'nombre',
            'descripcion:ntext',
            'precio',
            'stock',
            //'talla',
            //'color',
            //'id_categoria',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Productos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_producto' => $model->id_producto]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
