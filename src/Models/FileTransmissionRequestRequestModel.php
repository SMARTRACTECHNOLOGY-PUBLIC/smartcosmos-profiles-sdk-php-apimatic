<?php
/*
 * SMARTCOSMOSProfilesLib
 *
 * This file was automatically generated for SMARTRAC Technology Fletcher, Inc. by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace SMARTCOSMOSProfilesLib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class FileTransmissionRequestRequestModel implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var integer $contentLength public property
     */
    public $contentLength;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $md5Checksum public property
     */
    public $md5Checksum;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $mimeType public property
     */
    public $mimeType;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $routingUrn public property
     */
    public $routingUrn;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $contentLength Initialization value for $this->contentLength
     * @param string  $md5Checksum   Initialization value for $this->md5Checksum
     * @param string  $mimeType      Initialization value for $this->mimeType
     * @param string  $routingUrn    Initialization value for $this->routingUrn
     */
    public function __construct()
    {
        if (4 == func_num_args()) {
            $this->contentLength = func_get_arg(0);
            $this->md5Checksum   = func_get_arg(1);
            $this->mimeType      = func_get_arg(2);
            $this->routingUrn    = func_get_arg(3);
        }
    }

    
    /**
     * Add an additional property to this model.
     * @param string $name  Name of property
     * @param mixed $value Value of property
     */
    public function addAdditionalProperty($name, $value)
    {
        $this->additionalProperties[$name] = $value;
    }

    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['contentLength'] = $this->contentLength;
        $json['md5Checksum']   = $this->md5Checksum;
        $json['mimeType']      = $this->mimeType;
        $json['routingUrn']    = $this->routingUrn;

        return array_merge($json, $this->additionalProperties);
    }
}
