<?php
/** @package    Htools::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the Empresa object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package Htools::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class EmpresaReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `empresa` table
	public $CustomFieldExample;

	public $Id;
	public $NomeFantasia;
	public $RazaoSocial;
	public $Cnpj;
	public $Endereco;
	public $Site;
	public $Telefone;
	public $Telefone2;

	/*
	* GetCustomQuery returns a fully formed SQL statement.  The result columns
	* must match with the properties of this reporter object.
	*
	* @see Reporter::GetCustomQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomQuery($criteria)
	{
		$sql = "select
			'custom value here...' as CustomFieldExample
			,`empresa`.`id` as Id
			,`empresa`.`nome_fantasia` as NomeFantasia
			,`empresa`.`razao_social` as RazaoSocial
			,`empresa`.`cnpj` as Cnpj
			,`empresa`.`endereco` as Endereco
			,`empresa`.`site` as Site
			,`empresa`.`telefone` as Telefone
			,`empresa`.`telefone2` as Telefone2
		from `empresa`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();
		$sql .= $criteria->GetOrder();

		return $sql;
	}
	
	/*
	* GetCustomCountQuery returns a fully formed SQL statement that will count
	* the results.  This query must return the correct number of results that
	* GetCustomQuery would, given the same criteria
	*
	* @see Reporter::GetCustomCountQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomCountQuery($criteria)
	{
		$sql = "select count(1) as counter from `empresa`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>