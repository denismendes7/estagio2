<?php
/** @package    Htools::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * ConcentradorMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the ConcentradorDAO to the concentrador datastore.
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
class ConcentradorMap implements IDaoMap, IDaoMap2
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
			self::$FM["Id"] = new FieldMap("Id","concentrador","id",true,FM_TYPE_INT,11,null,true,false);
			self::$FM["Concentrador"] = new FieldMap("Concentrador","concentrador","concentrador",false,FM_TYPE_VARCHAR,45,null,false,false);
			self::$FM["IpNas"] = new FieldMap("IpNas","concentrador","ip_nas",false,FM_TYPE_VARCHAR,45,null,false,true);
			self::$FM["Secret"] = new FieldMap("Secret","concentrador","secret",false,FM_TYPE_VARCHAR,45,null,false,false);
			self::$FM["SshPorta"] = new FieldMap("SshPorta","concentrador","ssh_porta",false,FM_TYPE_INT,11,null,false,false);
			self::$FM["User"] = new FieldMap("User","concentrador","user",false,FM_TYPE_VARCHAR,45,null,false,false);
			self::$FM["Descricao"] = new FieldMap("Descricao","concentrador","descricao",false,FM_TYPE_MEDIUMTEXT,null,null,false,false);
			self::$FM["CodPerfil"] = new FieldMap("CodPerfil","concentrador","cod_perfil",false,FM_TYPE_INT,11,null,false,false);
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
			self::$KM["fk_perfil"] = new KeyMap("fk_perfil", "CodPerfil", "PerfilAcesso", "Id", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>