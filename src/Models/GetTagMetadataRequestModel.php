<?php 
/*
 * SMARTCOSMOSProfilesLib
 *
 * This file was automatically generated for SMARTRAC Technology Fletcher, Inc. by APIMATIC v2.0 on 04/01/2016
 */

namespace SMARTCOSMOSProfilesLib\Models;

use JsonSerializable;

class GetTagMetadataRequestModel implements JsonSerializable {
    /**
     * TODO: Write general description for this property
     * @param array $tagIds public property
     */
    protected $tagIds;

    /**
     * TODO: Write general description for this property
     * @param array $verificationTypes public property
     */
    protected $verificationTypes;

    /**
     * TODO: Write general description for this property
     * @param array $properties public property
     */
    protected $properties;

    /**
     * Constructor to set initial or default values of member properties
	 * @param   array             $tagIds              Initialization value for the property $this->tagIds           
	 * @param   array             $verificationTypes   Initialization value for the property $this->verificationTypes
	 * @param   array             $properties          Initialization value for the property $this->properties       
     */
    public function __construct()
    {
        if(3 == func_num_args())
        {
            $this->tagIds            = func_get_arg(0);
            $this->verificationTypes = func_get_arg(1);
            $this->properties        = func_get_arg(2);
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
        $json['tagIds']            = $this->tagIds;
        $json['verificationTypes'] = $this->verificationTypes;
        $json['properties']        = $this->properties;
        return $json;
    }
}