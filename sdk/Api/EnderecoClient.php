<?php

require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'autoload.php';

class EnderecoClient {

    /**
     * @var EnderecoClient singleton
     */
    private static $_instance;

    /**
     * Creates a Singleton with the given credentials.
     * Note: Calling this method multiple times always overrides the credentials of the
     * singleton. It is not possible to use multiple EnderecoClient instances with
     * different credentials.
     *
     * This is caused by legacy dependencies which will be removed in future releases of the
     * Endereco PHP SDK.
     *
     * @param $mandator
     * @param $user
     * @param $password
     * @return EnderecoClient singleton
     */
    public static function getInstance($mandator, $user, $password) {
        define('ORWELL_MANDATOR', $mandator);
        define('ORWELL_LOGIN', $user);
        define('ORWELL_PASSWORD', $password);

        if(null == self::$_instance)
            self::$_instance = new EnderecoClient();

        return self::$_instance;
    }

    /**
     * EnderecoClient constructor
     */
    protected function __construct()
    {

    }

    /**
     * Sends a Request to the Endereco WebService API.
     *
     * @param EnderecoAbstractRequest $request
     * @throws EnderecoClientException
     * @return OrwellAbstractResult
     */
    public function executeRequest(EnderecoAbstractRequest $request) {
        try {
            $adaptedRequest = $this->adaptRequestToOldApi($request);

            $port = new OrwellLibAjaxPort();
            $result = $port->execute($adaptedRequest);
        }
        catch(Exception $e)
        {
            throw new EnderecoClientException($e->getMessage(), $e->getCode(), $e);
        }
        return $result;
    }

    /**
     * Sends an Accounting Request to the Endereco WebService API.
     */
    public function doAccounting() {
        $client = new SoapClient(ORWELL_ACCOUNTING_URL);
        $client->doAccounting(
            ORWELL_MANDATOR,
            ORWELL_LOGIN,
            ORWELL_PASSWORD,
            1,
            'AddressServices'
        );
    }

    /**
     * This method converts the given Request into an Array Structure that is supported by the legacy API.
     * Note: Internal use only!
     * @internal
     * @param EnderecoAbstractRequest $request
     * @return array
     */
    protected function adaptRequestToOldApi(EnderecoAbstractRequest $request) {
        $reflectionClass = new ReflectionClass(get_class($request));
        $aResult = array();

        $this->_fillProperties($aResult, $reflectionClass, $request);

        if(isset($aResult['transaction']) && null === $aResult['transaction'])
            unset($aResult['transaction']);
        return $aResult;
    }

    /**
     * Extracts all properties of the given $request object and pushes them into the given $aResult array.
     *
     * @internal
     * @param array $aResult
     * @param ReflectionClass $reflectionClass
     * @param EnderecoAbstractRequest $request
     */
    protected function _fillProperties(&$aResult, ReflectionClass $reflectionClass, EnderecoAbstractRequest $request) {
        foreach ($reflectionClass->getProperties() as $property) {
            $property->setAccessible(true);
            $aResult[$property->getName()] = $property->getValue($request);
            $property->setAccessible(false);
        }
        if($reflectionClass = $reflectionClass->getParentClass())
            $this->_fillProperties($aResult, $reflectionClass, $request);
    }
}