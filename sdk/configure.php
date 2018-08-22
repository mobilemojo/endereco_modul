<?php
	define('ORWELL_PROTOCOL', 'https');
	define('ORWELL_DOMAIN', 'www.endereco.de');
	define('ORWELL_PORT', '443');
	define('ORWELL_ALLOW_INTERNATIONALADDRESSCHECK', true);
	define('ORWELL_PREFIX', ORWELL_PROTOCOL."://".ORWELL_DOMAIN.":".ORWELL_PORT);
	define('ORWELL_ADDRESSCHECK_URL', ORWELL_PREFIX.'/masterdata/webservice/axis/services/OrwellAddressCheckV3_1?wsdl');
	define('ORWELL_INTERNATIONALADDRESSCHECK_URL', ORWELL_PREFIX.'/masterdata/webservice/axis/services/OrwellInternationalAddressCheckV2_0?wsdl');
	define('ORWELL_INPUTASSISTANT_URL', ORWELL_PREFIX."/masterdata/webservice/axis/services/OrwellInputAssistantV1_2?wsdl");
	define('ORWELL_BANKSEARCH_URL', ORWELL_PREFIX."/masterdata/webservice/axis/services/OrwellBankSearchV1_0?wsdl");
	define('ORWELL_ACCOUNTCHECK_URL', ORWELL_PREFIX."/masterdata/webservice/axis/services/OrwellAccountCheck?wsdl");
	define('ORWELL_INTERNATIONALINPUTASSISTANT_URL', ORWELL_PREFIX."/masterdata/webservice/axis/services/OrwellInternationalInputAssistantV1_0?wsdl");
	define('ORWELL_ACCOUNTING_URL', ORWELL_PREFIX."/masterdata/webservice/axis/services/OrwellAccountingServiceV1_0?wsdl");
?>