[{assign var="enderecoAMSLogLevel" value=$oView->getLogLevel()}]
[{assign var="enderecoAMSCheckUnchangedAddresses" value=$oView->getCheckUnchangedAddresses()}]
[{assign var="enderecoAMSTheme" value=$oView->getTheme()}]

[{capture assign="loggingLevelAndAddressCheckConfig"}]
    E.Validation.checkUnchangedAddresses = [{if $enderecoAMSCheckUnchangedAddresses}]true[{else}]false[{/if}];
    E.Validation.genderInputType = "select";
    E.Validation.dropdownClass = "standard-dropdown";

    [{if $enderecoAMSTheme == 1}]
        E.Validation.genderInputType = "radio";
    [{elseif $enderecoAMSTheme == 2}]
        E.Validation.genderInputType = "select";
        E.Validation.dropdownClass = "form-control";
    [{elseif $enderecoAMSTheme == 3}]
        [{*Maybe use your custom input type here*}]
    [{/if}]

    [{if $enderecoAMSLogLevel == 0}]
        E.log.setLevel(E.log.OFF);
    [{elseif $enderecoAMSLogLevel == 1}]
        E.log.setLevel(E.log.ERROR);
    [{elseif $enderecoAMSLogLevel == 2}]
        E.log.setLevel(E.log.WARN);
    [{elseif $enderecoAMSLogLevel == 3}]
        E.log.setLevel(E.log.DEBUG);
    [{/if}]
[{/capture}]

[{oxscript add=$loggingLevelAndAddressCheckConfig}]