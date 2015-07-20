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

			$auth->createOperation('CrearComprobante','Crear comprobantes (Con los Datos del comprobante original)');
			$auth->createOperation('CrearComprobante','Crear comprobantes (Con los Datos del comprobante original)');
			$auth->createOperation('CrearComprobante','Crear comprobantes (Con los Datos del comprobante original)');
			 
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

			$role=$auth->createRole('Administrador_Admin'); //Jefe Administracion
			$role->addChild('GestionComprobantes');

			$role=$auth->createRole('Asistente_Admin');
			$role->addChild('CrearComprobante');

			$role=$auth->createRole('Administrador_Farmacia');		//CONTADOR, SECRETARIAS, ASISTENTES...
			//$role->addChild('NADA');
			
			$role=$auth->createRole('Medico');
			//$role->addChild('reader');
			//$role->addChild('updatePost');

			$role=$auth->createRole('Estacion');
			//$role->addChild('reader');
			//$role->addChild('updatePost');

			$role=$auth->createRole('Farmaceuta');
			//$role->addChild('reader');
			//$role->addChild('updatePost');
			 
			$role=$auth->createRole('Superadmin');
			$role->addChild('Administrador_Admin');
			$role->addChild('Administrador_Farmacia');
			$role->addChild('Presidente');
			$role->addChild('Vicepresidente');
			$role->addChild('Accionista');
			$role->addChild('Medico');
			$role->addChild('Farmaceuta');
			$role->addChild('Estacion');
			 
			$auth->assign('Superadmin','18716856');
			$auth->assign('Presidente','16');
			$auth->assign('Vicepresidente','9221736');
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