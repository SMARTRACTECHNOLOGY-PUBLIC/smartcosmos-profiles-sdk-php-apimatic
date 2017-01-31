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
class FileTransmissionRequestResponseModel implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var string $endpointUri public property
     */
    public $endpointUri;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $protocol public property
     */
    public $protocol;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $transmissionUrn public property
     */
    public $transmissionUrn;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $endpointUri     Initialization value for $this->endpointUri
     * @param string $protocol        Initialization value for $this->protocol
     * @param string $transmissionUrn Initialization value for $this->transmissionUrn
     */
    public function __construct()
    {
        if (3 == func_num_args()) {
            $this->endpointUri     = func_get_arg(0);
            $this->protocol        = func_get_arg(1);
            $this->transmissionUrn = func_get_arg(2);
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
        $json['endpointUri']     = $this->endpointUri;
        $json['protocol']        = $this->protocol;
        $json['transmissionUrn'] = $this->transmissionUrn;

        return array_merge($json, $this->additionalProperties);
    }
}
