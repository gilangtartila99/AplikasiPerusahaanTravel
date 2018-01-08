<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use app\models\Mobil;
use app\models\Villa;
use app\models\Paket;
use app\models\MobilIndexSearch;
use app\models\VillaIndexSearch;
use app\models\PaketIndexSearch;
use app\models\PesanMobil;
use app\models\PesanVilla;
use app\models\PesanPaket;
use app\models\MobilSearch;
use app\models\VillaSearch;
use app\models\PaketSearch;
use app\models\PesanMobilSearch;
use app\models\PesanVillaSearch;
use app\models\PesanPaketSearch;
use mPDF;

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
                'only' => ['logout'],
                'rules' => [
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
                    //'logout' => ['post'],
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

    public function actionCetakpesanmobil($id) 
    {
        $model = $this->findModelPesanmobil($id);
        $filename = date('dmYhis').'.pdf';

        $mpdf = new mPDF('utf-8', 'A4');
        $stylesheet = file_get_contents('css/site.css'); // external css
        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->SetTitle(date('dmYhis'));
        $mpdf->WriteHTML(
            $this->render('cetakpesanmobil', [
                'model' => $model,
            ]));
        $mpdf->Output($filename, 'I');
    }

    public function actionCetakpesanvilla($id) 
    {
        $model = $this->findModelPesanvilla($id);
        $filename = date('dmYhis').'.pdf';

        $mpdf = new mPDF('utf-8', 'A4');
        $stylesheet = file_get_contents('css/site.css'); // external css
        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->SetTitle(date('dmYhis'));
        $mpdf->WriteHTML(
            $this->render('cetakpesanvilla', [
                'model' => $model,
            ]));
        $mpdf->Output($filename, 'I');
    }

    public function actionCetakpesanpaket($id) 
    {
        $model = $this->findModelPesanpaket($id);
        $filename = date('dmYhis').'.pdf';

        $mpdf = new mPDF('utf-8', 'A4');
        $stylesheet = file_get_contents('css/site.css'); // external css
        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->SetTitle(date('dmYhis'));
        $mpdf->WriteHTML(
            $this->render('cetakpesanpaket', [
                'model' => $model,
            ]));
        $mpdf->Output($filename, 'I');
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $query = Mobil::find()->limit(3)->all();
        $searchModel = new MobilIndexSearch();
        $query1 = Villa::find()->limit(3)->all();
        $searchModel1 = new VillaIndexSearch();
        $query2 = Paket::find()->limit(3)->all();
        $searchModel2 = new PaketIndexSearch();
 
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
            'sort'=> ['defaultOrder' => ['id_mobil'=>SORT_DESC]],
        ]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $dataProvider1 = new ActiveDataProvider([
            'query' => $query1,
            'pagination' => false,
            'sort'=> ['defaultOrder' => ['id_villa'=>SORT_DESC]],
        ]);
        $dataProvider1 = $searchModel1->search(Yii::$app->request->queryParams);

        $dataProvider2 = new ActiveDataProvider([
            'query' => $query2,
            'pagination' => false,
            'sort'=> ['defaultOrder' => ['id_paket'=>SORT_DESC]],
        ]);
        $dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'dataProvider1' => $dataProvider1,
            'searchModel1' => $searchModel1,
            'dataProvider2' => $dataProvider2,
            'searchModel2' => $searchModel2,
        ]);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionManager()
    {    
        $searchModel = new PesanMobilSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModel2 = new PesanPaketSearch();
        $dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams);
        $searchModel3 = new PesanVillaSearch();
        $dataProvider3 = $searchModel3->search(Yii::$app->request->queryParams);

        $filename = date('dmYhis').'.pdf';
        $mpdf = new mPDF('utf-8', 'A4-P');
        $mpdf->WriteHTML($this->render('manager', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dataProvider2' => $dataProvider2,
            'searchModel2' => $searchModel2,
            'dataProvider3' => $dataProvider3,
            'searchModel3' => $searchModel3,
        ]));
        $mpdf->Output($filename, 'D');
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionAllmobil()
    {
        $searchModel = new MobilSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('allmobil', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }


    /**
     * Lists all Paket models.
     * @return mixed
     */
    public function actionAllpaket()
    {
        $searchModel = new PaketSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('allpaket', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Villa models.
     * @return mixed
     */
    public function actionAllvilla()
    {
        $searchModel = new VillaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('allvilla', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new PesanMobil model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionPesanmobil($id)
    {
        $mobil = $this->findModelMobil($id);
        $model = new PesanMobil();
        if(Yii::$app->user->getIsGuest()) {
            $model->tanggal_pesan = date('Y-m-d');
            $model->mobil_id = $mobil->id_mobil;

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['viewpesanmobil', 'id' => $model->id_pesan_mobil]);
            } else {
                return $this->render('pesanmobil', [
                    'model' => $model,
                    'mobil' => $mobil,
                ]);
            }
        } else {
            if(Yii::$app->user->identity->role == 1 OR Yii::$app->user->identity->role == 2) {
                $model->nama = Yii::$app->user->identity->nama;
                $model->no_identitas = Yii::$app->user->identity->no_identitas;
                $model->jenis_kelamin = Yii::$app->user->identity->jenis_kelamin;
                $model->alamat = Yii::$app->user->identity->alamat;
                $model->tanggal_pesan = date('Y-m-d');
                $model->mobil_id = $mobil->id_mobil;

                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    return $this->redirect(['viewpesanmobil', 'id' => $model->id_pesan_mobil]);
                } else {
                    return $this->render('pesanmobil', [
                        'model' => $model,
                        'mobil' => $mobil,
                    ]);
                }
            }
        }
    }

    /**
     * Creates a new PesanMobil model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionPesanvilla($id)
    {
        $villa = $this->findModelVilla($id);
        $model = new PesanVilla();
        if(Yii::$app->user->getIsGuest()) {
            $model->tanggal_pesan = date('Y-m-d');
            $model->villa_id = $villa->id_villa;

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['viewpesanvilla', 'id' => $model->id_pesan_villa]);
            } else {
                return $this->render('pesanvilla', [
                    'model' => $model,
                    'villa' => $villa,
                ]);
            }
        } else {
            if(Yii::$app->user->identity->role == 1 OR Yii::$app->user->identity->role == 2) {
                $model->nama = Yii::$app->user->identity->nama;
                $model->no_identitas = Yii::$app->user->identity->no_identitas;
                $model->jenis_kelamin = Yii::$app->user->identity->jenis_kelamin;
                $model->alamat = Yii::$app->user->identity->alamat;
                $model->tanggal_pesan = date('Y-m-d');
                $model->villa_id = $villa->id_villa;

                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    return $this->redirect(['viewpesanvilla', 'id' => $model->id_pesan_villa]);
                } else {
                    return $this->render('pesanvilla', [
                        'model' => $model,
                        'villa' => $villa,
                    ]);
                }
            }
        }
    }

    /**
     * Creates a new PesanMobil model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionPesanpaket($id)
    {
        $paket = $this->findModelPaket($id);
        $model = new PesanPaket();
        if(Yii::$app->user->getIsGuest()) {
            $model->tanggal_pesan = date('Y-m-d');
            $model->paket_id = $paket->id_paket;

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['viewpesanpaket', 'id' => $model->id_pesan_paket]);
            } else {
                return $this->render('pesanpaket', [
                    'model' => $model,
                    'paket' => $paket,
                ]);
            }
        } else {
            if(Yii::$app->user->identity->role == 1 OR Yii::$app->user->identity->role == 2) {
                $model->nama = Yii::$app->user->identity->nama;
                $model->no_identitas = Yii::$app->user->identity->no_identitas;
                $model->jenis_kelamin = Yii::$app->user->identity->jenis_kelamin;
                $model->alamat = Yii::$app->user->identity->alamat;
                $model->tanggal_pesan = date('Y-m-d');
                $model->paket_id = $paket->id_paket;

                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    return $this->redirect(['viewpesanpaket', 'id' => $model->id_pesan_paket]);
                } else {
                    return $this->render('pesanpaket', [
                        'model' => $model,
                        'paket' => $paket,
                    ]);
                }
            } 
        }
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays a single Villa model.
     * @param integer $id
     * @return mixed
     */
    public function actionViewvilla($id)
    {
        return $this->render('viewvilla', [
            'model' => $this->findModelVilla($id),
        ]);
    }

    /**
     * Displays a single Villa model.
     * @param integer $id
     * @return mixed
     */
    public function actionViewmobil($id)
    {
        return $this->render('viewmobil', [
            'model' => $this->findModelMobil($id),
        ]);
    }

    /**
     * Displays a single Villa model.
     * @param integer $id
     * @return mixed
     */
    public function actionViewpaket($id)
    {
        return $this->render('viewpaket', [
            'model' => $this->findModelPaket($id),
        ]);
    }

    /**
     * Displays a single Villa model.
     * @param integer $id
     * @return mixed
     */
    public function actionViewpesanvilla($id)
    {
        return $this->render('viewpesanvilla', [
            'model' => $this->findModelPesanvilla($id),
        ]);
    }

    /**
     * Displays a single Villa model.
     * @param integer $id
     * @return mixed
     */
    public function actionViewpesanmobil($id)
    {
        return $this->render('viewpesanmobil', [
            'model' => $this->findModelPesanmobil($id),
        ]);
    }

    /**
     * Displays a single Villa model.
     * @param integer $id
     * @return mixed
     */
    public function actionViewpesanpaket($id)
    {
        return $this->render('viewpesanpaket', [
            'model' => $this->findModelPesanpaket($id),
        ]);
    }

    /**
     * Finds the Villa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Villa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelVilla($id)
    {
        if (($model = Villa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the Villa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Villa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelMobil($id)
    {
        if (($model = Mobil::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the Villa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Villa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelPesanmobil($id)
    {
        if (($model = PesanMobil::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the Villa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Villa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelPesanpaket($id)
    {
        if (($model = PesanPaket::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the Villa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Villa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelPesanvilla($id)
    {
        if (($model = PesanVilla::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the Villa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Villa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelPaket($id)
    {
        if (($model = Paket::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
