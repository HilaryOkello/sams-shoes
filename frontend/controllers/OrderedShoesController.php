<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Checkout;
use frontend\models\OrderedShoes;
use frontend\models\Shoe;
use frontend\models\OrderedShoesSearch;
use yii2mod\rbac\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;

/**
 * OrderedShoesController implements the CRUD actions for OrderedShoes model.
 */
class OrderedShoesController extends Controller
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
                    
                ],
                
            ],
            'access' => [
                'class' => AccessControl::class,
                'only' => ['create', 'index','cart', 'view'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],
        ];
    }

    /**
     * Lists all OrderedShoes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrderedShoesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OrderedShoes model.
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
     * Creates a new OrderedShoes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($shoe_id, $serial_number, $shoe_name, $shoe_price)
    {
        $model= new Shoe;
        $quantity=1;
        $id = \Yii::$app->user->id;
        $added= Shoe:: isAdded($shoe_id);
        if(!$added){
            $added = new OrderedShoes();
            $added->id = $id;
            $added->shoe_id = $shoe_id;
            $added->shoe_name = $shoe_name;
            $added->quantity = $quantity;
            $added->shoe_price = $shoe_price;
            $added->serial_number = $serial_number;
            $added->save();
     
        } else {
            $added->delete();
        }
        return $this->renderAjax('/shoe\addsavbutt', [
            'model' => $model,
        ]);
       
    
    }
    public function actionCart()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => OrderedShoes::find()->latest(),
        ]);
        $item= ArrayHelper::map(Checkout::find()
            ->where(['id'=> \Yii::$app->user->id])
            ->where(['status'=>0])
           ->all(), 'item_ids', 'item_ids');
        if($items=implode(',', $item)){
        $this->updateAfterCheckout($items);
       }
        return $this->render('cart', [
            'dataProvider' => $dataProvider
        ]);
    }
    public function updateAfterCheckout($items){
        $command = \Yii::$app->db->createCommand("UPDATE ordered_shoes SET status=1 WHERE order_id IN(.$items)");
        $command->execute();
        return true;
    }
    

    /**
     * Updates an existing OrderedShoes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->order_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing OrderedShoes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['cart']);
    }

    /**
     * Finds the OrderedShoes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return OrderedShoes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OrderedShoes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
