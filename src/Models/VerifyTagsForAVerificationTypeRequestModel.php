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
class VerifyTagsForAVerificationTypeRequestModel implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var array $tagIds public property
     */
    public $tagIds;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $verificationType public property
     */
    public $verificationType;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param array  $tagIds           Initialization value for $this->tagIds
     * @param string $verificationType Initialization value for $this->verificationType
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->tagIds           = func_get_arg(0);
            $this->verificationType = func_get_arg(1);
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
        $json['tagIds']           = $this->tagIds;
        $json['verificationType'] = $this->verificationType;

        return array_merge($json, $this->additionalProperties);
    }
}
