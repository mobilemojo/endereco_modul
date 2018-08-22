<?php

/*
 *	Created: 	10.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

/**
 * Class OrwellAccounting
 * @internal
 */
class OrwellAccounting {

    /**
     *
     * @param OrwellAddressCheckRequest $request
     * @return OrwellAddressCheckResult
     */
    public function accounting(){








        $client = new SoapClient(ORWELL_ACCOUNTING_URL);


        $result = $client->doAccounting(
            ORWELL_MANDATOR,
            ORWELL_LOGIN,
            ORWELL_PASSWORD,
            1000,
            1
        );

        //$requestArray = Utility::getValuesInArray($request, "OrwellAccountingRequest");

        //array_unshift($requestArray, ORWELL_MANDATOR, ORWELL_LOGIN, ORWELL_PASSWORD);

       // $result = $client->__soapCall("doAccounting", $requestArray);

       //$oacResult = new OrwellAddressCheckResult($result);

       // return $oacResult;
        return $result ;
    }
}

?>