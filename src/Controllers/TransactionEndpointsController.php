<?php
/*
 * SMARTCOSMOSProfilesLib
 *
 * This file was automatically generated for SMARTRAC Technology Fletcher, Inc. by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace SMARTCOSMOSProfilesLib\Controllers;

use SMARTCOSMOSProfilesLib\APIException;
use SMARTCOSMOSProfilesLib\APIHelper;
use SMARTCOSMOSProfilesLib\Configuration;
use SMARTCOSMOSProfilesLib\Models;
use SMARTCOSMOSProfilesLib\Exceptions;
use SMARTCOSMOSProfilesLib\Http\HttpRequest;
use SMARTCOSMOSProfilesLib\Http\HttpResponse;
use SMARTCOSMOSProfilesLib\Http\HttpMethod;
use SMARTCOSMOSProfilesLib\Http\HttpContext;
use Unirest\Request;

/**
 * @todo Add a general description for this controller.
 */
class TransactionEndpointsController extends BaseController
{
    /**
     * @var TransactionEndpointsController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return TransactionEndpointsController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * ### Idempotent Behaviour
     * This endpoint is idempotent and will respond with an appropriate HTTP status code to indicate the
     * actual result
     * ### Input parameters:
     * - [[account, objects[], objectAddresses[], metadata[], relationships[], [...], ...]
     * ### Output parameters:
     * - code (Number, `0`) ... Indicates the result code of this call (see `result codes`)
     * - message (string, `11e5d3f6-0c65-7791-917a-e95d5a282bcb`) ... System-generated Transaction ID, as
     * used in all logging
     * ### Input HTTP Headers:
     * - HTTP Basic Authorization (as specified above)
     * ### HTTP result codes
     * This endpoint will respond with an appropriate HTTP status code to indicate the actual result
     * - **200 SUCCESS** the insertion was successful. The UUID in the message string of the response body
     * is system-generated transaction ID, which can be helpful for logging.
     * - **400 BAD_REQUEST** problem occurred, check message parameter for detailed information, including
     * an approximate count of elements processed before the error occurred.
     * - **401 UNAUTHORIZED** user not authorized
     *
     * @param array  $body                   TODO: type description here
     * @param string $transactionHandlerName TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function createTransactionallyInsertOrUpdateDataProvidedInRequestMessageBodyIntoTheDatastore(
        $body,
        $transactionHandlerName
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/rest/transaction/{transactionHandlerName}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'transactionHandlerName' => $transactionHandlerName,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'           => 'SMARTCOSMOS SDK 1.0',
            'Accept'               => 'application/json',
            'content-type'         => 'application/json; charset=utf-8'
        );

        //set HTTP basic auth parameters
        Request::auth(Configuration::$basicAuthUserName, Configuration::$basicAuthPassword);

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::post($_queryUrl, $_headers, Request\Body::Json($body));

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new APIException('Unexpected error in API call. See HTTP response body for details.', $_httpContext);
        }

        if ($response->code == 401) {
            throw new APIException('', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->map($response->body, new Models\TransactionallyInsertOrUpdateDataProvidedInRequestMessageBodyIntoTheDatastoreResponseModel());
    }
}
