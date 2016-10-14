<?php
/** @package    Htools::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Empresa.php");

/**
 * EmpresaController is the controller class for the Empresa object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package Htools::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class EmpresaController extends AppBaseController
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
	 * Displays a list view of Empresa objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Empresa records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new EmpresaCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Id,NomeFantasia,RazaoSocial,Cnpj,Endereco,Site,Telefone,Telefone2'
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

				$empresas = $this->Phreezer->Query('Empresa',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $empresas->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $empresas->TotalResults;
				$output->totalPages = $empresas->TotalPages;
				$output->pageSize = $empresas->PageSize;
				$output->currentPage = $empresas->CurrentPage;
			}
			else
			{
				// return all results
				$empresas = $this->Phreezer->Query('Empresa',$criteria);
				$output->rows = $empresas->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Empresa record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('id');
			$empresa = $this->Phreezer->Get('Empresa',$pk);
			$this->RenderJSON($empresa, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Empresa record and render response as JSON
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

			$empresa = new Empresa($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $empresa->Id = $this->SafeGetVal($json, 'id');

			$empresa->NomeFantasia = $this->SafeGetVal($json, 'nomeFantasia');
			$empresa->RazaoSocial = $this->SafeGetVal($json, 'razaoSocial');
			$empresa->Cnpj = $this->SafeGetVal($json, 'cnpj');
			$empresa->Endereco = $this->SafeGetVal($json, 'endereco');
			$empresa->Site = $this->SafeGetVal($json, 'site');
			$empresa->Telefone = $this->SafeGetVal($json, 'telefone');
			$empresa->Telefone2 = $this->SafeGetVal($json, 'telefone2');

			$empresa->Validate();
			$errors = $empresa->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Por Favor, verifique os erros',$errors);
			}
			else
			{
				$empresa->Save();
				$this->RenderJSON($empresa, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Empresa record and render response as JSON
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
			$empresa = $this->Phreezer->Get('Empresa',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $empresa->Id = $this->SafeGetVal($json, 'id', $empresa->Id);

			$empresa->NomeFantasia = $this->SafeGetVal($json, 'nomeFantasia', $empresa->NomeFantasia);
			$empresa->RazaoSocial = $this->SafeGetVal($json, 'razaoSocial', $empresa->RazaoSocial);
			$empresa->Cnpj = $this->SafeGetVal($json, 'cnpj', $empresa->Cnpj);
			$empresa->Endereco = $this->SafeGetVal($json, 'endereco', $empresa->Endereco);
			$empresa->Site = $this->SafeGetVal($json, 'site', $empresa->Site);
			$empresa->Telefone = $this->SafeGetVal($json, 'telefone', $empresa->Telefone);
			$empresa->Telefone2 = $this->SafeGetVal($json, 'telefone2', $empresa->Telefone2);

			$empresa->Validate();
			$errors = $empresa->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Por Favor, verifique os erros',$errors);
			}
			else
			{
				$empresa->Save();
				$this->RenderJSON($empresa, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Empresa record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('id');
			$empresa = $this->Phreezer->Get('Empresa',$pk);

			$empresa->Delete();

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
