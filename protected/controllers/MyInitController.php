<?php

class MyInitController extends Controller
{
	
		public function actionRun()
		{

 			$auth=Yii::app()->authManager;

 			/////////////////////////////OPERACIONES////////////////////////////////////////
			$auth->createOperation('RequestAdmExpensesMedina','Gestión de Gastos Administrativos por parte del Grupo Medina');
			$auth->createOperation('RequestAdmExpensesPrada','Gestión de Gastos Administrativos por parte del Grupo Prada');

			$auth->createOperation('CrearUsuario','Crear un nuevo usuario');
			$auth->createOperation('ModificarUsuario','Modificar los datos de un usuario');
			$auth->createOperation('EliminarUsuario','Modificar los datos de un usuario');

			$auth->createOperation('CrearComprobante','Crear comprobantes (Con los Datos del comprobante original)');
			$auth->createOperation('ModificarComprobante','Modificar comprobante (En caso de necesitar una modificación)');
			$auth->createOperation('EliminarComprobante','Eliminar comprobante (En caso necesario)');
			 
			/////////////////////////////TAREAS////////////////////////////////////////
			$task=$auth->createTask('RequestAdmExpenses','Aprobacion o Rechazo de Gatos Administrativos',"NULL");
			$task->addChild('RequestAdmExpensesMedina');
			$task->addChild('RequestAdmExpensesPrada');

			$task=$auth->createTask('GestionUsuarios','Acceso al mantenimiento a los usuarios',"NULL");
			$task->addChild('CrearUsuario');
			$task->addChild('ModificarUsuario');			
			$task->addChild('EliminarUsuario');	

			$task=$auth->createTask('GestionComprobantes','Acceso al mantenimiento a los comprobantes',"NULL");
			$task->addChild('CrearComprobante');
			$task->addChild('ModificarComprobante');			
			$task->addChild('EliminarComprobante');				
			 

			/////////////////////////////ROLES////////////////////////////////////////
			$role=$auth->createRole('Presidente');
			$role->addChild('RequestAdmExpensesMedina');
			$role->addChild('GestionUsuarios');

			$role=$auth->createRole('Vicepresidente');
			$role->addChild('RequestAdmExpensesPrada');
			$role->addChild('GestionUsuarios');

			$role=$auth->createRole('GerenteEjecutivo');
			//$role->addChild('CrearUsuario');

			$role=$auth->createRole('Accionista');
			//$role->addChild('CrearUsuario');
			//$role->addChild('ModificarUsuario');

			$role=$auth->createRole('Administrador'); //Jefe Administracion
			$role->addChild('GestionComprobantes');

			$role=$auth->createRole('Asis.Administrativo');
			$role->addChild('CrearComprobante');

			$role=$auth->createRole('Administrativo');		//CONTADOR, SECRETARIAS, ASISTENTES...
			//$role->addChild('NADA');
			
			$role=$auth->createRole('Medico');
			//$role->addChild('reader');
			//$role->addChild('updatePost');

			$role=$auth->createRole('Enfermeria');
			//$role->addChild('reader');
			//$role->addChild('updatePost');
			 
			$role=$auth->createRole('Superadmin');
			$role->addChild('Administrador');
			$role->addChild('Presidente');
			$role->addChild('Vicepresidente');
			$role->addChild('Accionista');
			$role->addChild('Medico');
			$role->addChild('Enfermeria');
			 
			$auth->assign('Superadmin','1');
			$auth->assign('Presidente','16');
			$auth->assign('Vicepresidente','17');
			$auth->assign('GerenteEjecutivo','18');

 			echo "Listo!";
		}

		public function actionCheckAccess()
		{
			echo Yii::app()->user->role;
			echo " - ";
			if(Yii::app()->user->checkAccess('RequestAdmExpensesMedina'))
			{
				echo "Autorizado";
			}else{
				echo "No Autorizado";
			}

		}
}