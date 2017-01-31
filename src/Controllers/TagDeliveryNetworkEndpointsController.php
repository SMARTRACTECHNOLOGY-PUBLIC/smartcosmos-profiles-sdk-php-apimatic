<?php
/*
 * SMARTCOSMOSProfilesLib
 *
 * This file was automatically generated for SMARTRAC Technology Fletcher, Inc. by APIMATIC v2.0 on 04/01/2016
 */

namespace SMARTCOSMOSProfilesLib\Controllers;

use SMARTCOSMOSProfilesLib\APIException;
use SMARTCOSMOSProfilesLib\APIHelper;
use SMARTCOSMOSProfilesLib\Configuration;
use Unirest\Unirest;
class TagDeliveryNetworkEndpointsController {
    /**
     * **DRAFT** - Under development
     * Get TDN data for a tag. The TDN data is proprietary and needs the SMART COSMOS TDN client
     * service on the REST client for decoding. The endpoint will report "404 Not found" for all
     * tags with no TDN data attached (so it is not possible to probe the Profiles instance for 
     * no-TDN tag IDs without authorization).
     * ### Notes
     *  - Public endpoint (no authorization needed)
     *  - If a secure endpoint is needed, it is possible to disable this endpoint and use GetTagValue with "TDN" as appId instead.
     * ### Idempotent Behaviour
     * This endpoint is idempotent and will respond with an appropriate HTTP status code to indicate
     * the actual result.
     * - **200 OK** valid TDN tag ID
     * - **404 NOT_FOUND** invalid tag ID (tag not available or no TDN data attached)
     * ### Output parameters:
     * - code (Number, `0`) ... Indicates the result code of this call (see `result codes`)
     * - value (string, `54646E50726F707269657461727944617461`) ... TDN data (AsciiHex encoded)
     * @param  string     $tagId     Required parameter: TODO: type description here
     * @return mixed response from the API call*/
    public function getTagDeliveryNetworkData (
                $tagId) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/rest/tag/tdn/{tagId}';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'tagId' => $tagId,
            ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'SMARTCOSMOS SDK 1.0',
            'Accept'        => 'application/json'
        );

        //prepare API request
        $request = Unirest::get($queryUrl, $headers, NULL, Configuration::$basicAuthUserName, Configuration::$basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if ($response->code == 404) {
            throw new APIException('', 404, $response->body);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
}