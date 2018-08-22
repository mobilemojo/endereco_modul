[{oxid_include_widget cl="EnderecoAMSCSSIncludeWidget"}]

[{oxscript include=$oViewConf->getModuleUrl('enderecoams203','out/src/libs/jquery-1.11.3.min.js')  }]
[{oxscript include=$oViewConf->getModuleUrl('enderecoams203','out/src/libs/awesomplete.js')  }]
[{oxscript include=$oViewConf->getModuleUrl('enderecoams203','out/src/libs/bootstrap.modal.min.js')}]
[{oxscript include=$oViewConf->getModuleUrl('enderecoams203','out/src/libs/logger.js')}]
[{oxscript include=$oViewConf->getModuleUrl('enderecoams203','out/src/libs/mustache.min.js')  }]
[{oxscript include=$oViewConf->getModuleUrl('enderecoams203','out/src/libs/E.ValidatorFramework-1.0.5.min.js')}]
[{oxscript include=$oViewConf->getModuleUrl('enderecoams203','out/src/libs/E.Validation-1.1.7.debug.js')}]
[{oxscript include=$oViewConf->getModuleUrl('enderecoams203','out/src/inputAssistant.js')}]
[{oxscript include=$oViewConf->getModuleUrl('enderecoams203','out/src/addressCheck.js')}]

[{assign var="sitepath" value=$oViewConf->getBaseDir()}]
[{capture assign="serverUri"}]
    E.getCommunicationService().setServerUri("[{$sitepath}]");
    E.getCommunicationService().setStandardPath("?cl=enderecocontroller");
[{/capture}]
[{oxscript add=$serverUri}]

[{oxid_include_widget cl="EnderecoAMSJSConfigWidget"}]

[{$smarty.block.parent}]