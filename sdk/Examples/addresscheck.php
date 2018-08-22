<?php

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