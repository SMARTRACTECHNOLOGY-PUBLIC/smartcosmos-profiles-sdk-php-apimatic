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
class QueryBatchesResponseModel implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var array $batchUrns public property
     */
    public $batchUrns;

    /**
     * @todo Write general description for this property
     * @required
     * @var integer $code public property
     */
    public $code;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param array   $batchUrns Initialization value for $this->batchUrns
     * @param integer $code      Initialization value for $this->code
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->batchUrns = func_get_arg(0);
            $this->code      = func_get_arg(1);
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
        $json['batchUrns'] = $this->batchUrns;
        $json['code']      = $this->code;

        return array_merge($json, $this->additionalProperties);
    }
}
