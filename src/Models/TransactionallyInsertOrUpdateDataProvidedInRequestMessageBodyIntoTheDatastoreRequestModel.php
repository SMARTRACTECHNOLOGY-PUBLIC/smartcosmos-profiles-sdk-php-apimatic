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
class TransactionallyInsertOrUpdateDataProvidedInRequestMessageBodyIntoTheDatastoreRequestModel implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var object $account public property
     */
    public $account;

    /**
     * @todo Write general description for this property
     * @required
     * @var array $metadata public property
     */
    public $metadata;

    /**
     * @todo Write general description for this property
     * @required
     * @var array $objectAddresses public property
     */
    public $objectAddresses;

    /**
     * @todo Write general description for this property
     * @required
     * @var array $objects public property
     */
    public $objects;

    /**
     * @todo Write general description for this property
     * @required
     * @var array $relationships public property
     */
    public $relationships;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param object $account         Initialization value for $this->account
     * @param array  $metadata        Initialization value for $this->metadata
     * @param array  $objectAddresses Initialization value for $this->objectAddresses
     * @param array  $objects         Initialization value for $this->objects
     * @param array  $relationships   Initialization value for $this->relationships
     */
    public function __construct()
    {
        if (5 == func_num_args()) {
            $this->account         = func_get_arg(0);
            $this->metadata        = func_get_arg(1);
            $this->objectAddresses = func_get_arg(2);
            $this->objects         = func_get_arg(3);
            $this->relationships   = func_get_arg(4);
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
        $json['account']         = $this->account;
        $json['metadata']        = $this->metadata;
        $json['objectAddresses'] = $this->objectAddresses;
        $json['objects']         = $this->objects;
        $json['relationships']   = $this->relationships;

        return array_merge($json, $this->additionalProperties);
    }
}
