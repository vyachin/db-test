<?php

namespace app\models;

use yii\base\Exception;
use yii\base\Model;
use yii\data\ArrayDataProvider;
use yii\data\Pagination;
use yii\helpers\Json;

class DataSearch extends Model
{
    public function formName(): string
    {
        return '';
    }

    public function search(): ArrayDataProvider
    {
        $dataFileName = $_SERVER['DATA_FILE_NAME'];
        if (!file_exists($dataFileName)) {
            throw new Exception('Data file not found');
        }
        $content = file_get_contents($dataFileName);
        if (!$content) {
            throw new Exception('Data file is empty');
        }
        $json = Json::decode($content);

        return new ArrayDataProvider([
                'allModels' => $json,
                'modelClass' => Data::class,
                'key' => 'id',
                'pagination' => new Pagination(['pageSizeLimit' => [5, 10], 'defaultPageSize' => 5]),
            ]
        );
    }
}
