<?php

namespace backend\controllers;

use Yii;
use backend\models\TblOffers;
use backend\models\TblOffersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\User;
/**
 * OffersController implements the CRUD actions for TblOffers model.
 */
class OffersController extends Controller
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
     * Lists all TblOffers models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new TblOffersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$user = User::findOne($id);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'user' => $user,
        ]);
    }

    /**
     * Displays a single TblOffers model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $userId = \Yii::$app->user->identity->status;
        if($userId === 30 || $userId === 20){
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }else{
            return $this->redirect('../site/index');
        } 
    }

    /**
     * Creates a new TblOffers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $userRole = \Yii::$app->user->identity->status;
        $userId = \Yii::$app->user->identity->id;
           
        if($userRole === 30 || $userRole === 20){
            
            $model =   new TblOffers();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->offer_id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'userId' =>$userId,
                    'userRole'=>$userRole,
                ]);
            }
        }else{
            return $this->redirect('../site/index');
        }
    }



    /**
     * Updates an existing TblOffers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $userId = \Yii::$app->user->identity->status;
        if($userId === 30 ){
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->offer_id]);
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
     * Deletes an existing TblOffers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $userId = \Yii::$app->user->identity->status;
        if($userId === 30 ){
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }else{
            return $this->redirect('site/index');
        }
    }

    /**
     * Finds the TblOffers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblOffers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblOffers::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
