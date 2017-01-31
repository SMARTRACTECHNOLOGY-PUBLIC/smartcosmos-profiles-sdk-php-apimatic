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
class TagAuthenticationEndpointsController {
    /**
     * OTP (One-Time Password) Authentication is performed in three steps:
     *  1. Retrieve an authentication challenge for the given tag
     *     in: tagId, appId
     *     out: otpRequestId, otpVector
     *  2. Calculate the OTP encryption result on the client
     *  3. Send the OTP encryption result to the service
     *     in: tagId, otpRequestId, otpResult
     *     out: verification result
     * Get an authentication challenge to authenticate a tag identified by its tag ID using an OTP init vector
     * and a key. The authentication session is valid for 60 seconds.
     * ### Idempotent Behaviour
     * This endpoint is idempotent and will respond with an appropriate HTTP status code to indicate the actual result
     * - **200 OK** tags found and result available (also returned if only a subset of tags have this keys)
     * - **400 BAD_REQUEST** problem occurred, check message parameter for detailed information
     * - **401 UNAUTHORIZED** user not authorized
     * - **404 NOT_FOUND** no matching tags found or none the tags found does support OTP authentication
     * ### Input parameters:
     * - tagId (required, string, `0EEEE100000001`) ... Identifier for the tag
     * - appId (optional, string, `OTP`) ... Identifier for the requested application (used for multi application RFID tags)
     * ### Output parameters:
     * - code (Number, `0`) ... Indicates the result code of this call (see `result codes`)
     * - message (string, `Verification successful`) ... Result message
     * - tagId (string, `0EEEE100000001`) ... tag ID
     * - otpRequestId (string, `urn:uuid:82b3a00c-e1b0-44cb-a50d-7705e1c6e2b4`) ... Identifier to track the authentication flow
     * - otpVector (byte[], `MzMEOwsSAkYTBRUTPjpGJRIsLgE=`) ... Generated OTP init vector to calculate the OTP result
     * @param  GetOTPAuthenticationChallengeRequestModel     $body     Required parameter: TODO: type description here
     * @return mixed response from the API call*/
    public function createGetOTPAuthenticationChallenge (
                $body) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/rest/tag/auth/otp/request';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'SMARTCOSMOS SDK 1.0',
            'Accept'        => 'application/json',
            'content-type'  => 'application/json; charset=utf-8'
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

        else if ($response->code == 404) {
            throw new APIException('Unexpected error in API call. See HTTP response body for details.', 404, $response->body);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Validate the OTP authentication attempt based on the OTP init vactor identified by UUID.
     * ### Idempotent Behaviour
     * This endpoint is idempotent and will respond with an appropriate HTTP status code to indicate the actual result
     * - **200 OK** authentication successful
     * - **400 BAD_REQUEST** authentication failed
     * - **401 UNAUTHORIZED** user not authorized
     * - **404 NOT_FOUND** invalid session or session expired
     * ### Input parameters:
     * - timestamp (required, long, `1430911319542`) ... UTC timestamp used by the client to calculate the OTP
     * - otpRequestId (required, string, `urn:uuid:82b3a00c-e1b0-44cb-a50d-7705e1c6e2b4`) ... Server side generated id to track the authentication flow
     * - otpResult (required, int, `123456`) ... Generated OTP from HMAC according to RFC 6238
     * ### Output parameters:
     * - code (Number, `0`) ... Indicates the result code of this call (see `result codes`)
     * - message (string, `Verification successful`) ... Result message
     * - tagId (string, `0EEEE100000001`) ... tag ID
     * @param  ValidateOTPEncryptionResultRequestModel     $body     Required parameter: TODO: type description here
     * @return mixed response from the API call*/
    public function createValidateOTPEncryptionResult (
                $body) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/rest/tag/auth/otp/validate';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'SMARTCOSMOS SDK 1.0',
            'Accept'        => 'application/json',
            'content-type'  => 'application/json; charset=utf-8'
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

        else if ($response->code == 404) {
            throw new APIException('Unexpected error in API call. See HTTP response body for details.', 404, $response->body);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Verify the signature of NXP NTAG, Mifare Ultralight EV1 or I-Code SLIX2 tags. The signature could be obtained
     * from the NXP tag by issuing a READ_SIG command. To use the correct verification key, it is also
     * required to submit the tag version, which could be acquired by issuing a GET_VERSION command.
     * The signature is verified in Profiles by ECDSA using the public key from NXP.
     * Following NXP chip types are supported:
     * - NXP NTAG
     * - NXP Mifare Ultralight EV1
     * - NXP I-Code SLIX2
     * ### Note on tagVersion
     * - For NTAG and Ultralight it is required to provide the GET_VERSION response to locate the correct verification key
     * - For I-Code the *tagVersion* could be ommitted, because the verification key is derived from the UID directly
     * ### Idempotent Behaviour
     * This endpoint is idempotent and will respond with an appropriate HTTP status code to indicate the actual result
     * - **200 OK** signature valid
     * - **400 BAD_REQUEST** signature invalid
     * - **401 UNAUTHORIZED** user not authorized
     * ### Input parameters:
     * - tagId (required, string, `04001122334455`) ... NXP tag UID
     * - tagVersion (optional, string, `0004040201000F03`) ... NXP GET_VERSION response
     * - signature (required, string, `MTIzNDU2NzgxMjM0NTY3ODEyMzQ1Njc4MTIzNDU2Nzg=`) ... signature read from the chip (Base64 encoded)
     * ### Output parameters:
     * - code (Number, `0`) ... Indicates the result code of this call (see `result codes`)
     * - message (string, `Verification successful`) ... Result message
     * - tagId (string, `04001122334455`) ... NXP tag UID
     * @param  VerifyNXPTagSignatureRequestModel     $body     Required parameter: TODO: type description here
     * @return mixed response from the API call*/
    public function createVerifyNXPTagSignature (
                $body) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/rest/tag/auth/nxp';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'SMARTCOSMOS SDK 1.0',
            'Accept'        => 'application/json',
            'content-type'  => 'application/json; charset=utf-8'
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