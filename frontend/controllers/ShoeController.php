<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Shoe;
use frontend\models\ShoeSearch;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use frontend\models\Brand;
use frontend\models\OrderedShoes;
/**
 * ShoeController implements the CRUD actions for Shoe model.
 */
class ShoeController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Shoe models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ShoeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionCart()
    {
        return $this->render('cart');
    }
    public function actionShop()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Shoe::find()->latest(),
        ]);
        
        return $this->render('shop', [
            'dataProvider' => $dataProvider
        ]);
        
    }
    public function actionWomens()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Shoe::find()->womens(),
        ]);
        
        return $this->render('womens', [
            'dataProvider' => $dataProvider
        ]);}
    public function actionMens()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Shoe::find()->mens(),
        ]);
        
        return $this->render('mens', [
            'dataProvider' => $dataProvider
        ]);
    }
    public function actionKids()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Shoe::find()->kids(),
        ]);
        
        return $this->render('kids', [
            'dataProvider' => $dataProvider
        ]);
    }
    public function actionAccessories()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Shoe::find()->accessories(),
        ]);
        
        return $this->render('accessories', [
            'dataProvider' => $dataProvider
        ]);
    }
    public function actionProfile()
    {
        return $this->render('profile');
    }
    public function actionSales()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Shoe::find()->sales(),
        ]);
        
        return $this->render('sales', [
            'dataProvider' => $dataProvider
        ]);
    }
    public function actionSearch($keyword)
    {
        $this->layout = 'main';
        $query = Shoe::find();
       
        if ($keyword) {
            $query->byKeyword($keyword)
            ->orderBy("MATCH(shoe_name, description, tags)
        AGAINST (:keyword)", ['keyword' => $keyword]);
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);
        
        return $this->render('search', [
            'dataProvider' => $dataProvider
        ]);
    }
    
    

    /**
     * Displays a single Shoe model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Shoe model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
  
    
    public function actionCreate()
    {
        $model = new Shoe();
        $model->thumbnail = UploadedFile::getInstanceByName('thumbnail');
        
        if ($model->load(Yii::$app->request->Post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->shoe_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
        return $this->redirect(array(’/site/index’));
    }
    
/*     public function actionCreate()
    {
        $model = new Shoe();
        $brand = New Brand();
        $model->thumbnail = UploadedFile::getInstanceByName('thumbnail');
  
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            $brand_id = Yii::$app->request->post()['Brand']['brand_id'];
            if($this->Brand($brand_id)){
                return $this->redirect(['index', $model->shoe_id]);
            }
        }
        return $this->render('create', [
            'model' => $model,
            'brand'=>$brand
        ]);
    } */
    
    public function actionAddbrand()
    {
        $model = new \frontend\models\Brand();
        
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate() && $model->save()) {
                return $this->redirect(['create']);
            }
        }
        
        return $this->renderAjax('addbrand', [
            'model' => $model,
        ]);
    }
    
    public function Brand($brand_id){
        $model = New Brand();
        $data= array('Brand'=>['brand_id'=>$brand_id]);
        
        if($model->load($data) && $model->save()){
            return true;
        }
        return false;
    }
    
/*     public function actionAdd()
    {
        $added = Shoe::model()->findByPk(Yii::app()->request->getParam('id'));
        $id = \Yii::$app->user->id;
        $model = new OrderedShoes();
        $model->id = $id;
        $model->shoe_id = $added;
        $model->save();
    }
 */
    /**
     * Updates an existing Shoe model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->shoe_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Shoe model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Shoe model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Shoe the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Shoe::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
