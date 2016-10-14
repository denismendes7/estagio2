<?php
/** @package    Htools::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the Usuario object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package Htools::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class UsuarioReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `cadastro_usuario` table
	public $CustomFieldExample;

	public $Id;
	public $Cpf;
	public $Nome;
	public $Email;
	public $Sexo;
	public $DtNascimento;
	public $Telefone;
	public $Senha;

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
			,`cadastro_usuario`.`id` as Id
			,`cadastro_usuario`.`cpf` as Cpf
			,`cadastro_usuario`.`nome` as Nome
			,`cadastro_usuario`.`email` as Email
			,`cadastro_usuario`.`sexo` as Sexo
			,`cadastro_usuario`.`dt_nascimento` as DtNascimento
			,`cadastro_usuario`.`telefone` as Telefone
			,`cadastro_usuario`.`senha` as Senha
		from `cadastro_usuario`";

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
		$sql = "select count(1) as counter from `cadastro_usuario`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>