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
class GetTagMetadataDefinitionResponseModel implements JsonSerializable
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
     * @var array $properties public property
     */
    public $properties;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $tagId public property
     */
    public $tagId;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $code       Initialization value for $this->code
     * @param array   $properties Initialization value for $this->properties
     * @param string  $tagId      Initialization value for $this->tagId
     */
    public function __construct()
    {
        if (3 == func_num_args()) {
            $this->code       = func_get_arg(0);
            $this->properties = func_get_arg(1);
            $this->tagId      = func_get_arg(2);
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
        $json['code']       = $this->code;
        $json['properties'] = $this->properties;
        $json['tagId']      = $this->tagId;

        return array_merge($json, $this->additionalProperties);
    }
}
