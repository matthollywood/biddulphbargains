<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\LoginForm;
use backend\models\SignupForm;
use yii\filters\VerbFilter;
use backend\models\TblOffers;
use backend\models\TblStores;
use backend\models\TblOfferStatus;
use yii\web\ForbiddenHttpException;
use backend\models\PasswordResetRequestForm;
use backend\models\ResetPasswordForm;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login','signup', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','admin'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post','get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login() ) {
            if($model->user->status == 1 || $model->user->status == 0){
                return $this->redirect('logout');
            }
			elseif($model->user->status === 30){
				return $this->redirect('admin');
			}
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionSignup(){
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                $this->insertShop(Yii::$app->request->post('storename'),$user->id);
                Yii::$app->session->setFlash('success', "Thank you for signing up. Your account is currently inactive and will be activated within 24 hours by our Web Team. You will be informed by email supplied when you can start to add your bargains It's great to have you on board.");
                return $this->redirect('http://www.biddulphbargains.co.uk');

            }
        }





        return $this->render('signup', [
            'model' => $model,
        ]);

    }

    private function insertShop($shopName,$id){
        $store = new TblStores();
        $store->store_name = $shopName;
        $store->user_id = $id;
        if ($store->save()) {
            return $store;
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

	public function actionAdmin()
	{
		if( Yii::$app->user->can('access-admin') )
		{
			return $this->render('admin');
		}else
		{
			return $this->render('index');
		}


	}


  public function actionRequestPasswordReset()
  {
      $model = new PasswordResetRequestForm();
      if ($model->load(Yii::$app->request->post()) && $model->validate()) {
          if ($model->sendEmail()) {
              Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

              return $this->goHome();
          } else {
              Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
          }
      }

      return $this->render('requestPasswordResetToken', [
          'model' => $model,
      ]);
  }

  public function actionResetPassword($token)
  {
      try {
          $model = new ResetPasswordForm($token);
      } catch (InvalidParamException $e) {
          throw new BadRequestHttpException($e->getMessage());
      }

      if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
          Yii::$app->getSession()->setFlash('success', 'New password was saved.');

          return $this->goHome();
      }

      return $this->render('resetPassword', [
          'model' => $model,
      ]);
  }

	/*public function actionAdd()
	{
		$model = new TblOffers();
		if ($model->load(Yii::$app->request->post())) {
        if ($model->validate()) {
			$model->beforeSave();
			$model->save();
			Yii::$app->session->setFlash('success', 'Your offer has been submitted. To add another offer, please fill the form in again');
            return $this->redirect('index.php/site/add');

        }
    }

    return $this->render('add', [
        'model' => $model,
    ]);
	}*/
}
