<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TransitPointSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transit Points';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transit-point-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Transit Point', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'depot_id',
            'depot.serial_number',
            'depot.name',
            'depot.short_name',
            [
                'attribute' => 'transitPointType.transit_point_type_name',
                'label' => 'Transit Point Type',
            ],
            // 'remarks',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
