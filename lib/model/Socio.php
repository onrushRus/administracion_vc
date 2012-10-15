<?php



/**
 * Skeleton subclass for representing a row from the 'socio' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class Socio extends BaseSocio {

    public function setPassword($v){
            if($v)
               $v= md5($v);
           
            return parent::setPassword($v);
	} // setPassword()
    
} // Socio
