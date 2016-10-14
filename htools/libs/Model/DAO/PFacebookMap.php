<?php
/** @package    Htools::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * PFacebookMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the PFacebookDAO to the perfil_facebook datastore.
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
class PFacebookMap implements IDaoMap, IDaoMap2
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
			self::$FM["Id"] = new FieldMap("Id","perfil_facebook","id",true,FM_TYPE_INT,11,null,true,false);
			self::$FM["UrlLink"] = new FieldMap("UrlLink","perfil_facebook","url_link",false,FM_TYPE_VARCHAR,45,null,false,true);
			self::$FM["FacebookId"] = new FieldMap("FacebookId","perfil_facebook","facebook_id",false,FM_TYPE_INT,10,null,false,true);
			self::$FM["TokenChave"] = new FieldMap("TokenChave","perfil_facebook","token_chave",false,FM_TYPE_VARCHAR,45,null,false,true);
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