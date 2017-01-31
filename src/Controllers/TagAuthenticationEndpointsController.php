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
class TagAuthenticationEndpointsController extends BaseController
{
    /**
     * @var TagAuthenticationEndpointsController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return TagAuthenticationEndpointsController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * OTP (One-Time Password) Authentication is performed in three steps:
     * 1. Retrieve an authentication challenge for the given tag
     * in: tagId, appId
     * out: otpRequestId, otpVector
     * 2. Calculate the OTP encryption result on the client
     * 3. Send the OTP encryption result to the service
     * in: tagId, otpRequestId, otpResult
     * out: verification result
     * Get an authentication challenge to authenticate a tag identified by its tag ID using an OTP init
     * vector
     * and a key. The authentication session is valid for 60 seconds.
     * ### Idempotent Behaviour
     * This endpoint is idempotent and will respond with an appropriate HTTP status code to indicate the
     * actual result
     * - **200 OK** tags found and result available (also returned if only a subset of tags have this
     * keys)
     * - **400 BAD_REQUEST** problem occurred, check message parameter for detailed information
     * - **401 UNAUTHORIZED** user not authorized
     * - **404 NOT_FOUND** no matching tags found or none the tags found does support OTP authentication
     * ### Input parameters:
     * - tagId (required, string, `0EEEE100000001`) ... Identifier for the tag
     * - appId (optional, string, `OTP`) ... Identifier for the requested application (used for multi
     * application RFID tags)
     * ### Output parameters:
     * - code (Number, `0`) ... Indicates the result code of this call (see `result codes`)
     * - message (string, `Verification successful`) ... Result message
     * - tagId (string, `0EEEE100000001`) ... tag ID
     * - otpRequestId (string, `urn:uuid:82b3a00c-e1b0-44cb-a50d-7705e1c6e2b4`) ... Identifier to track the
     * authentication flow
     * - otpVector (byte[], `MzMEOwsSAkYTBRUTPjpGJRIsLgE=`) ... Generated OTP init vector to calculate the
     * OTP result
     *
     * @param Models\GetOTPAuthenticationChallengeRequestModel $body TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function createGetOTPAuthenticationChallenge(
        $body
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/rest/tag/auth/otp/request';

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

        if ($response->code == 404) {
            throw new APIException('Unexpected error in API call. See HTTP response body for details.', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->map($response->body, new Models\GetOTPAuthenticationChallengeResponseModel());
    }

    /**
     * Verify the signature of NXP NTAG, Mifare Ultralight EV1 or I-Code SLIX2 tags. The signature could be
     * obtained
     * from the NXP tag by issuing a READ_SIG command. To use the correct verification key, it is also
     * required to submit the tag version, which could be acquired by issuing a GET_VERSION command.
     * The signature is verified in Profiles by ECDSA using the public key from NXP.
     * Following NXP chip types are supported:
     * - NXP NTAG
     * - NXP Mifare Ultralight EV1
     * - NXP I-Code SLIX2
     * ### Note on tagVersion
     * - For NTAG and Ultralight it is required to provide the GET_VERSION response to locate the correct
     * verification key
     * - For I-Code the *tagVersion* could be ommitted, because the verification key is derived from the
     * UID directly
     * ### Idempotent Behaviour
     * This endpoint is idempotent and will respond with an appropriate HTTP status code to indicate the
     * actual result
     * - **200 OK** signature valid
     * - **400 BAD_REQUEST** signature invalid
     * - **401 UNAUTHORIZED** user not authorized
     * ### Input parameters:
     * - tagId (required, string, `04001122334455`) ... NXP tag UID
     * - tagVersion (optional, string, `0004040201000F03`) ... NXP GET_VERSION response
     * - signature (required, string, `MTIzNDU2NzgxMjM0NTY3ODEyMzQ1Njc4MTIzNDU2Nzg=`) ... signature read
     * from the chip (Base64 encoded)
     * ### Output parameters:
     * - code (Number, `0`) ... Indicates the result code of this call (see `result codes`)
     * - message (string, `Verification successful`) ... Result message
     * - tagId (string, `04001122334455`) ... NXP tag UID
     *
     * @param Models\VerifyNXPTagSignatureRequestModel $body TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function createVerifyNXPTagSignature(
        $body
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/rest/tag/auth/nxp';

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

        return $mapper->map($response->body, new Models\VerifyNXPTagSignatureResponseModel());
    }

    /**
     * Validate the OTP authentication attempt based on the OTP init vactor identified by UUID.
     * ### Idempotent Behaviour
     * This endpoint is idempotent and will respond with an appropriate HTTP status code to indicate the
     * actual result
     * - **200 OK** authentication successful
     * - **400 BAD_REQUEST** authentication failed
     * - **401 UNAUTHORIZED** user not authorized
     * - **404 NOT_FOUND** invalid session or session expired
     * ### Input parameters:
     * - timestamp (required, long, `1430911319542`) ... UTC timestamp used by the client to calculate the
     * OTP
     * - otpRequestId (required, string, `urn:uuid:82b3a00c-e1b0-44cb-a50d-7705e1c6e2b4`) ... Server side
     * generated id to track the authentication flow
     * - otpResult (required, int, `123456`) ... Generated OTP from HMAC according to RFC 6238
     * ### Output parameters:
     * - code (Number, `0`) ... Indicates the result code of this call (see `result codes`)
     * - message (string, `Verification successful`) ... Result message
     * - tagId (string, `0EEEE100000001`) ... tag ID
     *
     * @param Models\ValidateOTPEncryptionResultRequestModel $body TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function createValidateOTPEncryptionResult(
        $body
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/rest/tag/auth/otp/validate';

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

        if ($response->code == 404) {
            throw new APIException('Unexpected error in API call. See HTTP response body for details.', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->map($response->body, new Models\ValidateOTPEncryptionResultResponseModel());
    }
}
