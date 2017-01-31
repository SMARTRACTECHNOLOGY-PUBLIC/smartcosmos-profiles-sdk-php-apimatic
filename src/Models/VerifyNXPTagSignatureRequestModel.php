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
class VerifyNXPTagSignatureRequestModel implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var string $signature public property
     */
    public $signature;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $tagId public property
     */
    public $tagId;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $tagVersion public property
     */
    public $tagVersion;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $signature  Initialization value for $this->signature
     * @param string $tagId      Initialization value for $this->tagId
     * @param string $tagVersion Initialization value for $this->tagVersion
     */
    public function __construct()
    {
        if (3 == func_num_args()) {
            $this->signature  = func_get_arg(0);
            $this->tagId      = func_get_arg(1);
            $this->tagVersion = func_get_arg(2);
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
        $json['signature']  = $this->signature;
        $json['tagId']      = $this->tagId;
        $json['tagVersion'] = $this->tagVersion;

        return array_merge($json, $this->additionalProperties);
    }
}
