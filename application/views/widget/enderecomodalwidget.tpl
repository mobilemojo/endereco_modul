[{assign var="enderecoAMSTheme" value=$oView->getTheme()}]

[{if $enderecoAMSTheme == 2}][{*Bootstrap themes*}]
    <div id="enderecoAddressCheckModal" class="modal fade inputCheckModal" role="dialog" aria-labelledby="errorFoundMessage" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="panel panel-primary">
                <div class="panel-heading" id="shipping-address-suggestion-headline" style="display: none;"><span class="panel-title">[{oxmultilang ident="SUGG_POP_ISSHIPPING_CORRECT"}]</span></div>
                <div class="panel-heading" id="billing-address-suggestion-headline" style="display: none;"><span class="panel-title">[{oxmultilang ident="SUGG_POP_ISBILLING_CORRECT"}]</span></div>
                <button type="button" class="close" data-dismiss="modal"></button>
                <div class="panel-body">
                    <span class="description-text">[{oxmultilang ident="SUGG_POP_YOURADD"}]</span>
                    <div id="enderecoCurrentInput" class="form-group">
                        <script id="enderecoCurrentTypeTemplate" type="text/template">
                            <label><input type="radio" name="addressCorrection" data-id="{{id}}">{{postCode}} {{city}} {{street}} {{streetNumber}}</label>
                        </script>
                    </div>
                    <span class="description-text">[{oxmultilang ident="SUGG_POP_OURSUGG"}]</span>
                    <div id="enderecoCorrectedSuggestions" class="form-group">
                        <script id="enderecoCorrectionTypeTemplate" type="text/template">
                            <label><input type="radio" name="addressCorrection" data-id="{{id}}">{{postCode}} {{city}} {{street}} {{streetNumber}}</label>
                        </script>
                    </div>
                    <div class="could-not-find-corrections">[{oxmultilang ident="COULD_NOT_FIND_CORRECTIONS"}]</div>
                    <button id="enderecoCorrectAddressButton" class="btn btn-primary pull-right">[{oxmultilang ident="SUGG_POP_UPDATEADD"}]</button>
                </div>
            </div>
        </div>
    </div>
[{else}][{*Regular endereco theme*}]
    <div id="enderecoAddressCheckModal" class="modal fade inputCheckModal" role="dialog" aria-labelledby="errorFoundMessage" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="headline" id="shipping-address-suggestion-headline" style="display: none;">[{oxmultilang ident="SUGG_POP_ISSHIPPING_CORRECT"}]</div>
                <div class="headline" id="billing-address-suggestion-headline" style="display: none;">[{oxmultilang ident="SUGG_POP_ISBILLING_CORRECT"}]</div>
                <button type="button" class="close" data-dismiss="modal"></button>
                <div class="modal-body">
                    <div class="content">
                        <span class="description-text">[{oxmultilang ident="SUGG_POP_YOURADD"}]</span>
                        <div id="enderecoCurrentInput" class="current">
                            <script id="enderecoCurrentTypeTemplate" type="text/template">
                                <label><input type="radio" name="addressCorrection" data-id="{{id}}">{{postCode}} {{city}} {{street}} {{streetNumber}}</label>
                            </script>
                        </div>
                        <span class="description-text">[{oxmultilang ident="SUGG_POP_OURSUGG"}]</span>
                        <div id="enderecoCorrectedSuggestions" class="corrected">
                            <script id="enderecoCorrectionTypeTemplate" type="text/template">
                                <label><input type="radio" name="addressCorrection" data-id="{{id}}">{{postCode}} {{city}} {{street}} {{streetNumber}}</label>
                            </script>
                        </div>
                        <div class="could-not-find-corrections">[{oxmultilang ident="COULD_NOT_FIND_CORRECTIONS"}]</div>
                    </div>
                    <button id="enderecoCorrectAddressButton" class="correct-address">[{oxmultilang ident="SUGG_POP_UPDATEADD"}]</button>
                </div>
            </div>
        </div>
    </div>
[{/if}]
