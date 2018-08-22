<?php

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
