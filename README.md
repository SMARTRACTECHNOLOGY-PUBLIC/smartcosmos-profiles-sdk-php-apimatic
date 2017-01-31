# Getting started

## How to Build

The generated code has dependencies over external libraries like UniRest. These dependencies are defined in the ```composer.json``` file that comes with the SDK. 
To resolve these dependencies, we use the Composer package manager which requires PHP greater than 5.3.2 installed in your system. 
Visit [https://getcomposer.org/download/](https://getcomposer.org/download/) to download the installer file for Composer and run it in your system. 
Open command prompt and type ```composer --version```. This should display the current version of the Composer installed if the installation was successful.

* Using command line, navigate to the directory containing the generated files (including ```composer.json```) for the SDK. 
* Run the command ```composer install```. This should install all the required dependencies and create the ```vendor``` directory in your project directory.

![Building SDK - Step 1](https://apidocs.io/illustration/php?step=installDependencies&workspaceFolder=SMART%20COSMOS%20Profiles-PHP)

### [For Windows Users Only] Configuring CURL Certificate Path in php.ini

CURL used to include a list of accepted CAs, but no longer bundles ANY CA certs. So by default it will reject all SSL certificates as unverifiable. You will have to get your CA's cert and point curl at it. The steps are as follows:

1. Download the certificate bundle (.pem file) from [https://curl.haxx.se/docs/caextract.html](https://curl.haxx.se/docs/caextract.html) on to your system.
2. Add curl.cainfo = "PATH_TO/cacert.pem" to your php.ini file located in your php installation. “PATH_TO” must be an absolute path containing the .pem file.

```ini
[curl]
; A default value for the CURLOPT_CAINFO option. This is required to be an
; absolute path.
;curl.cainfo =
```

## How to Use

The following section explains how to use the SMARTCOSMOSProfiles library in a new project.

### 1. Open Project in an IDE

Open an IDE for PHP like PhpStorm. The basic workflow presented here is also applicable if you prefer using a different editor or IDE.

![Open project in PHPStorm - Step 1](https://apidocs.io/illustration/php?step=openIDE&workspaceFolder=SMART%20COSMOS%20Profiles-PHP)

Click on ```Open``` in PhpStorm to browse to your generated SDK directory and then click ```OK```.

![Open project in PHPStorm - Step 2](https://apidocs.io/illustration/php?step=openProject0&workspaceFolder=SMART%20COSMOS%20Profiles-PHP)     

### 2. Add a new Test Project

Create a new directory by right clicking on the solution name as shown below:

![Add a new project in PHPStorm - Step 1](https://apidocs.io/illustration/php?step=createDirectory&workspaceFolder=SMART%20COSMOS%20Profiles-PHP)

Name the directory as "test"

![Add a new project in PHPStorm - Step 2](https://apidocs.io/illustration/php?step=nameDirectory&workspaceFolder=SMART%20COSMOS%20Profiles-PHP)
   
Add a PHP file to this project

![Add a new project in PHPStorm - Step 3](https://apidocs.io/illustration/php?step=createFile&workspaceFolder=SMART%20COSMOS%20Profiles-PHP)

Name it "testSDK"

![Add a new project in PHPStorm - Step 4](https://apidocs.io/illustration/php?step=nameFile&workspaceFolder=SMART%20COSMOS%20Profiles-PHP)

Depending on your project setup, you might need to include composer's autoloader in your PHP code to enable auto loading of classes.

```PHP
require_once "../vendor/autoload.php";
```

It is important that the path inside require_once correctly points to the file ```autoload.php``` inside the vendor directory created during dependency installations.

![Add a new project in PHPStorm - Step 4](https://apidocs.io/illustration/php?step=projectFiles&workspaceFolder=SMART%20COSMOS%20Profiles-PHP)

After this you can add code to initialize the client library and acquire the instance of a Controller class. Sample code to initialize the client library and using controller methods is given in the subsequent sections.

### 3. Run the Test Project

To run your project you must set the Interpreter for your project. Interpreter is the PHP engine installed on your computer.

Open ```Settings``` from ```File``` menu.

![Run Test Project - Step 1](https://apidocs.io/illustration/php?step=openSettings&workspaceFolder=SMART%20COSMOS%20Profiles-PHP)

Select ```PHP``` from within ```Languages & Frameworks```

![Run Test Project - Step 2](https://apidocs.io/illustration/php?step=setInterpreter0&workspaceFolder=SMART%20COSMOS%20Profiles-PHP)

Browse for Interpreters near the ```Interpreter``` option and choose your interpreter.

![Run Test Project - Step 3](https://apidocs.io/illustration/php?step=setInterpreter1&workspaceFolder=SMART%20COSMOS%20Profiles-PHP)

Once the interpreter is selected, click ```OK```

![Run Test Project - Step 4](https://apidocs.io/illustration/php?step=setInterpreter2&workspaceFolder=SMART%20COSMOS%20Profiles-PHP)

To run your project, right click on your PHP file inside your Test project and click on ```Run```

![Run Test Project - Step 5](https://apidocs.io/illustration/php?step=runProject&workspaceFolder=SMART%20COSMOS%20Profiles-PHP)

## How to Test

Unit tests in this SDK can be run using PHPUnit. 

1. First install the dependencies using composer including the `require-dev` dependencies.
2. Run `vendor\bin\phpunit --verbose` from commandline to execute tests. If you have 
   installed PHPUnit globally, run tests using `phpunit --verbose` instead.

You can change the PHPUnit test configuration in the `phpunit.xml` file.

## Initialization

### Authentication
In order to setup authentication and initialization of the API client, you need the following information.

| Parameter | Description |
|-----------|-------------|
| basicAuthUserName | The username to use with basic authentication |
| basicAuthPassword | The password to use with basic authentication |



API client can be initialized as following.

```php
// Configuration parameters and credentials
$basicAuthUserName = "basicAuthUserName"; // The username to use with basic authentication
$basicAuthPassword = "basicAuthPassword"; // The password to use with basic authentication

$client = new SMARTCOSMOSProfilesLib\SMARTCOSMOSProfilesClient($basicAuthUserName, $basicAuthPassword);
```

## Class Reference

### <a name="list_of_controllers"></a>List of Controllers

* [DataImportEndpointsController](#data_import_endpoints_controller)
* [TagDataEndpointsController](#tag_data_endpoints_controller)
* [TagDeliveryNetworkEndpointsController](#tag_delivery_network_endpoints_controller)
* [TransactionEndpointsController](#transaction_endpoints_controller)
* [TagAuthenticationEndpointsController](#tag_authentication_endpoints_controller)
* [TagVerificationEndpointsController](#tag_verification_endpoints_controller)
* [PlatformAvailabilityEndpointsController](#platform_availability_endpoints_controller)

### <a name="data_import_endpoints_controller"></a>![Class: ](https://apidocs.io/img/class.png ".DataImportEndpointsController") DataImportEndpointsController

#### Get singleton instance

The singleton instance of the ``` DataImportEndpointsController ``` class can be accessed from the API Client.

```php
$dataImportEndpoints = $client->getDataImportEndpoints();
```

#### <a name="create_file_transmission_receipt"></a>![Method: ](https://apidocs.io/img/method.png ".DataImportEndpointsController.createFileTransmissionReceipt") createFileTransmissionReceipt

> TODO: Add a method description


```php
function createFileTransmissionReceipt($body)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| body |  ``` Required ```  | TODO: Add a parameter description |



#### Example Usage

```php
$body = new FileTransmissionReceiptRequestModel();

$dataImportEndpoints->createFileTransmissionReceipt($body);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 400 | Unexpected error in API call. See HTTP response body for details. |
| 401 | TODO: Add an error description |



#### <a name="update_file_transmission_request"></a>![Method: ](https://apidocs.io/img/method.png ".DataImportEndpointsController.updateFileTransmissionRequest") updateFileTransmissionRequest

> TODO: Add a method description


```php
function updateFileTransmissionRequest($body)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| body |  ``` Required ```  | TODO: Add a parameter description |



#### Example Usage

```php
$body = new FileTransmissionRequestRequestModel();

$result = $dataImportEndpoints->updateFileTransmissionRequest($body);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 400 | Unexpected error in API call. See HTTP response body for details. |
| 401 | TODO: Add an error description |



[Back to List of Controllers](#list_of_controllers)

### <a name="tag_data_endpoints_controller"></a>![Class: ](https://apidocs.io/img/class.png ".TagDataEndpointsController") TagDataEndpointsController

#### Get singleton instance

The singleton instance of the ``` TagDataEndpointsController ``` class can be accessed from the API Client.

```php
$tagDataEndpoints = $client->getTagDataEndpoints();
```

#### <a name="get_tag_metadata_definition"></a>![Method: ](https://apidocs.io/img/method.png ".TagDataEndpointsController.getTagMetadataDefinition") getTagMetadataDefinition

> ### Idempotent Behaviour
> This endpoint is idempotent and will respond with an appropriate HTTP status code to indicate the actual result
> - **200 OK** specified tag was found, result available
> - **400 BAD_REQUEST** problem occurred, check message parameter for detailed information
> - **401 UNAUTHORIZED** user not authorized
> ### Input HTTP Headers:
> - HTTP Basic Authorization (as specified above)
> ### Input parameters
> - tagId (required, string, `E12345678912345678`) ... a single RFID tag identifier
> - nameLike (optional, string, `chip`) ... Comparison string for metadata properties
> ### Output parameters
> - code (Number, `0`) ... Indicates the result code of this call (see `result codes`)
> - tagId the requested `tagID`
> - properties an array of JSON objects, each of which contains property ID, property name, property data type, and a flag indicating whether the property exists for the tag.


```php
function getTagMetadataDefinition(
        $tagId,
        $nameLike = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| tagId |  ``` Required ```  | TODO: Add a parameter description |
| nameLike |  ``` Optional ```  | TODO: Add a parameter description |



#### Example Usage

```php
$tagId = 'tagId';
$nameLike = 'nameLike';

$result = $tagDataEndpoints->getTagMetadataDefinition($tagId, $nameLike);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 400 | Unexpected error in API call. See HTTP response body for details. |
| 401 | TODO: Add an error description |



#### <a name="get_query_tags"></a>![Method: ](https://apidocs.io/img/method.png ".TagDataEndpointsController.getQueryTags") getQueryTags

> Look up an array of the first **count** tag IDs with the specified batch URN.
> ### Output parameters
> - tagIds (array of string, `E12345678912345678`) ... Array of RFID tag identifiers


```php
function getQueryTags(
        $batchUrn,
        $count = 100000)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| batchUrn |  ``` Required ```  | Case-sensitive batch URN |
| count |  ``` Optional ```  ``` DefaultValue ```  | Maximum number of tag IDs to return; defaults to 100000; maximum is 1000000 |



#### Example Usage

```php
$batchUrn = 'batchUrn';
$count = 100000;

$result = $tagDataEndpoints->getQueryTags($batchUrn, $count);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 400 | Unexpected error in API call. See HTTP response body for details. |
| 401 | TODO: Add an error description |



#### <a name="create_get_single_tag_code_message"></a>![Method: ](https://apidocs.io/img/method.png ".TagDataEndpointsController.createGetSingleTagCodeMessage") createGetSingleTagCodeMessage

> Get a message to a single numeric tag code.
> ### Idempotent Behaviour
> This endpoint is idempotent and will respond with an appropriate HTTP status code to indicate the actual result
> - **200 OK** message available
> - **400 BAD_REQUEST** problem occurred, check message parameter for detailed information
> - **401 UNAUTHORIZED** user not authorized
> ### Input HTTP Headers:
> - HTTP Basic Authorization (as specified above)
> - Accept language (as specified above)
> ### Input parameters:
> - tagCode (required, number, `0`) ... Result code of a tag action
> ### Output parameters:
> - code (Number, `0`) ... Indicates the result code of this call (see `result codes`)
> - message (string, `verified`) ... Result message in `Accept-Language` (see `Multi language support`)


```php
function createGetSingleTagCodeMessage($body)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| body |  ``` Required ```  | TODO: Add a parameter description |



#### Example Usage

```php
$body = new GetSingleTagCodeMessageRequestModel();

$result = $tagDataEndpoints->createGetSingleTagCodeMessage($body);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 400 | Unexpected error in API call. See HTTP response body for details. |
| 401 | TODO: Add an error description |



#### <a name="update_tag_values"></a>![Method: ](https://apidocs.io/img/method.png ".TagDataEndpointsController.updateTagValues") updateTagValues

> Writes application data to tags, which updated the existing application data in Profiles. This
> function also supports setting the lock state of the application data, which prevents further
> changes of the application data.
> Writing application data to a tag is permitted under following conditions only:
> - The tag with the given tagId must exist in Profiles
> - The tag must have an application record with the given appId
> - The lock state of the tag's application data must be present and explicitly set to **false**
> - To insert a new application record, the data transaction endpoint shall be used
> **Notes:**
> - Omitting **value** in the request will update the lock state of the tag only.
> - Omitting **locked** in the request will write the value only.
> - It is not possible to unlock a locked tag by setting **locked** to **false**.
> ### Idempotent Behaviour
> This endpoint is idempotent and will respond with an appropriate HTTP status code to indicate the actual result
> - **200 OK** tags found and result available (also returned if only a subset of tags have this keys)
> - **400 BAD_REQUEST** problem occurred, check message parameter for detailed information
> - **401 UNAUTHORIZED** user not authorized
> - **404 NOT_FOUND** no matching tags found or none the tags found do have app IDs with given name
> ### Input HTTP Headers:
> - HTTP Basic Authorization (as specified above)
> - Accept language (as specified above)
> ### Input parameters:
> - appId (required, string, `ndef`) ... Application ID which references the data
> - tagId (required, string, `0EEEE100000001`) ... Identifier for each tag to be updated
> - value (optional, string, `AQIDBAUGBwgJCgsM`) ... Application data to be updated
> - locked (optional, boolean, `true`) ... Lock flag to be set
> ### Output parameters:
> - code (Number, `0`) ... Indicates the result code of this call (see `result codes`)
> - tagId (string, `0EEEE100000001`) ... Tag ID
> - tagCode (Number, `0`) ... Indicates if the result code for this tag (see `Possible result codes for a tag actions`)


```php
function updateTagValues($body)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| body |  ``` Required ```  | TODO: Add a parameter description |



#### Example Usage

```php
$body = new UpdateTagValuesRequestModel();

$result = $tagDataEndpoints->updateTagValues($body);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 400 | Unexpected error in API call. See HTTP response body for details. |
| 401 | TODO: Add an error description |
| 404 | Unexpected error in API call. See HTTP response body for details. |



#### <a name="create_get_application_data_from_tags"></a>![Method: ](https://apidocs.io/img/method.png ".TagDataEndpointsController.createGetApplicationDataFromTags") createGetApplicationDataFromTags

> Get application data from tags, which returns data encoded on the tags. This function also returns
> the lock state of the application data.
> ### Idempotent Behaviour
> This endpoint is idempotent and will respond with an appropriate HTTP status code to indicate the actual result
> - **200 OK** tags found and result available (also returned if only a subset of tags have this keys)
> - **400 BAD_REQUEST** problem occurred, check message parameter for detailed information
> - **401 UNAUTHORIZED** user not authorized
> - **404 NOT_FOUND** no matching tags found or none the tags found does have keys with given name
> ### Input HTTP Headers:
> - HTTP Basic Authorization (as specified above)
> - Accept language (as specified above)
> ### Input parameters:
> - tagIds (required, string, `0EEEE100000001`) ... Identifier for each tag to be queried
> - appId (required, string, `ndef`) ... Application ID which references the data
> ### Output parameters:
> - code (Number, `0`) ... Indicates the result code of this call (see `result codes`)
> - tagId (string, `0EEEE100000001`) ... Tag ID
> - tagCode (Number, `0`) ... Indicates if the result code for this tag (see `Possible result codes for a tag actions`)
> - value (string, `AQIDBAUGBwgJCgsM`) ... Application data (Base64 encoded)
> - locked (boolean, `false`) ... Tag has been made read-only


```php
function createGetApplicationDataFromTags($body)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| body |  ``` Required ```  | TODO: Add a parameter description |



#### Example Usage

```php
$body = new GetApplicationDataFromTagsRequestModel();

$result = $tagDataEndpoints->createGetApplicationDataFromTags($body);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 400 | Unexpected error in API call. See HTTP response body for details. |
| 401 | TODO: Add an error description |
| 404 | Unexpected error in API call. See HTTP response body for details. |



#### <a name="get_query_batches"></a>![Method: ](https://apidocs.io/img/method.png ".TagDataEndpointsController.getQueryBatches") getQueryBatches

> Look up an array of the first **count** batchUrns with the specified customer PO.
> **NOTE: Only one customerPO can be specified.**
> ### Output parameters
> - batchUrns (array of string, `urn:uuid:smartrac-group:batch:99990001`) ... Array of batch URNs


```php
function getQueryBatches(
        $customerPO,
        $count = 100000)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| customerPO |  ``` Required ```  | Case-sensitive customerPO |
| count |  ``` Optional ```  ``` DefaultValue ```  | Maximum number of batch URNs to return; defaults to 100000; maximum is 1000000 |



#### Example Usage

```php
$customerPO = 'customerPO';
$count = 100000;

$result = $tagDataEndpoints->getQueryBatches($customerPO, $count);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 400 | Unexpected error in API call. See HTTP response body for details. |
| 401 | TODO: Add an error description |



#### <a name="create_get_tag_metadata"></a>![Method: ](https://apidocs.io/img/method.png ".TagDataEndpointsController.createGetTagMetadata") createGetTagMetadata

> ### Idempotent Behaviour
> This endpoint is idempotent and will respond with an appropriate HTTP status code to indicate the actual result
> - **200 OK** minimum 1 tag found and result available
> - **400 BAD_REQUEST** problem occurred, check message parameter for detailed information
> - **401 UNAUTHORIZED** user not authorized
> ### Input HTTP Headers:
> - HTTP Basic Authorization (as specified above)
> ### Input parameters
> - tagIds (required, array of string, `E12345678912345678`) ... Array of RFID tag identifiers; max 1000 entries allowed
> - verificationTypes (optional, array of string, `RR`) ... Array of verification types
> - properties (optional, array of string, `plantId,batchId`) ... Array of requested properties
> <!--
> - materialPerformance (optional, array of string, `air,carton`) ... Array of requested material performance data
> -->
> ### Available tag properties
> Property ID | Data Type | Description | Availability
> ------------ | ------------- | ------------ | ------------
> custId | String | Customer ID | available
> orderId | String | Order ID | available
> orderDate | Long | Order date | available
> orderQty | Number | Order quantity | available
> orderQtyU | String | Order quantity unit | available
> customerPO | String | Customer purchase order number | available
> customerName | String | Customer name | available
> supplPO | String | Supplier purchase order number | available
> delivId | String | Delivery ID | available
> delivDate | Long | Delivery date | available
> delivQty | Number | Delivery quantity | available
> delivQtyU | String | Delivery quantity unit | available
> batchId | String | Roll number / batch ID | available
> yield | Number | Batch yield [%] | available
> subRoll | String | Sub roll number / sub batch ID | available
> plantId | String | Manufacturer production side ID | available
> chipManuf | String | Chip manufacturer | available
> chipModel | String | Chip model | available
> inlayType | String | Inlay type | available
> inlayManufDate | Long | Inlay manufacturer date | available
> attenuation | Number | Attenuation in dB | available
> checkState | Number | 0=failed; 1=passed (default) | available
> Notes:
>  - Only available properties can be requested (check `Availability` column above)
>  - Same data is not available for all tags/batches
>  - There are additional properties planned in the future
> ### Output parameters
> - code (Number, `0`) ... Indicates the result code of this call (see `result codes`)
> - tagId according the requested `tagIds`
> - tagCode (Number, `0`) ... Indicates if the result code for this tag (see `result codes for a tag actions`)
> - verificationState according the requested `verificationTypes`
> - properties according the requested `properties`


```php
function createGetTagMetadata($body)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| body |  ``` Required ```  | TODO: Add a parameter description |



#### Example Usage

```php
$body = new GetTagMetadataRequestModel();

$result = $tagDataEndpoints->createGetTagMetadata($body);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 400 | Unexpected error in API call. See HTTP response body for details. |
| 401 | TODO: Add an error description |



#### <a name="create_get_keys_used_for_tag_authentication"></a>![Method: ](https://apidocs.io/img/method.png ".TagDataEndpointsController.createGetKeysUsedForTagAuthentication") createGetKeysUsedForTagAuthentication

> Get authentication keys for encoded tags, which can be used to access the tag memory. The key names,
> content and access rules need to be defined when ordering the tags.
> It is possible to have several applications with their corresponding keys on a tag.
> ### Idempotent Behaviour
> This endpoint is idempotent and will respond with an appropriate HTTP status code to indicate the actual result
> - **200 OK** tags found and result available (also returned if only a subset of tags have this keys)
> - **400 BAD_REQUEST** problem occurred, check message parameter for detailed information
> - **401 UNAUTHORIZED** user not authorized
> - **404 NOT_FOUND** no matching tags found or none the tags found does have keys with given name
> ### Input HTTP Headers:
> - HTTP Basic Authorization (as specified above)
> - Accept language (as specified above)
> ### Input parameters:
> - tagIds (required, string, `0EEEE100000001`) ... Identifier for each tag to be queried
> - appId (required, string, `SC Public Transport`) ... Application ID which references the key
> ### Output parameters:
> - code (Number, `0`) ... Indicates the result code of this call (see `result codes`)
> - tagId (string, `0EEEE100000001`) ... Tag ID
> - tagCode (Number, `0`) ... Indicates if the result code for this tag (see `Possible result codes for a tag actions`)
> - key (string, `0102030405060708090A0B0C`) ... Key blob (AsciiHex encoded key)


```php
function createGetKeysUsedForTagAuthentication($body)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| body |  ``` Required ```  | TODO: Add a parameter description |



#### Example Usage

```php
$body = new GetKeysUsedForTagAuthenticationRequestModel();

$result = $tagDataEndpoints->createGetKeysUsedForTagAuthentication($body);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 400 | Unexpected error in API call. See HTTP response body for details. |
| 401 | TODO: Add an error description |
| 404 | Unexpected error in API call. See HTTP response body for details. |



[Back to List of Controllers](#list_of_controllers)

### <a name="tag_delivery_network_endpoints_controller"></a>![Class: ](https://apidocs.io/img/class.png ".TagDeliveryNetworkEndpointsController") TagDeliveryNetworkEndpointsController

#### Get singleton instance

The singleton instance of the ``` TagDeliveryNetworkEndpointsController ``` class can be accessed from the API Client.

```php
$tagDeliveryNetworkEndpoints = $client->getTagDeliveryNetworkEndpoints();
```

#### <a name="get_tag_delivery_network_data"></a>![Method: ](https://apidocs.io/img/method.png ".TagDeliveryNetworkEndpointsController.getTagDeliveryNetworkData") getTagDeliveryNetworkData

> **DRAFT** - Under development
> Get TDN data for a tag. The TDN data is proprietary and needs the SMART COSMOS TDN client
> service on the REST client for decoding. The endpoint will report "404 Not found" for all
> tags with no TDN data attached (so it is not possible to probe the Profiles instance for 
> no-TDN tag IDs without authorization).
> ### Notes
>  - Public endpoint (no authorization needed)
>  - If a secure endpoint is needed, it is possible to disable this endpoint and use GetTagValue with "TDN" as appId instead.
> ### Idempotent Behaviour
> This endpoint is idempotent and will respond with an appropriate HTTP status code to indicate
> the actual result.
> - **200 OK** valid TDN tag ID
> - **404 NOT_FOUND** invalid tag ID (tag not available or no TDN data attached)
> ### Output parameters:
> - code (Number, `0`) ... Indicates the result code of this call (see `result codes`)
> - value (string, `54646E50726F707269657461727944617461`) ... TDN data (AsciiHex encoded)


```php
function getTagDeliveryNetworkData($tagId)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| tagId |  ``` Required ```  | TODO: Add a parameter description |



#### Example Usage

```php
$tagId = 'tagId';

$result = $tagDeliveryNetworkEndpoints->getTagDeliveryNetworkData($tagId);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 404 | TODO: Add an error description |



[Back to List of Controllers](#list_of_controllers)

### <a name="transaction_endpoints_controller"></a>![Class: ](https://apidocs.io/img/class.png ".TransactionEndpointsController") TransactionEndpointsController

#### Get singleton instance

The singleton instance of the ``` TransactionEndpointsController ``` class can be accessed from the API Client.

```php
$transactionEndpoints = $client->getTransactionEndpoints();
```

#### <a name="create_transactionally_insert_or_update_data_provided_in_request_message_body_into_the_datastore"></a>![Method: ](https://apidocs.io/img/method.png ".TransactionEndpointsController.createTransactionallyInsertOrUpdateDataProvidedInRequestMessageBodyIntoTheDatastore") createTransactionallyInsertOrUpdateDataProvidedInRequestMessageBodyIntoTheDatastore

> ### Idempotent Behaviour
> This endpoint is idempotent and will respond with an appropriate HTTP status code to indicate the actual result
> ### Input parameters:
> - [[account, objects[], objectAddresses[], metadata[], relationships[], [...], ...]
> ### Output parameters:
> - code (Number, `0`) ... Indicates the result code of this call (see `result codes`)
> - message (string, `11e5d3f6-0c65-7791-917a-e95d5a282bcb`) ... System-generated Transaction ID, as used in all logging
> ### Input HTTP Headers:
> - HTTP Basic Authorization (as specified above)
> ### HTTP result codes
> This endpoint will respond with an appropriate HTTP status code to indicate the actual result
> - **200 SUCCESS** the insertion was successful. The UUID in the message string of the response body is system-generated transaction ID, which can be helpful for logging.
> - **400 BAD_REQUEST** problem occurred, check message parameter for detailed information, including an approximate count of elements processed before the error occurred.
> - **401 UNAUTHORIZED** user not authorized


```php
function createTransactionallyInsertOrUpdateDataProvidedInRequestMessageBodyIntoTheDatastore(
        $body,
        $transactionHandlerName)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| body |  ``` Required ```  ``` Collection ```  | TODO: Add a parameter description |
| transactionHandlerName |  ``` Required ```  | TODO: Add a parameter description |



#### Example Usage

```php
$transactionallyInsertOrUpdateDataProvidedInRequestMessageBodyIntoTheDatastoreRequestModel = new TransactionallyInsertOrUpdateDataProvidedInRequestMessageBodyIntoTheDatastoreRequestModel();
$body = array($transactionallyInsertOrUpdateDataProvidedInRequestMessageBodyIntoTheDatastoreRequestModel);
$transactionHandlerName = 'transactionHandlerName';

$result = $transactionEndpoints->createTransactionallyInsertOrUpdateDataProvidedInRequestMessageBodyIntoTheDatastore($body, $transactionHandlerName);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 400 | Unexpected error in API call. See HTTP response body for details. |
| 401 | TODO: Add an error description |



[Back to List of Controllers](#list_of_controllers)

### <a name="tag_authentication_endpoints_controller"></a>![Class: ](https://apidocs.io/img/class.png ".TagAuthenticationEndpointsController") TagAuthenticationEndpointsController

#### Get singleton instance

The singleton instance of the ``` TagAuthenticationEndpointsController ``` class can be accessed from the API Client.

```php
$tagAuthenticationEndpoints = $client->getTagAuthenticationEndpoints();
```

#### <a name="create_get_otp_authentication_challenge"></a>![Method: ](https://apidocs.io/img/method.png ".TagAuthenticationEndpointsController.createGetOTPAuthenticationChallenge") createGetOTPAuthenticationChallenge

> OTP (One-Time Password) Authentication is performed in three steps:
>  1. Retrieve an authentication challenge for the given tag
>     in: tagId, appId
>     out: otpRequestId, otpVector
>  2. Calculate the OTP encryption result on the client
>  3. Send the OTP encryption result to the service
>     in: tagId, otpRequestId, otpResult
>     out: verification result
> Get an authentication challenge to authenticate a tag identified by its tag ID using an OTP init vector
> and a key. The authentication session is valid for 60 seconds.
> ### Idempotent Behaviour
> This endpoint is idempotent and will respond with an appropriate HTTP status code to indicate the actual result
> - **200 OK** tags found and result available (also returned if only a subset of tags have this keys)
> - **400 BAD_REQUEST** problem occurred, check message parameter for detailed information
> - **401 UNAUTHORIZED** user not authorized
> - **404 NOT_FOUND** no matching tags found or none the tags found does support OTP authentication
> ### Input parameters:
> - tagId (required, string, `0EEEE100000001`) ... Identifier for the tag
> - appId (optional, string, `OTP`) ... Identifier for the requested application (used for multi application RFID tags)
> ### Output parameters:
> - code (Number, `0`) ... Indicates the result code of this call (see `result codes`)
> - message (string, `Verification successful`) ... Result message
> - tagId (string, `0EEEE100000001`) ... tag ID
> - otpRequestId (string, `urn:uuid:82b3a00c-e1b0-44cb-a50d-7705e1c6e2b4`) ... Identifier to track the authentication flow
> - otpVector (byte[], `MzMEOwsSAkYTBRUTPjpGJRIsLgE=`) ... Generated OTP init vector to calculate the OTP result


```php
function createGetOTPAuthenticationChallenge($body)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| body |  ``` Required ```  | TODO: Add a parameter description |



#### Example Usage

```php
$body = new GetOTPAuthenticationChallengeRequestModel();

$result = $tagAuthenticationEndpoints->createGetOTPAuthenticationChallenge($body);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 400 | Unexpected error in API call. See HTTP response body for details. |
| 401 | TODO: Add an error description |
| 404 | Unexpected error in API call. See HTTP response body for details. |



#### <a name="create_verify_nxp_tag_signature"></a>![Method: ](https://apidocs.io/img/method.png ".TagAuthenticationEndpointsController.createVerifyNXPTagSignature") createVerifyNXPTagSignature

> Verify the signature of NXP NTAG, Mifare Ultralight EV1 or I-Code SLIX2 tags. The signature could be obtained
> from the NXP tag by issuing a READ_SIG command. To use the correct verification key, it is also
> required to submit the tag version, which could be acquired by issuing a GET_VERSION command.
> The signature is verified in Profiles by ECDSA using the public key from NXP.
> Following NXP chip types are supported:
> - NXP NTAG
> - NXP Mifare Ultralight EV1
> - NXP I-Code SLIX2
> ### Note on tagVersion
> - For NTAG and Ultralight it is required to provide the GET_VERSION response to locate the correct verification key
> - For I-Code the *tagVersion* could be ommitted, because the verification key is derived from the UID directly
> ### Idempotent Behaviour
> This endpoint is idempotent and will respond with an appropriate HTTP status code to indicate the actual result
> - **200 OK** signature valid
> - **400 BAD_REQUEST** signature invalid
> - **401 UNAUTHORIZED** user not authorized
> ### Input parameters:
> - tagId (required, string, `04001122334455`) ... NXP tag UID
> - tagVersion (optional, string, `0004040201000F03`) ... NXP GET_VERSION response
> - signature (required, string, `MTIzNDU2NzgxMjM0NTY3ODEyMzQ1Njc4MTIzNDU2Nzg=`) ... signature read from the chip (Base64 encoded)
> ### Output parameters:
> - code (Number, `0`) ... Indicates the result code of this call (see `result codes`)
> - message (string, `Verification successful`) ... Result message
> - tagId (string, `04001122334455`) ... NXP tag UID


```php
function createVerifyNXPTagSignature($body)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| body |  ``` Required ```  | TODO: Add a parameter description |



#### Example Usage

```php
$body = new VerifyNXPTagSignatureRequestModel();

$result = $tagAuthenticationEndpoints->createVerifyNXPTagSignature($body);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 400 | Unexpected error in API call. See HTTP response body for details. |
| 401 | TODO: Add an error description |



#### <a name="create_validate_otp_encryption_result"></a>![Method: ](https://apidocs.io/img/method.png ".TagAuthenticationEndpointsController.createValidateOTPEncryptionResult") createValidateOTPEncryptionResult

> Validate the OTP authentication attempt based on the OTP init vactor identified by UUID.
> ### Idempotent Behaviour
> This endpoint is idempotent and will respond with an appropriate HTTP status code to indicate the actual result
> - **200 OK** authentication successful
> - **400 BAD_REQUEST** authentication failed
> - **401 UNAUTHORIZED** user not authorized
> - **404 NOT_FOUND** invalid session or session expired
> ### Input parameters:
> - timestamp (required, long, `1430911319542`) ... UTC timestamp used by the client to calculate the OTP
> - otpRequestId (required, string, `urn:uuid:82b3a00c-e1b0-44cb-a50d-7705e1c6e2b4`) ... Server side generated id to track the authentication flow
> - otpResult (required, int, `123456`) ... Generated OTP from HMAC according to RFC 6238
> ### Output parameters:
> - code (Number, `0`) ... Indicates the result code of this call (see `result codes`)
> - message (string, `Verification successful`) ... Result message
> - tagId (string, `0EEEE100000001`) ... tag ID


```php
function createValidateOTPEncryptionResult($body)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| body |  ``` Required ```  | TODO: Add a parameter description |



#### Example Usage

```php
$body = new ValidateOTPEncryptionResultRequestModel();

$result = $tagAuthenticationEndpoints->createValidateOTPEncryptionResult($body);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 400 | Unexpected error in API call. See HTTP response body for details. |
| 401 | TODO: Add an error description |
| 404 | Unexpected error in API call. See HTTP response body for details. |



[Back to List of Controllers](#list_of_controllers)

### <a name="tag_verification_endpoints_controller"></a>![Class: ](https://apidocs.io/img/class.png ".TagVerificationEndpointsController") TagVerificationEndpointsController

#### Get singleton instance

The singleton instance of the ``` TagVerificationEndpointsController ``` class can be accessed from the API Client.

```php
$tagVerificationEndpoints = $client->getTagVerificationEndpoints();
```

#### <a name="create_get_verification_state_message"></a>![Method: ](https://apidocs.io/img/method.png ".TagVerificationEndpointsController.createGetVerificationStateMessage") createGetVerificationStateMessage

> Get a message to a single verification state. Translate a numeric verification state into a human readable format. e.g. `0` into `verified`
> ### Idempotent Behaviour
> This endpoint is idempotent and will respond with an appropriate HTTP status code to indicate the actual result
> - **200 OK** tag found and result available
> - **400 BAD_REQUEST** problem occurred, check message parameter for detailed information
> - **401 UNAUTHORIZED** user not authorized
> ### Input HTTP Headers:
> - HTTP Basic Authorization (as specified above)
> - Accept language (as specified above)
> ### Input parameters:
> - verificationType (required, string, `RR`) ... Identifier of the verification type
> - verificationState (required, number, `0`) ... State of the verification
> ### Output parameters:
> - code (Number, `0`) ... Indicates the result code of this call (see `result codes`)
> - message (string, `verified`) ... Result message in `Accept-Language` (see `Multi language support`)


```php
function createGetVerificationStateMessage($body)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| body |  ``` Required ```  | TODO: Add a parameter description |



#### Example Usage

```php
$body = new GetVerificationStateMessageRequestModel();

$result = $tagVerificationEndpoints->createGetVerificationStateMessage($body);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 400 | Unexpected error in API call. See HTTP response body for details. |
| 401 | TODO: Add an error description |



#### <a name="create_verify_tags_for_round_rock_compliance"></a>![Method: ](https://apidocs.io/img/method.png ".TagVerificationEndpointsController.createVerifyTagsForRoundRockCompliance") createVerifyTagsForRoundRockCompliance

> Verify tags for Round Rock compliance (verification type `RR`)
> ### Idempotent Behaviour
> This endpoint is idempotent and will respond with an appropriate HTTP status code to indicate the actual result
> - **200 OK** tag found and Round Rock compliance result available
> - **400 BAD_REQUEST** problem occurred, check message parameter for detailed information
> ### Input parameters:
> - tagIds (required, array of string, `E12345678912345678`) ... Array of RFID tag identifiers; max 1000 entries allowed
> ### Output parameters:
> - code (Number, `0`) ... Indicates the result code of this call (see `result codes`)
> - tagId (string, `0EEEE100000001`) ... RFID tag identifiers
> - tagCode (Number, `0`) ... Indicates if the result code for this tag (see `result codes for a tag actions`)
> - state (Number, `0`) ... Indicates the current RoundRock compliance state (1 = Round Rock licensed; 0 = Not RoundRock licensed)
> The output contains all desired tag records. Even if the tag is not available or the user does not have permissions. The `tagCode` indicates the result code for each tag.


```php
function createVerifyTagsForRoundRockCompliance($body)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| body |  ``` Required ```  | TODO: Add a parameter description |



#### Example Usage

```php
$body = new VerifyTagsForRoundRockComplianceRequestModel();

$result = $tagVerificationEndpoints->createVerifyTagsForRoundRockCompliance($body);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 400 | Unexpected error in API call. See HTTP response body for details. |



#### <a name="create_verify_tags_for_a_verification_type"></a>![Method: ](https://apidocs.io/img/method.png ".TagVerificationEndpointsController.createVerifyTagsForAVerificationType") createVerifyTagsForAVerificationType

> Verify tags for a verification type, which is represented by an unique verification id like 'RR'
> ### Idempotent Behaviour
> This endpoint is idempotent and will respond with an appropriate HTTP status code to indicate the actual result
> - **200 OK** tag found and verification result available
> - **400 BAD_REQUEST** problem occurred, check message parameter for detailed information
> - **401 UNAUTHORIZED** user not authorized
> ### Input HTTP Headers:
> - HTTP Basic Authorization (as specified above)
> ### Input parameters:
> - tagIds (required, array of string, `E12345678912345678`) ... Array of RFID tag identifiers; max 1000 entries allowed
> - verificationType (required, String, `RR`) ... Verification type
> ### Output parameters:
> - code (Number, `0`) ... Indicates the result code of this call (see `result codes`)
> - tagId (string, `0EEEE100000001`) ... RFID tag identifiers
> - tagCode (Number, `0`) ... Indicates if the result code for this tag (see `Possible result codes for a tag actions`)
> - state (Number, `0`) ... Indicates the current verification state; Number depends on verification type; Use the message function to get a string message
> The output contains all desired tag records. Even if the tag is not available or the user does not have permissions. The `tagCode` indicates the result code for each tag.


```php
function createVerifyTagsForAVerificationType($body)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| body |  ``` Required ```  | TODO: Add a parameter description |



#### Example Usage

```php
$body = new VerifyTagsForAVerificationTypeRequestModel();

$result = $tagVerificationEndpoints->createVerifyTagsForAVerificationType($body);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 400 | Unexpected error in API call. See HTTP response body for details. |
| 401 | TODO: Add an error description |



[Back to List of Controllers](#list_of_controllers)

### <a name="platform_availability_endpoints_controller"></a>![Class: ](https://apidocs.io/img/class.png ".PlatformAvailabilityEndpointsController") PlatformAvailabilityEndpointsController

#### Get singleton instance

The singleton instance of the ``` PlatformAvailabilityEndpointsController ``` class can be accessed from the API Client.

```php
$platformAvailabilityEndpoints = $client->getPlatformAvailabilityEndpoints();
```

#### <a name="get_check_platform_availability"></a>![Method: ](https://apidocs.io/img/method.png ".PlatformAvailabilityEndpointsController.getCheckPlatformAvailability") getCheckPlatformAvailability

> Resource for checking the platform availability. 
> ### HTTP result codes
> This endpoint will respond with an appropriate HTTP status code to indicate the actual result
> - **204 NO_CONTENT** platform is available
> - **400 BAD_REQUEST** problem occurred, check message parameter for detailed information
> - **503 SERVICE_UNAVAILABLE** service is temporary unavailable (e.g. scheduled Platform Maintenance). Try again later.


```php
function getCheckPlatformAvailability()
```

#### Example Usage

```php

$result = $platformAvailabilityEndpoints->getCheckPlatformAvailability();

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 400 | Unexpected error in API call. See HTTP response body for details. |
| 503 | TODO: Add an error description |



[Back to List of Controllers](#list_of_controllers)



