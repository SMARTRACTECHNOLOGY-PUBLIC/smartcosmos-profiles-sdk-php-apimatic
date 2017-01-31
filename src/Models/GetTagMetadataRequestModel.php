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
class GetTagMetadataRequestModel implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var array $properties public property
     */
    public $properties;

    /**
     * @todo Write general description for this property
     * @required
     * @var array $tagIds public property
     */
    public $tagIds;

    /**
     * @todo Write general description for this property
     * @required
     * @var array $verificationTypes public property
     */
    public $verificationTypes;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param array $properties        Initialization value for $this->properties
     * @param array $tagIds            Initialization value for $this->tagIds
     * @param array $verificationTypes Initialization value for $this->verificationTypes
     */
    public function __construct()
    {
        if (3 == func_num_args()) {
            $this->properties        = func_get_arg(0);
            $this->tagIds            = func_get_arg(1);
            $this->verificationTypes = func_get_arg(2);
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
        $json['properties']        = $this->properties;
        $json['tagIds']            = $this->tagIds;
        $json['verificationTypes'] = $this->verificationTypes;

        return array_merge($json, $this->additionalProperties);
    }
}
