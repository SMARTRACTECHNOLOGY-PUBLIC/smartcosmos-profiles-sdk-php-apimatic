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
class TagDataEndpointsController extends BaseController
{
    /**
     * @var TagDataEndpointsController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return TagDataEndpointsController The *Singleton* instance.
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
     * - **200 OK** specified tag was found, result available
     * - **400 BAD_REQUEST** problem occurred, check message parameter for detailed information
     * - **401 UNAUTHORIZED** user not authorized
     * ### Input HTTP Headers:
     * - HTTP Basic Authorization (as specified above)
     * ### Input parameters
     * - tagId (required, string, `E12345678912345678`) ... a single RFID tag identifier
     * - nameLike (optional, string, `chip`) ... Comparison string for metadata properties
     * ### Output parameters
     * - code (Number, `0`) ... Indicates the result code of this call (see `result codes`)
     * - tagId the requested `tagID`
     * - properties an array of JSON objects, each of which contains property ID, property name, property
     * data type, and a flag indicating whether the property exists for the tag.
     *
     * @param string $tagId    TODO: type description here
     * @param string $nameLike (optional) TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getTagMetadataDefinition(
        $tagId,
        $nameLike = null
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/rest/tag/properties/definition/{tagId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'tagId'    => $tagId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'nameLike' => $nameLike,
        ));

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

        if ($response->code == 401) {
            throw new APIException('', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->map($response->body, new Models\GetTagMetadataDefinitionResponseModel());
    }

    /**
     * Look up an array of the first **count** tag IDs with the specified batch URN.
     * ### Output parameters
     * - tagIds (array of string, `E12345678912345678`) ... Array of RFID tag identifiers
     *
     * @param string  $batchUrn Case-sensitive batch URN
     * @param integer $count    (optional) Maximum number of tag IDs to return; defaults to 100000; maximum is 1000000
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getQueryTags(
        $batchUrn,
        $count = 100000
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/rest/tag/queryTags';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'batchUrn' => $batchUrn,
            'count'    => (null != $count) ? $count : 100000,
        ));

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

        if ($response->code == 401) {
            throw new APIException('', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->map($response->body, new Models\QueryTagsResponseModel());
    }

    /**
     * Get a message to a single numeric tag code.
     * ### Idempotent Behaviour
     * This endpoint is idempotent and will respond with an appropriate HTTP status code to indicate the
     * actual result
     * - **200 OK** message available
     * - **400 BAD_REQUEST** problem occurred, check message parameter for detailed information
     * - **401 UNAUTHORIZED** user not authorized
     * ### Input HTTP Headers:
     * - HTTP Basic Authorization (as specified above)
     * - Accept language (as specified above)
     * ### Input parameters:
     * - tagCode (required, number, `0`) ... Result code of a tag action
     * ### Output parameters:
     * - code (Number, `0`) ... Indicates the result code of this call (see `result codes`)
     * - message (string, `verified`) ... Result message in `Accept-Language` (see `Multi language
     * support`)
     *
     * @param Models\GetSingleTagCodeMessageRequestModel $body TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function createGetSingleTagCodeMessage(
        $body
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/rest/tag/message';

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

        return $mapper->map($response->body, new Models\GetSingleTagCodeMessageResponseModel());
    }

    /**
     * Writes application data to tags, which updated the existing application data in Profiles. This
     * function also supports setting the lock state of the application data, which prevents further
     * changes of the application data.
     * Writing application data to a tag is permitted under following conditions only:
     * - The tag with the given tagId must exist in Profiles
     * - The tag must have an application record with the given appId
     * - The lock state of the tag's application data must be present and explicitly set to **false**
     * - To insert a new application record, the data transaction endpoint shall be used
     * **Notes:**
     * - Omitting **value** in the request will update the lock state of the tag only.
     * - Omitting **locked** in the request will write the value only.
     * - It is not possible to unlock a locked tag by setting **locked** to **false**.
     * ### Idempotent Behaviour
     * This endpoint is idempotent and will respond with an appropriate HTTP status code to indicate the
     * actual result
     * - **200 OK** tags found and result available (also returned if only a subset of tags have this
     * keys)
     * - **400 BAD_REQUEST** problem occurred, check message parameter for detailed information
     * - **401 UNAUTHORIZED** user not authorized
     * - **404 NOT_FOUND** no matching tags found or none the tags found do have app IDs with given name
     * ### Input HTTP Headers:
     * - HTTP Basic Authorization (as specified above)
     * - Accept language (as specified above)
     * ### Input parameters:
     * - appId (required, string, `ndef`) ... Application ID which references the data
     * - tagId (required, string, `0EEEE100000001`) ... Identifier for each tag to be updated
     * - value (optional, string, `AQIDBAUGBwgJCgsM`) ... Application data to be updated
     * - locked (optional, boolean, `true`) ... Lock flag to be set
     * ### Output parameters:
     * - code (Number, `0`) ... Indicates the result code of this call (see `result codes`)
     * - tagId (string, `0EEEE100000001`) ... Tag ID
     * - tagCode (Number, `0`) ... Indicates if the result code for this tag (see `Possible result codes
     * for a tag actions`)
     *
     * @param Models\UpdateTagValuesRequestModel $body TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function updateTagValues(
        $body
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/rest/tag/value';

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
        $_httpRequest = new HttpRequest(HttpMethod::PUT, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::put($_queryUrl, $_headers, Request\Body::Json($body));

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

        return $mapper->map($response->body, new Models\UpdateTagValuesResponseModel());
    }

    /**
     * Get application data from tags, which returns data encoded on the tags. This function also returns
     * the lock state of the application data.
     * ### Idempotent Behaviour
     * This endpoint is idempotent and will respond with an appropriate HTTP status code to indicate the
     * actual result
     * - **200 OK** tags found and result available (also returned if only a subset of tags have this
     * keys)
     * - **400 BAD_REQUEST** problem occurred, check message parameter for detailed information
     * - **401 UNAUTHORIZED** user not authorized
     * - **404 NOT_FOUND** no matching tags found or none the tags found does have keys with given name
     * ### Input HTTP Headers:
     * - HTTP Basic Authorization (as specified above)
     * - Accept language (as specified above)
     * ### Input parameters:
     * - tagIds (required, string, `0EEEE100000001`) ... Identifier for each tag to be queried
     * - appId (required, string, `ndef`) ... Application ID which references the data
     * ### Output parameters:
     * - code (Number, `0`) ... Indicates the result code of this call (see `result codes`)
     * - tagId (string, `0EEEE100000001`) ... Tag ID
     * - tagCode (Number, `0`) ... Indicates if the result code for this tag (see `Possible result codes
     * for a tag actions`)
     * - value (string, `AQIDBAUGBwgJCgsM`) ... Application data (Base64 encoded)
     * - locked (boolean, `false`) ... Tag has been made read-only
     *
     * @param Models\GetApplicationDataFromTagsRequestModel $body TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function createGetApplicationDataFromTags(
        $body
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/rest/tag/value';

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

        return $mapper->map($response->body, new Models\GetApplicationDataFromTagsResponseModel());
    }

    /**
     * Look up an array of the first **count** batchUrns with the specified customer PO.
     * **NOTE: Only one customerPO can be specified.**
     * ### Output parameters
     * - batchUrns (array of string, `urn:uuid:smartrac-group:batch:99990001`) ... Array of batch URNs
     *
     * @param string  $customerPO Case-sensitive customerPO
     * @param integer $count      (optional) Maximum number of batch URNs to return; defaults to 100000; maximum is
     *                            1000000
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getQueryBatches(
        $customerPO,
        $count = 100000
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/rest/tag/queryBatches';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'customerPO' => $customerPO,
            'count'      => (null != $count) ? $count : 100000,
        ));

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

        if ($response->code == 401) {
            throw new APIException('', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->map($response->body, new Models\QueryBatchesResponseModel());
    }

    /**
     * ### Idempotent Behaviour
     * This endpoint is idempotent and will respond with an appropriate HTTP status code to indicate the
     * actual result
     * - **200 OK** minimum 1 tag found and result available
     * - **400 BAD_REQUEST** problem occurred, check message parameter for detailed information
     * - **401 UNAUTHORIZED** user not authorized
     * ### Input HTTP Headers:
     * - HTTP Basic Authorization (as specified above)
     * ### Input parameters
     * - tagIds (required, array of string, `E12345678912345678`) ... Array of RFID tag identifiers; max
     * 1000 entries allowed
     * - verificationTypes (optional, array of string, `RR`) ... Array of verification types
     * - properties (optional, array of string, `plantId,batchId`) ... Array of requested properties
     * <!--
     * - materialPerformance (optional, array of string, `air,carton`) ... Array of requested material
     * performance data
     * -->
     * ### Available tag properties
     * Property ID | Data Type | Description | Availability
     * ------------ | ------------- | ------------ | ------------
     * custId | String | Customer ID | available
     * orderId | String | Order ID | available
     * orderDate | Long | Order date | available
     * orderQty | Number | Order quantity | available
     * orderQtyU | String | Order quantity unit | available
     * customerPO | String | Customer purchase order number | available
     * customerName | String | Customer name | available
     * supplPO | String | Supplier purchase order number | available
     * delivId | String | Delivery ID | available
     * delivDate | Long | Delivery date | available
     * delivQty | Number | Delivery quantity | available
     * delivQtyU | String | Delivery quantity unit | available
     * batchId | String | Roll number / batch ID | available
     * yield | Number | Batch yield [%] | available
     * subRoll | String | Sub roll number / sub batch ID | available
     * plantId | String | Manufacturer production side ID | available
     * chipManuf | String | Chip manufacturer | available
     * chipModel | String | Chip model | available
     * inlayType | String | Inlay type | available
     * inlayManufDate | Long | Inlay manufacturer date | available
     * attenuation | Number | Attenuation in dB | available
     * checkState | Number | 0=failed; 1=passed (default) | available
     * Notes:
     * - Only available properties can be requested (check `Availability` column above)
     * - Same data is not available for all tags/batches
     * - There are additional properties planned in the future
     * ### Output parameters
     * - code (Number, `0`) ... Indicates the result code of this call (see `result codes`)
     * - tagId according the requested `tagIds`
     * - tagCode (Number, `0`) ... Indicates if the result code for this tag (see `result codes for a tag
     * actions`)
     * - verificationState according the requested `verificationTypes`
     * - properties according the requested `properties`
     *
     * @param Models\GetTagMetadataRequestModel $body TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function createGetTagMetadata(
        $body
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/rest/tag/properties';

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

        return $mapper->map($response->body, new Models\GetTagMetadataResponseModel());
    }

    /**
     * Get authentication keys for encoded tags, which can be used to access the tag memory. The key names,
     * content and access rules need to be defined when ordering the tags.
     * It is possible to have several applications with their corresponding keys on a tag.
     * ### Idempotent Behaviour
     * This endpoint is idempotent and will respond with an appropriate HTTP status code to indicate the
     * actual result
     * - **200 OK** tags found and result available (also returned if only a subset of tags have this
     * keys)
     * - **400 BAD_REQUEST** problem occurred, check message parameter for detailed information
     * - **401 UNAUTHORIZED** user not authorized
     * - **404 NOT_FOUND** no matching tags found or none the tags found does have keys with given name
     * ### Input HTTP Headers:
     * - HTTP Basic Authorization (as specified above)
     * - Accept language (as specified above)
     * ### Input parameters:
     * - tagIds (required, string, `0EEEE100000001`) ... Identifier for each tag to be queried
     * - appId (required, string, `SC Public Transport`) ... Application ID which references the key
     * ### Output parameters:
     * - code (Number, `0`) ... Indicates the result code of this call (see `result codes`)
     * - tagId (string, `0EEEE100000001`) ... Tag ID
     * - tagCode (Number, `0`) ... Indicates if the result code for this tag (see `Possible result codes
     * for a tag actions`)
     * - key (string, `0102030405060708090A0B0C`) ... Key blob (AsciiHex encoded key)
     *
     * @param Models\GetKeysUsedForTagAuthenticationRequestModel $body TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function createGetKeysUsedForTagAuthentication(
        $body
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/rest/tag/key';

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

        return $mapper->map($response->body, new Models\GetKeysUsedForTagAuthenticationResponseModel());
    }
}
