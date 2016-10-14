<?php
/** @package    Htools::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * UsuarioMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the UsuarioDAO to the cadastro_usuario datastore.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * You can override the default fetching strategies for KeyMaps in _config.php.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Htools::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class UsuarioMap implements IDaoMap, IDaoMap2
{

	private static $KM;
	private static $FM;
	
	/**
	 * {@inheritdoc}
	 */
	public static function AddMap($property,FieldMap $map)
	{
		self::GetFieldMaps();
		self::$FM[$property] = $map;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public static function SetFetchingStrategy($property,$loadType)
	{
		self::GetKeyMaps();
		self::$KM[$property]->LoadType = $loadType;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetFieldMaps()
	{
		if (self::$FM == null)
		{
			self::$FM = Array();
			self::$FM["Id"] = new FieldMap("Id","cadastro_usuario","id",true,FM_TYPE_INT,11,null,true,false);
			self::$FM["Cpf"] = new FieldMap("Cpf","cadastro_usuario","cpf",false,FM_TYPE_VARCHAR,45,null,false,false);
			self::$FM["Nome"] = new FieldMap("Nome","cadastro_usuario","nome",false,FM_TYPE_VARCHAR,45,null,false,false);
			self::$FM["Email"] = new FieldMap("Email","cadastro_usuario","email",false,FM_TYPE_VARCHAR,45,null,false,false);
			self::$FM["Sexo"] = new FieldMap("Sexo","cadastro_usuario","sexo",false,FM_TYPE_ENUM,array("F","M"),null,false,false);
			self::$FM["DtNascimento"] = new FieldMap("DtNascimento","cadastro_usuario","dt_nascimento",false,FM_TYPE_DATE,null,null,false,false);
			self::$FM["Telefone"] = new FieldMap("Telefone","cadastro_usuario","telefone",false,FM_TYPE_VARCHAR,45,null,false,false);
			self::$FM["Senha"] = new FieldMap("Senha","cadastro_usuario","senha",false,FM_TYPE_VARCHAR,60,null,false,false);
		}
		return self::$FM;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetKeyMaps()
	{
		if (self::$KM == null)
		{
			self::$KM = Array();
		}
		return self::$KM;
	}

}

?>