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
class UpdateTagValuesRequestModel implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var string $appId public property
     */
    public $appId;

    /**
     * @todo Write general description for this property
     * @required
     * @var array $tags public property
     */
    public $tags;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $appId Initialization value for $this->appId
     * @param array  $tags  Initialization value for $this->tags
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->appId = func_get_arg(0);
            $this->tags  = func_get_arg(1);
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
        $json['appId'] = $this->appId;
        $json['tags']  = $this->tags;

        return array_merge($json, $this->additionalProperties);
    }
}
