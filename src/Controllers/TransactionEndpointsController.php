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
class TransactionEndpointsController {
    /**
     * ### Idempotent Behaviour
     * This endpoint is idempotent and will respond with an appropriate HTTP status code to indicate the actual result
     * ### Input parameters:
     * - [[account, objects[], objectAddresses[], metadata[], relationships[], [...], ...]
     * ### Output parameters:
     * - code (Number, `0`) ... Indicates the result code of this call (see `result codes`)
     * - message (string, `11e5d3f6-0c65-7791-917a-e95d5a282bcb`) ... System-generated Transaction ID, as used in all logging
     * ### Input HTTP Headers:
     * - HTTP Basic Authorization (as specified above)
     * ### HTTP result codes
     * This endpoint will respond with an appropriate HTTP status code to indicate the actual result
     * - **200 SUCCESS** the insertion was successful. The UUID in the message string of the response body is system-generated transaction ID, which can be helpful for logging.
     * - **400 BAD_REQUEST** problem occurred, check message parameter for detailed information, including an approximate count of elements processed before the error occurred.
     * - **401 UNAUTHORIZED** user not authorized
     * @param  array      $body                       Required parameter: TODO: type description here
     * @param  string     $transactionHandlerName     Required parameter: TODO: type description here
     * @return mixed response from the API call*/
    public function createTransactionallyInsertOrUpdateDataProvidedInRequestMessageBodyIntoTheDatastore (
                $body,
                $transactionHandlerName) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/rest/transaction/{transactionHandlerName}';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'transactionHandlerName' => $transactionHandlerName,
            ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'           => 'SMARTCOSMOS SDK 1.0',
            'Accept'               => 'application/json',
            'content-type'         => 'application/json; charset=utf-8'
        );

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($body), Configuration::$basicAuthUserName, Configuration::$basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new APIException('Unexpected error in API call. See HTTP response body for details.', 400, $response->body);
        }

        else if ($response->code == 401) {
            throw new APIException('', 401, $response->body);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
}