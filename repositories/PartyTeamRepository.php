<?php
namespace app\repositories;

use app\models\PartyPersonal;
use app\models\PartyTeam;
use app\models\SearchPartyTeam;
use app\models\PersonalOffset;
use app\models\Team;
use app\models\History;
use http\Exception\RuntimeException;
use Yii;
use yii\db\ArrayExpression;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\SiClick;
use app\services\SiteService;
class PartyTeamRepository
{
    public function findChooseColor($branch, $id)
    {
        $model = PartyTeam::find()->where(['id' => $id])->one();
        $model->lastBranch($branch);
        return $model;
    }
    public function plusNumb($id, $numb, $branch){
        $model = PartyTeam::find()->where(['id' => $id])->one();
        if($model !== null){
            $model->plus($numb);
            $model->lastBranch($branch);
            $this->saveModel($model);
            return $model;
        } else {
            return 'PartyTeam not found for id: ' . $id;
        }
    }
    public function plusScore($id, $score,$lastBranch)
    {
        $model = PartyTeam::find()->where(['id' => $id])->one();
        $model->plus($score);
        $model->lastBranch($lastBranch);
        $this->saveModel($model);
        return $model;
    }
    public function minusNumb($id, $numb, $branch){
        $model = PartyTeam::find()->where(['id' => $id])->one();
        if($model !== null){
        $model->minus($numb);
        $model->lastBranch($branch);
        $this->saveModel($model);
        return $model;
        } else {
            return 'PartyTeam not found for id: ' . $id;
        }
    }
    public function minusScore($id, $score,$lastBranch){

        $model = PartyTeam::find()->where(['id' => $id])->one();
        $model->minus($score);
        $model->lastBranch($lastBranch);
        $this->saveModel($model);
        return $model;
    }
    public function saveModel(PartyTeam $model)
    {
        if(!$model->save()) {
            return new \DomainException('Model not saving');
        }
    }
    public function deleteById($id)
    {
        $teams = PartyTeam::find()->where(['team_id' => $id])->all();
        foreach ($teams as $team) {
            $models = History::find()->where(['party_team_id' => $team->id])->all();
            foreach ($models as $model) {
                if ($model != null) {
                    $model->delete();
                }
            }
            if ($team != null) {
                $team->delete();
            }
        }
    }

    public function deleteByIdTeam($id)
    {
        $teams = PartyTeam::find()->where(['id' => $id])->all();
        foreach ($teams as $team) {
            $models = History::find()->where(['party_team_id' => $team->id])->all();
            foreach ($models as $model) {
                if ($model != null) {
                    $model->delete();
                }
            }
            if ($team != null) {
                $team->delete();
            }
        }
    }
    public function findByTeamId($id):array
    {
        return \app\models\PartyTeam::find()->where(['team_id' => $id])->all();
    }
    public function createModel($queryParams){
        $searchModel = Yii::createObject(SearchPartyTeam::class);
        $dataProvider = $searchModel->search($queryParams);
        return [$searchModel, $dataProvider];
    }

    public function findModel($id)
    {
        if (($model = PartyTeam::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
    /*public function delete(PartyTeam $team){
        if (!$team->delete($team)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }*/

}