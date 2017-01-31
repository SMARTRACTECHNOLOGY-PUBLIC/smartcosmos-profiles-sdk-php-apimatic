<?php
/*
 * SMARTCOSMOSProfilesLib
 *
 * This file was automatically generated for SMARTRAC Technology Fletcher, Inc. by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace SMARTCOSMOSProfilesLib;

use SMARTCOSMOSProfilesLib\Controllers;

/**
 * SMARTCOSMOSProfilesLib client class
 */
class SMARTCOSMOSProfilesClient
{
    /**
     * Constructor with authentication and configuration parameters
     */
    public function __construct(
        $basicAuthUserName = null,
        $basicAuthPassword = null
    ) {
        Configuration::$basicAuthUserName = $basicAuthUserName ? $basicAuthUserName : Configuration::$basicAuthUserName;
        Configuration::$basicAuthPassword = $basicAuthPassword ? $basicAuthPassword : Configuration::$basicAuthPassword;
    }
 
    /**
     * Singleton access to DataImportEndpoints controller
     * @return Controllers\DataImportEndpointsController The *Singleton* instance
     */
    public function getDataImportEndpoints()
    {
        return Controllers\DataImportEndpointsController::getInstance();
    }
 
    /**
     * Singleton access to TagDataEndpoints controller
     * @return Controllers\TagDataEndpointsController The *Singleton* instance
     */
    public function getTagDataEndpoints()
    {
        return Controllers\TagDataEndpointsController::getInstance();
    }
 
    /**
     * Singleton access to TagDeliveryNetworkEndpoints controller
     * @return Controllers\TagDeliveryNetworkEndpointsController The *Singleton* instance
     */
    public function getTagDeliveryNetworkEndpoints()
    {
        return Controllers\TagDeliveryNetworkEndpointsController::getInstance();
    }
 
    /**
     * Singleton access to TransactionEndpoints controller
     * @return Controllers\TransactionEndpointsController The *Singleton* instance
     */
    public function getTransactionEndpoints()
    {
        return Controllers\TransactionEndpointsController::getInstance();
    }
 
    /**
     * Singleton access to TagAuthenticationEndpoints controller
     * @return Controllers\TagAuthenticationEndpointsController The *Singleton* instance
     */
    public function getTagAuthenticationEndpoints()
    {
        return Controllers\TagAuthenticationEndpointsController::getInstance();
    }
 
    /**
     * Singleton access to TagVerificationEndpoints controller
     * @return Controllers\TagVerificationEndpointsController The *Singleton* instance
     */
    public function getTagVerificationEndpoints()
    {
        return Controllers\TagVerificationEndpointsController::getInstance();
    }
 
    /**
     * Singleton access to PlatformAvailabilityEndpoints controller
     * @return Controllers\PlatformAvailabilityEndpointsController The *Singleton* instance
     */
    public function getPlatformAvailabilityEndpoints()
    {
        return Controllers\PlatformAvailabilityEndpointsController::getInstance();
    }
}
