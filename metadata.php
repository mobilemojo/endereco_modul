<?php
$sMetadataVersion = '2.0';

$aModule = array(
    'id'           => 'enderecoams203',
    'title'        => 'Endereco AMS',
    'description' => array(
        'en' => 'Adddressvalidation + Correction for webshops',
        'de' => 'Adressvalidierung + Korrekturvorschläge für Webshops',
    ),
    'thumbnail'    => 'endereco.png',
    'version'      => '2.2.2',
    'author'       => 'endereco',
    'email'        => 'info@endereco.de',
    'url'          => 'www.endereco.de',
    'extend' => array(),
    'controllers' => [
        'EnderecoController' => \mojo\enderecoAMS\enderecocontroller::class,
        'EnderecoController2' => \mojo\enderecoAMS\EnderecoController2::class,
        'EnderecoAMSCSSIncludeWidget' => \mojo\enderecoAMS\EnderecoAMSCSSIncludeWidget::class,
        'EnderecoAMSJSConfigWidget' => \mojo\enderecoAMS\EnderecoAMSJSConfigWidget::class,
        'EnderecoModalWidget' => \mojo\enderecoAMS\EnderecoModalWidget::class
    ],
    'templates' => array(
        'widget/enderecoamscssinputfiles.tpl' => 'mojo/enderecoAMS/application/views/widget/enderecoamscssinputfiles.tpl',
        'widget/enderecoamsjsconfig.tpl' => 'mojo/enderecoAMS/application/views/widget/enderecoamsjsconfig.tpl',
        'widget/enderecomodalwidget.tpl' => 'mojo/enderecoAMS/application/views/widget/enderecomodalwidget.tpl'
    ),
    'blocks' => array(
        ['template' => 'form/user_checkout_registration.tpl', 	'block' => 'user_checkout_registration', 	    'file' => 'jsInputFiles.tpl'],
        ['template' => 'form/user_checkout_noregistration.tpl','block' => 'user_checkout_noregistration',  	'file' => 'jsInputFiles.tpl'],
        ['template' => 'form/user_checkout_change.tpl', 		'block' => 'user_checkout_change', 		        'file' => 'jsInputFiles.tpl'],
        ['template' => 'form/fieldset/user_registration_billing.tpl', 'block' => 'form_user_billing_country',  'file' => 'jsInputFiles.tpl'],
        ['template' => 'form/fieldset/user_shipping.tpl', 		'block' => 'form_user_shipping_country', 	    'file' => 'jsInputFiles.tpl'],
        ['template' => 'form/fieldset/user_billing.tpl', 		'block' => 'form_user_billing_country', 	    'file' => 'jsInputFiles.tpl'],
        ['template' => 'form/fieldset/user_noaccount.tpl', 	'block' => 'user_noaccount_email', 		        'file' => 'jsInputFiles.tpl'],
        ['template' => 'layout/base.tpl', 	'block' => 'base_js',    'file' => 'addressCheckModal.tpl'],
    ),
    'settings' => array(
        ['group' => 'enderecoAMSMainSettings', 'name' => 'enderecoAMSMandator', 'type' => 'str',  'value' => ''],
        ['group' => 'enderecoAMSMainSettings', 'name' => 'enderecoAMSLogin', 'type' => 'str',  'value' => ''],
        ['group' => 'enderecoAMSMainSettings', 'name' => 'enderecoAMSPassword',    'type' => 'str', 'value' => ''],
        ['group' => 'enderecoAMSMainSettings', 'name' => 'enderecoAMSCheck', 'type' => 'bool', 'value' => 'true'],
        ['group' => 'enderecoAMSMainSettings', 'name' => 'enderecoAMSLogLevel', 'type' => 'select', 'value' => '0', 'constraints' => '0|1|2|3', 'position' => 0],
        ['group' => 'enderecoAMSStyling', 'name' => 'enderecoAMSStyling', 'type' => 'select', 'value' => '0', 'constraints' => '0|1|2|3', 'position' => 0 ],
        ['group' => 'enderecoAMSStyling', 'name' => 'enderecoAMSBootstrapModalCss', 'type' => 'bool', 'value' => 'true'],
        ['group' => 'enderecoAMSFrontend', 'name' => 'enderecoAMSShowAllCityNames', 'type' => 'bool', 'value' => 'true'],
    ),
    'events' => array(
        'onActivate'   => mojo\enderecoAMS\EnderecoAMS203Installer::class.'::onActivate',
        'onDeactivate' => mojo\enderecoAMS\EnderecoAMS203Installer::class.'::onDeactivate',
    )
);