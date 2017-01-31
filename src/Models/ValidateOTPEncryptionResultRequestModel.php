<?php 
/*
 * SMARTCOSMOSProfilesLib
 *
 * This file was automatically generated for SMARTRAC Technology Fletcher, Inc. by APIMATIC v2.0 on 04/01/2016
 */

namespace SMARTCOSMOSProfilesLib\Models;

use JsonSerializable;

class ValidateOTPEncryptionResultRequestModel implements JsonSerializable {
    /**
     * TODO: Write general description for this property
     * @param int $timestamp public property
     */
    protected $timestamp;

    /**
     * TODO: Write general description for this property
     * @param string $otpRequestId public property
     */
    protected $otpRequestId;

    /**
     * TODO: Write general description for this property
     * @param int $otpResult public property
     */
    protected $otpResult;

    /**
     * Constructor to set initial or default values of member properties
	 * @param   int               $timestamp      Initialization value for the property $this->timestamp   
	 * @param   string            $otpRequestId   Initialization value for the property $this->otpRequestId
	 * @param   int               $otpResult      Initialization value for the property $this->otpResult   
     */
    public function __construct()
    {
        if(3 == func_num_args())
        {
            $this->timestamp    = func_get_arg(0);
            $this->otpRequestId = func_get_arg(1);
            $this->otpResult    = func_get_arg(2);
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
        $json['timestamp']    = $this->timestamp;
        $json['otpRequestId'] = $this->otpRequestId;
        $json['otpResult']    = $this->otpResult;
        return $json;
    }
}