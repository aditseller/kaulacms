<?php

namespace app\controllers;

use Yii;
use app\models\Images;
use app\models\ImagesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\imagine\Image;
use yii\filters\AccessControl;

/**
 * ImagesController implements the CRUD actions for Images model.
 */
class ImagesController extends Controller
{
    /**
     * @inheritdoc
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
			
			'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','add','view','indexrender','addrender','viewrender'],
                'rules' => [
                    [
                        'actions' => ['index','add','view','indexrender','addrender','viewrender'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Images models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ImagesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
	//Index Render
	public function actionIndexrender()
    {
		$this->layout = "blank";
        $searchModel = new ImagesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index_render', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Images model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
	
	// View Render
	public function actionViewrender($id)
    {
		$this->layout = "blank";
        return $this->render('view_render', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Images model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAdd()
    {
        $model = new Images();

         if ($model->load(Yii::$app->request->post())) {
            $model->image = UploadedFile::getInstance($model,'image');
            if($model->save()) {
                $model->image->saveAs('public/uploads/images/'.sha1($model->id_image).'.jpg');
                    
             
                    
                   //create thumbnail and Resizing Image Product
                //Image::thumbnail('public/uploads/posts/'.sha1($model->id_post).'.jpg',450,600)
                //->save(Yii::getAlias('public/uploads/posts/thumb-'.sha1($model->id_post).'.jpg'));
				
				//watermark 
				//Image::watermark('public/uploads/posts/'.sha1($model->id_post).'-'.$model->image,'http://assets.memehits.com/watermark.png')
				//->save(Yii::getAlias('public/uploads/posts/'.sha1($model->id_post).'-'.$model->image));
        
            }
           
            return $this->redirect(['view', 'id' => $model->id_image]);  
        } else {
            return $this->render('add', [
                'model' => $model,
            ]);
        }
    }
	
	
	//Add Render
	public function actionAddrender()
    {
		$this->layout = "blank";
        $model = new Images();

         if ($model->load(Yii::$app->request->post())) {
            $model->image = UploadedFile::getInstance($model,'image');
            if($model->save()) {
                $model->image->saveAs('public/uploads/images/'.sha1($model->id_image).'.jpg');
                    
             
                    
                   //create thumbnail and Resizing Image Product
                //Image::thumbnail('public/uploads/posts/'.sha1($model->id_post).'.jpg',450,600)
                //->save(Yii::getAlias('public/uploads/posts/thumb-'.sha1($model->id_post).'.jpg'));
				
				//watermark 
				//Image::watermark('public/uploads/posts/'.sha1($model->id_post).'-'.$model->image,'http://assets.memehits.com/watermark.png')
				//->save(Yii::getAlias('public/uploads/posts/'.sha1($model->id_post).'-'.$model->image));
        
            }
           
            return $this->redirect(['viewrender', 'id' => $model->id_image]);  
        } else {
            return $this->render('add_render', [
                'model' => $model,
            ]);
        }
    }

  

    /**
     * Deletes an existing Images model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
		unlink('public/uploads/images/'.sha1($id).'.jpg');

        return $this->redirect(['index']);
    }

    /**
     * Finds the Images model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Images the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Images::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
