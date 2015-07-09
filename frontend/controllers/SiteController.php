<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\TblOffers;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Your;
use frontend\models\YourSearch;
use frontend\models\Catfind;
use frontend\models\Catresults;
use frontend\models\TblStores;
use yii\data\Pagination;
use yii\widgets\LinkPager;
/**
 * Site controller
 */
class SiteController extends Controller
{
    public $enableCsrfValidation = false;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
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
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

	public function actionSearch()
	{
        if(isset($_POST['submit'])){
            $keyword = $_POST['keyword'];

        }
        return $this->render('search');
	}

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
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

	public function actionAdd()
	{
		$model = new TblOffers();
		if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
    			$model->beforeSave();
    			$model->save();
    			Yii::$app->session->setFlash('success', 'Your offer has been submitted. To add another offer, please fill the form in again');
                return $this->redirect('/index.php/site/add');

            }
        }
        return $this->render('add', [
            'model' => $model,
        ]);
	}

		public function actionTermsandconditions()
	{
		return $this->render('termsandconditions');
	}

	public function actionEvents()
	{
		return $this->render('events');
	}

	public function actionCategories()
	{

		$provider = new \yii\data\ActiveDataProvider([
		'query' => Catfind::find(),
		'pagination' => [
			'pageSize' => 10,
		],

		]);
		return $this->render('categories',['provider' => $provider]);
	}

    private function getTypeIDFromName($id){
        $final = str_replace('-',' ',$id);
        $record = Catfind::findOne(['offer_type'=>$final]);
        return $record? $record->offer_id : 0;
    }

	public function actionCategorieslanding($id=0)
	{
        $this->enableCsrfValidation = false;
        if(isset($_POST['submit'])){
            $id = $_POST['keyword'];
        }
        $tid = $this->getTypeIDFromName($id);
        $rows = (new \yii\db\Query())
                    ->select([
        			'tbl_offers.id',
        			'tbl_offers.offer_id',
        			'tbl_offers.offer_description',
        			'tbl_offers.offer_start_date',
        			'tbl_offers.offer_end_date',
              'tbl_offers.offer_type_id',
        			'tbl_stores.store_name'])
                    ->from('tbl_offers')
                    ->join('LEFT OUTER JOIN','tbl_stores',
        				'tbl_offers.id =tbl_stores.store_id')
                    ->where('status =1 AND (offer_description LIKE :id
                     OR offer_start_date = :id OR offer_end_date = :id OR offer_type_id = :id',  [':id' => $id])
                    ->all();
  /*      $rows = (new \yii\db\Query())
            ->select([
			'tbl_offers.id',
			'tbl_offers.offer_id',
			'tbl_offers.offer_description',
			'tbl_offers.offer_start_date',
			'tbl_offers.offer_end_date',
      'tbl_offers.offer_type_id',
			'tbl_stores.store_name'])
            ->from('tbl_offers')
			         ->join('LEFT OUTER JOIN','tbl_stores',
					          'tbl_offers.id =tbl_stores.store_id')
            ->where(['like','offer_description' , $id])
            ->where(['active_status = 1')
            ->orWhere(['offer_start_date'=>$id])
            ->orWhere(['offer_end_date'=>$id])
            ->orWhere(['offer_type_id'=>$tid])
            ->all();
*/
		$pagination = new Pagination([
			'defaultPageSize' => 5,
		]);

        return $this->render('categorieslanding',[
		'model' => $rows,
		'web'=>$id,
		'pagination'=>$pagination,]);
	}
	public function actionSignupstore()
	{
		$model = new TblStores();
		if ($model->load(Yii::$app->request->post())) {
        if ($model->validate()) {
			$model->save();
			Yii::$app->session->setFlash('success', 'Your offer has been submitted. To add another offer, please fill the form in again');
            return $this->redirect('index.php?r=site%2Fsearch');

        }
    }

    return $this->render('signupstore', [
        'model' => $model,
    ]);
	}


}
