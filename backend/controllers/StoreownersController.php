<?php

namespace backend\controllers;

use Yii;
use backend\models\StoreOwners;
use backend\models\StoreOwnersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\TblOfferStatus

/**
 * StoreownersController implements the CRUD actions for StoreOwners model.
 */
class StoreownersController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all StoreOwners models.
     * @return mixed
     */
    public function actionIndex()
    {
        $userRole = \Yii::$app->user->identity->status;
        if($userRole === 30 ){
            $searchModel = new StoreOwnersSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else{
            return $this->redirect('../site/index');
        }
    }

    /**
     * Displays a single StoreOwners model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $userRole = \Yii::$app->user->identity->status;
        if($userRole === 30 ){
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }else{
            return $this->redirect('../site/index');
        }
    }



    /**
     * Updates an existing StoreOwners model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $userRole = \Yii::$app->user->identity->status;
        if($userRole === 30 ){
            $model = $this->findModel($id);
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }else{
            return $this->redirect('../site/index');
        }
    }

    /**
     * Deletes an existing StoreOwners model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $userRole = \Yii::$app->user->identity->status;
        if($userRole === 30 ){
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        }else{
            return $this->redirect('../site/index');
        }
    }

    /**
     * Finds the StoreOwners model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StoreOwners the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StoreOwners::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
