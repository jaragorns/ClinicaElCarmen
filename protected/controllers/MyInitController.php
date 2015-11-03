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
			 
			/////////////////////////////TAREAS////////////////////////////////////////
			$task=$auth->createTask('GestionUsuarios','Acceso al mantenimiento a los usuarios',"NULL");
			$task->addChild('CrearUsuario');
			$task->addChild('ModificarUsuario');			
			$task->addChild('EliminarUsuario');	

			$task=$auth->createTask('GestionComprobantes','Acceso al mantenimiento a los comprobantes',"NULL");
			$task->addChild('CrearComprobante');
			$task->addChild('ModificarComprobante');				

			/////////////////////////////ROLES////////////////////////////////////////
			$role=$auth->createRole('Presidente');
			$role->addChild('RequestAdmExpensesPrada');

			$role=$auth->createRole('Vicepresidente');
			$role->addChild('RequestAdmExpensesMedina');

			$role=$auth->createRole('Accionista');

			$role=$auth->createRole('Administrador_Admin'); 

			$role=$auth->createRole('Asistente_Admin');

			$role=$auth->createRole('Administrativo');

			$role=$auth->createRole('Jefe_Farmacia');

			$role=$auth->createRole('Farmaceuta');

			$role=$auth->createRole('Jefe_Enfermeria');

			$role=$auth->createRole('Enfermera');

			$role=$auth->createRole('Medico');
			 
			$role=$auth->createRole('Superadmin');
			$role->addChild('Presidente');
			$role->addChild('Vicepresidente');
			$role->addChild('Accionista');
			$role->addChild('Administrador_Admin');
			$role->addChild('Asistente_Admin');
			$role->addChild('Administrativo');
			$role->addChild('Jefe_Farmacia');
			$role->addChild('Farmaceuta');
			$role->addChild('Jefe_Enfermeria');
			$role->addChild('Enfermera');
			$role->addChild('Medico');
			 
			$auth->assign('Superadmin','18716856');
			$auth->assign('Superadmin','19777859');
			$auth->assign('Presidente','16');//Zulay
			$auth->assign('Vicepresidente','9221736');//Lorena
			$auth->assign('Accionista','18');//Carlos.H, Carmen A, Lorena, Zulay, Juan Carlos, Yamil, Mayla, Yasmin, Mariangel 
			$auth->assign('Jefe_Farmacia','');//Mayla
			$auth->assign('Farmaceuta','');//Deisy
			$auth->assign('Jefe_Enfermeria','');//Nancy
			$auth->assign('Enfermeria','18');//Nancy, Maria, etc...

 			echo "RBAC LOAD!!";
		}

		public function actionCheckAccess()
		{
			echo Yii::app()->user->role;
			echo " - ";
			if(Yii::app()->user->checkAccess('ModificarUsuario'))
			{
				echo "Autorizado";
			}else{
				echo "No Autorizado";
			}

		}
}


/*
/////////////////////////////OPERACIONES////////////////////////////////////////






*/