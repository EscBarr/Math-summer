<?php

namespace app\repositories;

use app\models\PartyPersonal;
use app\models\PartyTeam;
use app\models\PersonalOffset;
use app\models\Team;
use app\models\History;
use http\Exception\RuntimeException;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\SiClick;
use app\services\SiteService;
class SiClickRepository
{
    public function findSiClickAll()
    {
        return SiClick::find()->all();
    }
    public function deleteSiClickAll($click)
    {
        $this->delete($click);
    }
    public function findSiClickById($name){
        return SiClick::find()->where(['user_id' => $name->id])->one();
    }

    public function saveSiClick(SiClick $model){
        if (!$model->save())
            throw new RuntimeException('Saving error');
    }
    public function delete($click){
        if (!$click->delete()) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
