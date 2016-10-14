<?php
/** @package    Htools::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/RelacaoAcesso.php");

/**
 * RelacaoAcessoController is the controller class for the RelacaoAcesso object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package Htools::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class RelacaoAcessoController extends AppBaseController
{

	/**
	 * Override here for any controller-specific functionality
	 *
	 * @inheritdocs
	 */
	protected function Init()
	{
		parent::Init();
		
		/**
		 * Informe o tipo de permissao
		 */
		$this->RequirePermission(User::$PERMISSION_READ, 
			'Secure.LoginForm', 
			'Login requerido para acessar esta pagina',
			'Permissao de leitura e obrigatoria');
	}

	/**
	 * Displays a list view of RelacaoAcesso objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for RelacaoAcesso records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new RelacaoAcessoCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Id,Usuario,Hora,Mac,IpNas,PfAcesso'
				, '%'.$filter.'%')
			);

			// TODO: this is generic query filtering based only on criteria properties
			foreach (array_keys($_REQUEST) as $prop)
			{
				$prop_normal = ucfirst($prop);
				$prop_equals = $prop_normal.'_Equals';

				if (property_exists($criteria, $prop_normal))
				{
					$criteria->$prop_normal = RequestUtil::Get($prop);
				}
				elseif (property_exists($criteria, $prop_equals))
				{
					// this is a convenience so that the _Equals suffix is not needed
					$criteria->$prop_equals = RequestUtil::Get($prop);
				}
			}

			$output = new stdClass();

			// if a sort order was specified then specify in the criteria
 			$output->orderBy = RequestUtil::Get('orderBy');
 			$output->orderDesc = RequestUtil::Get('orderDesc') != '';
 			if ($output->orderBy) $criteria->SetOrder($output->orderBy, $output->orderDesc);

			$page = RequestUtil::Get('page');

			if ($page != '')
			{
				// if page is specified, use this instead (at the expense of one extra count query)
				$pagesize = $this->GetDefaultPageSize();

				$relacaoacessos = $this->Phreezer->Query('RelacaoAcesso',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $relacaoacessos->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $relacaoacessos->TotalResults;
				$output->totalPages = $relacaoacessos->TotalPages;
				$output->pageSize = $relacaoacessos->PageSize;
				$output->currentPage = $relacaoacessos->CurrentPage;
			}
			else
			{
				// return all results
				$relacaoacessos = $this->Phreezer->Query('RelacaoAcesso',$criteria);
				$output->rows = $relacaoacessos->ToObjectArray(true, $this->SimpleObjectParams());
				$output->totalResults = count($output->rows);
				$output->totalPages = 1;
				$output->pageSize = $output->totalResults;
				$output->currentPage = 1;
			}


			$this->RenderJSON($output, $this->JSONPCallback());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method retrieves a single RelacaoAcesso record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('id');
			$relacaoacesso = $this->Phreezer->Get('RelacaoAcesso',$pk);
			$this->RenderJSON($relacaoacesso, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new RelacaoAcesso record and render response as JSON
	 */
	public function Create()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$relacaoacesso = new RelacaoAcesso($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $relacaoacesso->Id = $this->SafeGetVal($json, 'id');

			$relacaoacesso->Usuario = $this->SafeGetVal($json, 'usuario');
			$relacaoacesso->Hora = $this->SafeGetVal($json, 'hora');
			$relacaoacesso->Mac = $this->SafeGetVal($json, 'mac');
			$relacaoacesso->IpNas = $this->SafeGetVal($json, 'ipNas');
			$relacaoacesso->PfAcesso = $this->SafeGetVal($json, 'pfAcesso');

			$relacaoacesso->Validate();
			$errors = $relacaoacesso->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Por Favor, verifique os erros',$errors);
			}
			else
			{
				$relacaoacesso->Save();
				$this->RenderJSON($relacaoacesso, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing RelacaoAcesso record and render response as JSON
	 */
	public function Update()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$pk = $this->GetRouter()->GetUrlParam('id');
			$relacaoacesso = $this->Phreezer->Get('RelacaoAcesso',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $relacaoacesso->Id = $this->SafeGetVal($json, 'id', $relacaoacesso->Id);

			$relacaoacesso->Usuario = $this->SafeGetVal($json, 'usuario', $relacaoacesso->Usuario);
			$relacaoacesso->Hora = $this->SafeGetVal($json, 'hora', $relacaoacesso->Hora);
			$relacaoacesso->Mac = $this->SafeGetVal($json, 'mac', $relacaoacesso->Mac);
			$relacaoacesso->IpNas = $this->SafeGetVal($json, 'ipNas', $relacaoacesso->IpNas);
			$relacaoacesso->PfAcesso = $this->SafeGetVal($json, 'pfAcesso', $relacaoacesso->PfAcesso);

			$relacaoacesso->Validate();
			$errors = $relacaoacesso->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Por Favor, verifique os erros',$errors);
			}
			else
			{
				$relacaoacesso->Save();
				$this->RenderJSON($relacaoacesso, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing RelacaoAcesso record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('id');
			$relacaoacesso = $this->Phreezer->Get('RelacaoAcesso',$pk);

			$relacaoacesso->Delete();

			$output = new stdClass();

			$this->RenderJSON($output, $this->JSONPCallback());

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}
}

?>
