<?php 
/*
 * SMARTCOSMOSProfilesLib
 *
 * This file was automatically generated for SMARTRAC Technology Fletcher, Inc. by APIMATIC v2.0 on 04/01/2016
 */

namespace SMARTCOSMOSProfilesLib\Models;

use JsonSerializable;

class VerifyTagsForAVerificationTypeRequestModel implements JsonSerializable {
    /**
     * TODO: Write general description for this property
     * @param array $tagIds public property
     */
    protected $tagIds;

    /**
     * TODO: Write general description for this property
     * @param string $verificationType public property
     */
    protected $verificationType;

    /**
     * Constructor to set initial or default values of member properties
	 * @param   array             $tagIds             Initialization value for the property $this->tagIds          
	 * @param   string            $verificationType   Initialization value for the property $this->verificationType
     */
    public function __construct()
    {
        if(2 == func_num_args())
        {
            $this->tagIds           = func_get_arg(0);
            $this->verificationType = func_get_arg(1);
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
        $json['tagIds']           = $this->tagIds;
        $json['verificationType'] = $this->verificationType;
        return $json;
    }
}