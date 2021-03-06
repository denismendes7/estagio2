<?php
/** @package Htools::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("ConcentradorMap.php");

/**
 * ConcentradorDAO provides object-oriented access to the concentrador table.  This
 * class is automatically generated by ClassBuilder.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the Model class which is extended from this DAO class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Htools::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class ConcentradorDAO extends Phreezable
{
	/** @var int */
	public $Id;

	/** @var string */
	public $Concentrador;

	/** @var string */
	public $IpNas;

	/** @var string */
	public $Secret;

	/** @var int */
	public $SshPorta;

	/** @var string */
	public $User;

	/** @var mediumtext */
	public $Descricao;

	/** @var int */
	public $CodPerfil;


	/**
	 * Returns the foreign object based on the value of CodPerfil
	 * @return PerfilAcesso
	 */
	public function GetCodPerfilPerfilAcesso()
	{
		return $this->_phreezer->GetManyToOne($this, "fk_perfil");
	}


}
?>