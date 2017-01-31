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
class GetTagDeliveryNetworkDataResponseModel implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var integer $code public property
     */
    public $code;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $value public property
     */
    public $value;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $code  Initialization value for $this->code
     * @param string  $value Initialization value for $this->value
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->code  = func_get_arg(0);
            $this->value = func_get_arg(1);
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
        $json['code']  = $this->code;
        $json['value'] = $this->value;

        return array_merge($json, $this->additionalProperties);
    }
}
