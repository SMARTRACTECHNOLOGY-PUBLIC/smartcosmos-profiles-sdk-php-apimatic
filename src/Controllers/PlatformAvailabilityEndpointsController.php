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
class PlatformAvailabilityEndpointsController extends BaseController
{
    /**
     * @var PlatformAvailabilityEndpointsController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return PlatformAvailabilityEndpointsController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * Resource for checking the platform availability.
     * ### HTTP result codes
     * This endpoint will respond with an appropriate HTTP status code to indicate the actual result
     * - **204 NO_CONTENT** platform is available
     * - **400 BAD_REQUEST** problem occurred, check message parameter for detailed information
     * - **503 SERVICE_UNAVAILABLE** service is temporary unavailable (e.g. scheduled Platform Maintenance).
     * Try again later.
     *
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getCheckPlatformAvailability()
    {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/rest/test/ping';

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => 'SMARTCOSMOS SDK 1.0',
            'Accept'        => 'application/json'
        );

        //set HTTP basic auth parameters
        Request::auth(Configuration::$basicAuthUserName, Configuration::$basicAuthPassword);

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

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

        if ($response->code == 503) {
            throw new APIException('', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        return $response->body;
    }
}
