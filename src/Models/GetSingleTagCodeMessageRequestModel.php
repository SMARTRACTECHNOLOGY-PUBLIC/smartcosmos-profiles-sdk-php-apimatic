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
class GetSingleTagCodeMessageRequestModel implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var integer $tagCode public property
     */
    public $tagCode;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $tagCode Initialization value for $this->tagCode
     */
    public function __construct()
    {
        if (1 == func_num_args()) {
            $this->tagCode = func_get_arg(0);
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
        $json['tagCode'] = $this->tagCode;

        return array_merge($json, $this->additionalProperties);
    }
}
