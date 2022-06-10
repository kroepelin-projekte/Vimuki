# ILIAS VIMUKIWebService (for ILIAS versions: 6.0 - 6.999)

**Table of Contents**

 * [Install](#installation)
 * [Usage](#usage)
   * [Configuartion](#configuration)

## Installation
1. Clone this repository to <code><ILIAS_DIRECTORY>/Customizing/global/plugins/Services/WebServices/SoapHook/VIMUKIWebService</code>
2. Login to ILIAS with an administrator account (e.g. root)
3. Select **Plugins** from the **Administration** main menu drop down.
4. Search the **VIMUKIWebService** plugin in the list of plugin and choose **Activate** from the **Actions** drop down.

## Usage
### SOAP Request
1. Call the SOAP Server as follows:
   <code>https://example.com/path_to_ilias/webservice/soap/server.php?wsdl&client_id=<client_id></code>
   (replace url, path and value of client_id with the values of your installation)
2. To request one of these SOAP-Methods first call the login method with your credential: clientId, soapUser, soapPassword
   Now a session token should be returned from the SOAP server. This token you will need for all the next soap calls.
3. To Call `eventVIMUKIObject` you just have to put in the token as value for the sid parameter, the multivc_ref_id and session_ref_id.
   If the process ends successfully the date of the ILIAS session be returned. If the given multivc_ref_id doen't belong to an MultiVc object or the given session_ref_id doesn't belong to a Session object then it will return false.


## Configuration

No need for configuration in GUI.


## Using the WebService

The new SOAP method `eventVIMUKIObject` is only available under the ILIAS client
where this plugin is installed. The SOAP endpoint MUST include the client-ID as
GET parameter, otherwise the method is not found.
The SOAP endpoint thus becomes: <code>http://your-ilias-domain.com/webservice/soap/server.php?client_id=<client_id></code>
