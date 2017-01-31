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
class TagVerificationEndpointsController extends BaseController
{
    /**
     * @var TagVerificationEndpointsController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return TagVerificationEndpointsController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * Get a message to a single verification state. Translate a numeric verification state into a human
     * readable format. e.g. `0` into `verified`
     * ### Idempotent Behaviour
     * This endpoint is idempotent and will respond with an appropriate HTTP status code to indicate the
     * actual result
     * - **200 OK** tag found and result available
     * - **400 BAD_REQUEST** problem occurred, check message parameter for detailed information
     * - **401 UNAUTHORIZED** user not authorized
     * ### Input HTTP Headers:
     * - HTTP Basic Authorization (as specified above)
     * - Accept language (as specified above)
     * ### Input parameters:
     * - verificationType (required, string, `RR`) ... Identifier of the verification type
     * - verificationState (required, number, `0`) ... State of the verification
     * ### Output parameters:
     * - code (Number, `0`) ... Indicates the result code of this call (see `result codes`)
     * - message (string, `verified`) ... Result message in `Accept-Language` (see `Multi language
     * support`)
     *
     * @param Models\GetVerificationStateMessageRequestModel $body TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function createGetVerificationStateMessage(
        $body
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/rest/verification/message';

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => 'SMARTCOSMOS SDK 1.0',
            'Accept'        => 'application/json',
            'content-type'  => 'application/json; charset=utf-8'
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

        return $mapper->map($response->body, new Models\GetVerificationStateMessageResponseModel());
    }

    /**
     * Verify tags for Round Rock compliance (verification type `RR`)
     * ### Idempotent Behaviour
     * This endpoint is idempotent and will respond with an appropriate HTTP status code to indicate the
     * actual result
     * - **200 OK** tag found and Round Rock compliance result available
     * - **400 BAD_REQUEST** problem occurred, check message parameter for detailed information
     * ### Input parameters:
     * - tagIds (required, array of string, `E12345678912345678`) ... Array of RFID tag identifiers; max
     * 1000 entries allowed
     * ### Output parameters:
     * - code (Number, `0`) ... Indicates the result code of this call (see `result codes`)
     * - tagId (string, `0EEEE100000001`) ... RFID tag identifiers
     * - tagCode (Number, `0`) ... Indicates if the result code for this tag (see `result codes for a tag
     * actions`)
     * - state (Number, `0`) ... Indicates the current RoundRock compliance state (1 = Round Rock licensed;
     * 0 = Not RoundRock licensed)
     * The output contains all desired tag records. Even if the tag is not available or the user does not
     * have permissions. The `tagCode` indicates the result code for each tag.
     *
     * @param Models\VerifyTagsForRoundRockComplianceRequestModel $body TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function createVerifyTagsForRoundRockCompliance(
        $body
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/rest/verification/tags/RR';

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => 'SMARTCOSMOS SDK 1.0',
            'Accept'        => 'application/json',
            'content-type'  => 'application/json; charset=utf-8'
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

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->map($response->body, new Models\VerifyTagsForRoundRockComplianceResponseModel());
    }

    /**
     * Verify tags for a verification type, which is represented by an unique verification id like 'RR'
     * ### Idempotent Behaviour
     * This endpoint is idempotent and will respond with an appropriate HTTP status code to indicate the
     * actual result
     * - **200 OK** tag found and verification result available
     * - **400 BAD_REQUEST** problem occurred, check message parameter for detailed information
     * - **401 UNAUTHORIZED** user not authorized
     * ### Input HTTP Headers:
     * - HTTP Basic Authorization (as specified above)
     * ### Input parameters:
     * - tagIds (required, array of string, `E12345678912345678`) ... Array of RFID tag identifiers; max
     * 1000 entries allowed
     * - verificationType (required, String, `RR`) ... Verification type
     * ### Output parameters:
     * - code (Number, `0`) ... Indicates the result code of this call (see `result codes`)
     * - tagId (string, `0EEEE100000001`) ... RFID tag identifiers
     * - tagCode (Number, `0`) ... Indicates if the result code for this tag (see `Possible result codes
     * for a tag actions`)
     * - state (Number, `0`) ... Indicates the current verification state; Number depends on verification
     * type; Use the message function to get a string message
     * The output contains all desired tag records. Even if the tag is not available or the user does not
     * have permissions. The `tagCode` indicates the result code for each tag.
     *
     * @param Models\VerifyTagsForAVerificationTypeRequestModel $body TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function createVerifyTagsForAVerificationType(
        $body
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/rest/verification/tags';

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => 'SMARTCOSMOS SDK 1.0',
            'Accept'        => 'application/json',
            'content-type'  => 'application/json; charset=utf-8'
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

        return $mapper->map($response->body, new Models\VerifyTagsForAVerificationTypeResponseModel());
    }
}
