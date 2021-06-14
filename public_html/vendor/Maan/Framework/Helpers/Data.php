<?php
namespace Maan\Framework\Helpers;
/**
 * 
 */
class Data
{
	
	// public function __construct()
	// {
	// 	parent::__construct();
	// }

	public function setParams( $params )
	{
		if ( count( $params ) ) {
            $_SESSION["data"] = $this->arraysToObject( $params );//$params;
        }
        return $_SESSION;
    }

    public function getParams( $data )
    {
    	$data = $this->validate( $data );
    	if ( $data ) {
    		return $_SESSION[ $data ];
    	} else {
    		return $_SESSION;
    	}
    }

    public function arrayToObj( $params, $object ) 
    {
    	if ( count( $params ) ) {
    		foreach ($params as $key => $value)
    		{
    			if ( is_array($value) )
    			{
    				$object->$key = new \stdClass();
    				$this->arraysToObject($value, $object->$key);
    			}
    			else
    			{
    				$object->$key = $value;
    			}
    		}
    	}
    	return $object;
    }

    public function arraysToObject( $params , $object = null)
    {
    	if (is_null( $object )) {
    		$object = new \stdClass();
    	} else $object = $object;

    	return $this->arrayToObj( $params, $object );
    }

    public function arraysSqlToObject( $params , $object = null)
    {
    	if (is_null( $object )) {
    		$object = new \stdClass();
    	} else $object = $object;

    	return $this->arraySqlToObj( $params, $object );
    }

    public function arraySqlToObj( $params, $object ) 
    {
    	if ( count( $params ) ) {
    		foreach ($params as $key => $value)
    		{
    			if ( is_array($value) )
    			{
    				$object->$key = new \stdClass();
    				$this->arraysSqlToObject($value, $object->$key);
    			}
    			else
    			{
    				$object->$key = $value;
    			}
    		}
    	}
    	return $object;
    }

    public function objectToArray($params , $object = null)
    {
    	# code...
    }
}
?>