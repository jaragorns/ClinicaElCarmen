<?php

class MyInitController extends Controller
{
	
		public function actionRun()
		{
			$auth=Yii::app()->authManager;
 			
 			$auth->createOperation('createUsers','Crear un usuario');

 			$bizRule='return Yii::app()->user->id==$params["post"]->authID;';
 			$task=$auth->createTask('updateOwnPassword','Actualizar clave propia',$bizRule);

 			$role=$auth->createRole('superadmin');
 			$role->addChild('createUsers');
 			$auth->assign('superadmin','jaragorns');

 			echo "Listo!";
		}

		public function actionCheckAccess()
		{
			if(Yii::app()->user->checkAccess('createUsers'))
			{
				echo "Autorizado";
			}else{
				echo "No Autorizado";
			}
		}
}