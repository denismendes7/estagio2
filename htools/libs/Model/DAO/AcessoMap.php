<?php
/** @package    Htools::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * AcessoMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the AcessoDAO to the perfil_acesso datastore.
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
class AcessoMap implements IDaoMap, IDaoMap2
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
			self::$FM["Id"] = new FieldMap("Id","perfil_acesso","id",true,FM_TYPE_INT,11,null,true,false);
			self::$FM["PerfilAcesso"] = new FieldMap("PerfilAcesso","perfil_acesso","perfil_acesso",false,FM_TYPE_VARCHAR,45,null,false,false);
			self::$FM["TempoSessao"] = new FieldMap("TempoSessao","perfil_acesso","tempo_sessao",false,FM_TYPE_VARCHAR,10,null,false,false);
			self::$FM["VelocidadeDownload"] = new FieldMap("VelocidadeDownload","perfil_acesso","velocidade_download",false,FM_TYPE_VARCHAR,25,null,false,false);
			self::$FM["VelocidadeUpload"] = new FieldMap("VelocidadeUpload","perfil_acesso","velocidade_upload",false,FM_TYPE_VARCHAR,25,null,false,false);
			self::$FM["TrafegoMax"] = new FieldMap("TrafegoMax","perfil_acesso","trafego_max",false,FM_TYPE_VARCHAR,45,null,false,false);
			self::$FM["Descricao"] = new FieldMap("Descricao","perfil_acesso","descricao",false,FM_TYPE_MEDIUMTEXT,null,null,false,false);
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
			self::$KM["fk_perfil"] = new KeyMap("fk_perfil", "Id", "Concentrador", "CodPerfil", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_sms"] = new KeyMap("fk_sms", "Id", "PerfilSms", "CodAcesso", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
		}
		return self::$KM;
	}

}

?>