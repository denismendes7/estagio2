<?php
/** @package    Htools::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * EmpresaMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the EmpresaDAO to the empresa datastore.
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
class EmpresaMap implements IDaoMap, IDaoMap2
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
			self::$FM["Id"] = new FieldMap("Id","empresa","id",true,FM_TYPE_INT,11,null,true,false);
			self::$FM["NomeFantasia"] = new FieldMap("NomeFantasia","empresa","nome_fantasia",false,FM_TYPE_VARCHAR,60,null,false,false);
			self::$FM["RazaoSocial"] = new FieldMap("RazaoSocial","empresa","razao_social",false,FM_TYPE_VARCHAR,60,null,false,false);
			self::$FM["Cnpj"] = new FieldMap("Cnpj","empresa","cnpj",false,FM_TYPE_VARCHAR,25,null,false,false);
			self::$FM["Endereco"] = new FieldMap("Endereco","empresa","endereco",false,FM_TYPE_VARCHAR,100,null,false,false);
			self::$FM["Site"] = new FieldMap("Site","empresa","site",false,FM_TYPE_VARCHAR,45,null,false,false);
			self::$FM["Telefone"] = new FieldMap("Telefone","empresa","telefone",false,FM_TYPE_VARCHAR,25,null,false,false);
			self::$FM["Telefone2"] = new FieldMap("Telefone2","empresa","telefone2",false,FM_TYPE_VARCHAR,25,null,false,false);
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