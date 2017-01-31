<?php 
/*
 * SMARTCOSMOSProfilesLib
 *
 * This file was automatically generated for SMARTRAC Technology Fletcher, Inc. by APIMATIC v2.0 on 04/01/2016
 */

namespace SMARTCOSMOSProfilesLib\Models;

use JsonSerializable;

class TransactionallyInsertOrUpdateDataProvidedInRequestMessageBodyIntoTheDatastoreRequestModel implements JsonSerializable {
    /**
     * TODO: Write general description for this property
     * @param mixed $account public property
     */
    protected $account;

    /**
     * TODO: Write general description for this property
     * @param array $objects public property
     */
    protected $objects;

    /**
     * TODO: Write general description for this property
     * @param array $objectAddresses public property
     */
    protected $objectAddresses;

    /**
     * TODO: Write general description for this property
     * @param array $relationships public property
     */
    protected $relationships;

    /**
     * TODO: Write general description for this property
     * @param array $metadata public property
     */
    protected $metadata;

    /**
     * Constructor to set initial or default values of member properties
	 * @param   mixed             $account           Initialization value for the property $this->account        
	 * @param   array             $objects           Initialization value for the property $this->objects        
	 * @param   array             $objectAddresses   Initialization value for the property $this->objectAddresses
	 * @param   array             $relationships     Initialization value for the property $this->relationships  
	 * @param   array             $metadata          Initialization value for the property $this->metadata       
     */
    public function __construct()
    {
        if(5 == func_num_args())
        {
            $this->account         = func_get_arg(0);
            $this->objects         = func_get_arg(1);
            $this->objectAddresses = func_get_arg(2);
            $this->relationships   = func_get_arg(3);
            $this->metadata        = func_get_arg(4);
        }
    }

    /**
     * Return a property of the response if it exists.
     * Possibilities include: code, raw_body, headers, body (if the response is json-decodable)
     * @return mixed
     */
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            //UTF-8 is recommended for correct JSON serialization
            $value = $this->$property;
            if (is_string($value) && mb_detect_encoding($value, "UTF-8", TRUE) != "UTF-8") {
                return utf8_encode($value);
            }
            else {
                return $value;
            }
        }
    }
    
    /**
     * Set the properties of this object
     * @param string $property the property name
     * @param mixed $value the property value
     */
    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            //UTF-8 is recommended for correct JSON serialization
            if (is_string($value) && mb_detect_encoding($value, "UTF-8", TRUE) != "UTF-8") {
                $this->$property = utf8_encode($value);
            }
            else {
                $this->$property = $value;
            }
        }

        return $this;
    }

    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['account']         = $this->account;
        $json['objects']         = $this->objects;
        $json['objectAddresses'] = $this->objectAddresses;
        $json['relationships']   = $this->relationships;
        $json['metadata']        = $this->metadata;
        return $json;
    }
}