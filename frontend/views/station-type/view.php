<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\StationType */

$this->title = $model->station_type_name;
$this->params['breadcrumbs'][] = ['label' => 'Station Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="station-type-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->station_type_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->station_type_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'station_type_id',
            'station_type_name',
        ],
    ]) ?>

</div>
