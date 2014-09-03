<?php

class MyInitController extends Controller
{
	
		public function actionRun()
		{
			/*	Para crear Tareas, Operaciones y Roles por codigo 
			$auth=Yii::app()->authManager;
 			
 			$auth->createOperation('createUsers','Crear un usuario');

 			$bizRule='return Yii::app()->user->id==$params["post"]->authID;';
 			$task=$auth->createTask('updateOwnPassword','Actualizar clave propia',$bizRule);

 			$roles=$auth->createRole('superadmin');
 			$roles->addChild('createUsers');
 			$auth->assign('superadmin','1');
			*/
 			echo "Listo!";
		}

		public function actionCheckAccess()
		{
			//echo Yii::app()->user->role;
			if(Yii::app()->user->checkAccess('createUsers'))
			{
				echo "Autorizado";
			}else{
				echo "No Autorizado";
			}
		}
}