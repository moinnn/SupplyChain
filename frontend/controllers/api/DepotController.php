<?php

namespace frontend\controllers\api;

use yii\rest\ActiveController;
use yii\web\Response;
use frontend\helpers\RestfulHelper;
use frontend\services\IDepotService;
use app\models\Depot;

class DepotController extends ActiveController
{
	public $modelClass = '\app\models\Depot';

	protected $depotService;

	public function __construct($id, $module, IDepotService $depotService, $config = [])
	{
		$this->depotService = $depotService;
		parent::__construct($id, $module, $config);
	}

	public function behaviors()
	{
	    $behaviors = parent::behaviors();
	    $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
	    return $behaviors;
	}

	public function actionList($serial_number = null)
	{
		if ($serial_number != null) {
			if (($model = $this->depotService->findBySerialNumber($serial_number)) !== null) {
				return array_merge(
					RestfulHelper::successfulStatusEnvolop(),
					['depots' => RestfulHelper::depotToJsonFormat($model)]);
			} else {
				throw new NotFoundHttpException();
			}
		}
		return array_merge(
			RestfulHelper::successfulStatusEnvolop(),
			['depots' => RestfulHelper::depotsToJsonFormat(Depot::find()->all())]);
	}
}