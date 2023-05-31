<?php

namespace frontend\controllers;

use app\models\Libro;
use frontend\models\LibroSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\web\UploadedFile;
/**
 * LibroController implements the CRUD actions for Libro model.
 */
class LibroController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Libro models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LibroSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Libro model.
     * @param int $Id_libro Id Libro
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Id_libro)
    {
        return $this->render('view', [
            'model' => $this->findModel($Id_libro),
        ]);
    }

    /**
     * Creates a new Libro model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Libro();

        $this->subirFoto($model);

       /* if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'Id_libro' => $model->Id_libro]);
            }
        } else {
            $model->loadDefaultValues();
        }*/

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Libro model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $Id_libro Id Libro
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Id_libro)
    {
        $model = $this->findModel($Id_libro);
        $this->subirFoto($model);

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Libro model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $Id_libro Id Libro
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Id_libro)
    {
        $model=$this->findModel($Id_libro);
        if(file_exists($model->Imagen)){
            unlink($model->Imagen);
        }
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Libro model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $Id_libro Id Libro
     * @return Libro the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Id_libro)
    {
        if (($model = Libro::findOne(['Id_libro' => $Id_libro])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function subirFoto(Libro $model){
        
        if ($model->load($this->request->post()))  { 
        $model->archivo=UploadedFile::getInstance($model,'archivo');
        
        if($model->validate()){

            if($model->archivo){
                if(file_exists($model->Imagen)){
                    unlink($model->Imagen);
                }
                $rutaArchivo='uploads/'.time()."_".$model->archivo->baseName.".".$model->archivo->extension;
                if ($model->archivo->saveAs($rutaArchivo)){
                    $model->Imagen=$rutaArchivo;
                }
            }
        }

        
        if($model->save(false)){
            return $this->redirect(['index']);
        
        }
         
          
           
        }
    }
}
