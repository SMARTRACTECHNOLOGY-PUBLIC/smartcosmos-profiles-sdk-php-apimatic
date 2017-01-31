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
class FileTransmissionReceiptRequestModel implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var string $transmissionResult public property
     */
    public $transmissionResult;

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
     * @param string $transmissionResult Initialization value for $this->transmissionResult
     * @param string $transmissionUrn    Initialization value for $this->transmissionUrn
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->transmissionResult = func_get_arg(0);
            $this->transmissionUrn    = func_get_arg(1);
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
        $json['transmissionResult'] = $this->transmissionResult;
        $json['transmissionUrn']    = $this->transmissionUrn;

        return array_merge($json, $this->additionalProperties);
    }
}
