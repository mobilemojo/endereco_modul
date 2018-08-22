# Endereco PHP SDK

The Endereco PHP SDK is a server side framework to encapsulate the communication with the
Endereco Address WebServices which were previously known as Orwell WebServices.

The current PHP SDK version is a developer friendly wrapper around the legacy Orwell PHP Library.

- API version: 1.0.0
- Package version: 1.0.0-RC1

Future versions of this SDK will enable you to use multiple EnderecoClient instances with different
credentials and will remove all dependencies on Orwell-related classes from the public API.

## Requirements

PHP 5.3.0 and later

## Installation & Usage

Download and extract the Endereco PHP SDK into a directory of your choice.
This installation guide will refer to this place as *path/to/endereco*.

```
   require_once 'path/to/endereco/sdk/autoload.php';
```

### Usage of the FirstNameCheck Service

The FirstNameCheck Service gives you a hint whether a given first name is
- male
- female
- known
- or unknown

    Have a look at sdk/Api/Result/EnderecoFirstNameCheckStatusEnum.php for all supported
    hints of the FirstNameCheck Service.

Usage of the Service with the Endereco PHP SDK is easy:

```
require_once __DIR__.'/../autoload.php';

$client = EnderecoClient::getInstance('your_tenant', 'username', 'password');
$firstNameCheckRequest = new EnderecoFirstNameCheckRequest();
$firstNameCheckRequest->setFirstName('Max')
                        ->setTransaction('startnewtransaction');

/**
 * @var $result OrwellInputAssistantFirstNameCheckResult
 */
$result = $client->executeRequest($firstNameCheckRequest);
if($result->hasStatus(EnderecoFirstNameCheckStatusEnum::FIRST_NAME_FOUND))
    echo "First name has been found\n";
if($result->hasStatus(EnderecoFirstNameCheckStatusEnum::FIRST_NAME_IS_FEMALE))
    echo "First name is female\n";
if($result->hasStatus(EnderecoFirstNameCheckStatusEnum::FIRST_NAME_IS_MALE))
    echo "First name is male\n";
if($result->hasStatus(EnderecoFirstNameCheckStatusEnum::FIRST_NAME_NOT_FOUND))
    echo "First name not found\n";
```

### Usage of the AddressCheck Service

The AddressCheck provides complex services to validate an Address.
Use the given code snippet as a starting point to explore the API.

```
require_once __DIR__.'/../autoload.php';

$client = EnderecoClient::getInstance('your_tenant', 'username', 'password');
$addressCheckRequest = new EnderecoAddressCheckRequest();
$addressCheckRequest->setPostcode('97236')
                        ->setCity('Randersacker')
                        ->setHousenumber('4b')
                        ->setStreet('Balthasar-Neumann-Straße');

/**
 * @var $result OrwellAddressCheckResult
 */
$result = $client->executeRequest($addressCheckRequest);

//checking status
if(EnderecoAddressCheckStatusEnum::ADDRESS_CORRECT)
    echo "Address is correct\n";
if(EnderecoAddressCheckStatusEnum::ADDRESS_NORMED)
    echo "Address is normed\n";
if(EnderecoAddressCheckStatusEnum::POSTCODE_NORMED)
    echo "Postcode normed\n";
if(EnderecoAddressCheckStatusEnum::CITY_NORMED)
    echo "City name is normed\n";
if(EnderecoAddressCheckStatusEnum::STREET_NORMED)
    echo "Street name is normed\n";
if(EnderecoAddressCheckStatusEnum::HOUSE_NR_NORMED)
    echo "House number normed\n";
if(EnderecoAddressCheckStatusEnum::ADDRESS_OUTDATED)
    echo "Address is outdated\n";
if(EnderecoAddressCheckStatusEnum::POSTCODE_OUTDATED)
    echo "Postcode is outdated\n";
if(EnderecoAddressCheckStatusEnum::CITY_OUTDATED)
    echo "City name is outdated\n";
if(EnderecoAddressCheckStatusEnum::STREET_OUTDATED)
    echo "Street name is outdated\n";
if(EnderecoAddressCheckStatusEnum::HOUSE_NR_OUTDATED)
    echo "House number is outdated\n";
if(EnderecoAddressCheckStatusEnum::ADDRESS_AUTOMATICALLY_CORRECTED)
    echo "Address has been automatically corrected\n";
if(EnderecoAddressCheckStatusEnum::ADDRESS_IS_CORRECTABLE)
    echo "Address is correctable\n";
if(EnderecoAddressCheckStatusEnum::ADDRESS_HAS_BEEN_CORRECTED)
    echo "Address has been corrected\n";
if(EnderecoAddressCheckStatusEnum::ADDRESS_IS_TOO_AMBIGUOUS)
    echo "Address is too ambiguous\n";
if(EnderecoAddressCheckStatusEnum::ADDRESS_COULD_NOT_BE_FOUND)
    echo "Address not found\n";
if(EnderecoAddressCheckStatusEnum::POSTCODE_COULD_NOT_BE_FOUND)
    echo "Postcode not found\n";
if(EnderecoAddressCheckStatusEnum::CITY_COULD_NOT_BE_FOUND)
    echo "City name not found\n";
if(EnderecoAddressCheckStatusEnum::STREET_COULD_NOT_BE_FOUND)
    echo "Street name not found\n";
if(EnderecoAddressCheckStatusEnum::STREET_NR_COULD_NOT_BE_FOUND)
    echo "Street number not found\n";

//Getting corrections
foreach($result->getElements() as $correction) {
    echo "Postcode: ".$correction->getPostCode()."\n";
    echo "City: ".$correction->getCity()."\n";
    echo "Street: ".$correction->getStreet()."\n";
    echo "House Nr.: ".$correction->getHouseNumber()."\n";
    echo "Federal State: ".$correction->getFederalState()."\n";
    echo "\n\n";
}
```

### Usage of the Accounting Service

The Accounting Service is mandatory for customers that want to be billed
per address correction attempt rather than per WebService request.
It enables them to get an offer per address-related process which is oftentimes easier to calculate.

```
require_once __DIR__.'/../autoload.php';

$client = EnderecoClient::getInstance('your_tenant', 'username', 'password');

$client->doAccounting();
```

## Warning

Please do not use any dependencies from the Orwell packages other than those that will be
directly returned to you by the EnderecoClient. 

We will only maintain backward compatibility to those classes!

# Support

Feel free to ask for support at info@endereco.de - we are always there to help you!