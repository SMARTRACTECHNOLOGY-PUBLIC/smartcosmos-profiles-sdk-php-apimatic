<?php 
/*
 * SMARTCOSMOSProfilesLib
 *
 * This file was automatically generated for SMARTRAC Technology Fletcher, Inc. by APIMATIC v2.0 on 04/01/2016
 */

namespace SMARTCOSMOSProfilesLib\Models;

use JsonSerializable;

class FileTransmissionRequestRequestModel implements JsonSerializable {
    /**
     * TODO: Write general description for this property
     * @param string $routingUrn public property
     */
    protected $routingUrn;

    /**
     * TODO: Write general description for this property
     * @param string $md5Checksum public property
     */
    protected $md5Checksum;

    /**
     * TODO: Write general description for this property
     * @param string $mimeType public property
     */
    protected $mimeType;

    /**
     * TODO: Write general description for this property
     * @param int $contentLength public property
     */
    protected $contentLength;

    /**
     * Constructor to set initial or default values of member properties
	 * @param   string            $routingUrn      Initialization value for the property $this->routingUrn   
	 * @param   string            $md5Checksum     Initialization value for the property $this->md5Checksum  
	 * @param   string            $mimeType        Initialization value for the property $this->mimeType     
	 * @param   int               $contentLength   Initialization value for the property $this->contentLength
     */
    public function __construct()
    {
        if(4 == func_num_args())
        {
            $this->routingUrn    = func_get_arg(0);
            $this->md5Checksum   = func_get_arg(1);
            $this->mimeType      = func_get_arg(2);
            $this->contentLength = func_get_arg(3);
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
        $json['routingUrn']    = $this->routingUrn;
        $json['md5Checksum']   = $this->md5Checksum;
        $json['mimeType']      = $this->mimeType;
        $json['contentLength'] = $this->contentLength;
        return $json;
    }
}