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
class ValidateOTPEncryptionResultRequestModel implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var string $otpRequestId public property
     */
    public $otpRequestId;

    /**
     * @todo Write general description for this property
     * @required
     * @var integer $otpResult public property
     */
    public $otpResult;

    /**
     * @todo Write general description for this property
     * @required
     * @var integer $timestamp public property
     */
    public $timestamp;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string  $otpRequestId Initialization value for $this->otpRequestId
     * @param integer $otpResult    Initialization value for $this->otpResult
     * @param integer $timestamp    Initialization value for $this->timestamp
     */
    public function __construct()
    {
        if (3 == func_num_args()) {
            $this->otpRequestId = func_get_arg(0);
            $this->otpResult    = func_get_arg(1);
            $this->timestamp    = func_get_arg(2);
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
        $json['otpRequestId'] = $this->otpRequestId;
        $json['otpResult']    = $this->otpResult;
        $json['timestamp']    = $this->timestamp;

        return array_merge($json, $this->additionalProperties);
    }
}
