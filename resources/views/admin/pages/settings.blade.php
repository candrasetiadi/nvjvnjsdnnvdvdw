@extends('admin.master')
@section('page', 'settings')
@section('content')

<m-template settings class="flexbox flexbox-wrap">

    <m-settings-group>
        <h3>general</h3>
        <m-card>

            <m-settings-item button data-function="getGeneralInfo">
                <i class="material-icons">public</i>
                <m-settings-item-desc>
                    <m-settings-item-header>general website information</m-settings-item-header>
                    <m-settings-item-detail>General website information such as email address, phone number, contact person, store location etc.</m-settings-item-detail>
                </m-settings-item-desc>
            </m-settings-item>

            <m-settings-item button data-function="getSocialInfo">
                <i class="material-icons">people</i>
                <m-settings-item-desc>
                    <m-settings-item-header>social networking</m-settings-item-header>
                    <m-settings-item-detail>Social accounts to be displayed on the homepage e.g facebook, twitter, instagram etc.</m-settings-item-detail>
                </m-settings-item-desc>
            </m-settings-item>

            <m-settings-item button data-function="getPublicInfo">
                <i class="material-icons">public</i>
                <m-settings-item-desc>
                    <m-settings-item-header>locale</m-settings-item-header>
                    <m-settings-item-detail>Set your social network profile URL to be displayed on the website</m-settings-item-detail>
                </m-settings-item-desc>
            </m-settings-item>

        </m-card>
    </m-settings-group>

    <m-settings-group>
        <h3>currency conversion</h3>
        <m-card>

            <m-settings-item button data-function="fetchConversion">
                <i class="material-icons">attach_money</i>
                <m-settings-item-desc>
                    <m-settings-item-header>Fetch Rate</m-settings-item-header>
                    <m-settings-item-detail>Fetch the most up-to-date conversion rate from the internet(powered by Google)</m-settings-item-detail>
                </m-settings-item-desc>
            </m-settings-item>

            <m-settings-item button data-function="getExchangeRate">
                <i class="material-icons">input</i>
                <m-settings-item-desc>
                    <m-settings-item-header>Manual Input</m-settings-item-header>
                    <m-settings-item-detail>Manually set the conversion rate to available currencies</m-settings-item-detail>
                </m-settings-item-desc>
            </m-settings-item>

            <m-settings-item checkbox data-function="autoExchangeUpdate">
                <i class="material-icons">schedule</i>
                <m-settings-item-desc>
                    <m-settings-item-header>Allow automatic update</m-settings-item-header>
                    <m-settings-item-detail>Exchange rates will be automatically updated daily</m-settings-item-detail>
                </m-settings-item-desc>
                <m-checkbox>
                    <input type="checkbox" {{ $autoCurrency ? 'checked' : '' }}>
                    <lever></lever>
                </m-checkbox>
            </m-settings-item>

        </m-card>
    </m-settings-group>

    <m-settings-group>
        <h3>index/cache management</h3>
        <m-card>

            <m-settings-item button data-function="reindexData">
                <i class="material-icons">data_usage</i>
                <m-settings-item-desc>
                    <m-settings-item-header>reindex data</m-settings-item-header>
                    <m-settings-item-detail>Recreate sitemap, reindex products catalog and price rules</m-settings-item-detail>
                </m-settings-item-desc>
            </m-settings-item>

            <m-settings-item button>
                <i class="material-icons">memory</i>
                <m-settings-item-desc>
                    <m-settings-item-header>flush cache</m-settings-item-header>
                    <m-settings-item-detail>Flush cache folder. Sometimes neccessary when editing static blocks</m-settings-item-detail>
                </m-settings-item-desc>
            </m-settings-item>

        </m-card>
    </m-settings-group>

    <m-settings-group>
        <h3>dummy settings</h3>
        <m-card>
            <m-settings-item checkbox>
                <i class="material-icons">business</i>
                <m-settings-item-desc>
                    <m-settings-item-header>lorem ipsum dolor</m-settings-item-header>
                    <m-settings-item-detail>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro, ab!</m-settings-item-detail>
                </m-settings-item-desc>
                <m-checkbox>
                    <input type="checkbox" checked>
                    <lever></lever>
                </m-checkbox>
            </m-settings-item>

            <m-settings-item button>
                <i class="material-icons">apps</i>
                <m-settings-item-desc>
                    <m-settings-item-header>a couple of lines of description - long title</m-settings-item-header>
                    <m-settings-item-detail>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis voluptate distinctio fuga voluptatem iure nostrum laudantium delectus veniam doloribus minima expedita natus ducimus magni, est.</m-settings-item-detail>
                </m-settings-item-desc>
            </m-settings-item>

            <m-settings-item checkbox>
                <i class="material-icons">subject</i>
                <m-settings-item-desc>
                    <m-settings-item-header>multiline description</m-settings-item-header>
                    <m-settings-item-detail>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam quae, voluptates veritatis illo sunt doloribus deserunt veniam autem quibusdam rem impedit corporis earum ducimus ipsum nesciunt dolor inventore et quos quidem cumque accusamus voluptas magnam, fugit perspiciatis ipsam. Molestiae, est, quas! Non id, sapiente dolor asperiores praesentium commodi debitis quam.</m-settings-item-detail>
                </m-settings-item-desc>
                <m-checkbox>
                    <input type="checkbox">
                    <lever></lever>
                </m-checkbox>
            </m-settings-item>
        </m-card>
    </m-settings-group>
</m-template>

@stop

@section('modal')

<m-modal-wrapper id="settings-general-form">

    {!! Form::open(array('class' => 'modal-window', 'id' => 'general-form', 'data-function' => 'doNothing', 'data-url' => 'settings/social/set', 'style' => 'max-width: 480px')) !!}
    <h3>general information</h3>
    <m-input-group>
        <m-input fwidth>
            <input type="text" id="social-input-email" name="social[email]">
            <label for="social-input-email">email</label>
        </m-input>

        <m-input fwidth>
            <input type="text" id="social-input-phone" name="social[phone]">
            <label for="social-input-phone">phone</label>
        </m-input>

        <m-input fwidth>
            <input type="text" id="social-input-google" name="social[google]">
            <label for="social-input-google">google</label>
        </m-input>

        <m-input fwidth>
            <input type="text" id="social-input-linkedin" name="social[linkedin]">
            <label for="social-input-linkedin">linkedin</label>
        </m-input>
    </m-input-group>

    <input type="hidden" name="edit" value="0" id="edit-flag">

    <div class="button-holder align-right">
        <m-button plain modal-close>cancel</m-button>
        <m-button plain save-form>save</m-button>
    </div>
    {!! Form::close() !!}
</m-modal-wrapper>

<m-modal-wrapper id="settings-social-form">

    {!! Form::open(array('class' => 'modal-window', 'id' => 'account-form', 'data-function' => 'doNothing', 'data-url' => 'settings/social/set', 'style' => 'max-width: 480px')) !!}
    <h3>social network accounts</h3>
    <m-input-group>
        <m-input fwidth>
            <input type="text" id="social-input-facebook" name="social[facebook]">
            <label for="social-input-facebook">facebook</label>
        </m-input>
        <m-input-desc>
            Requires full facebook url e.g: http://www.facebook.com/borislemke
        </m-input-desc>

        <m-input fwidth>
            <input type="text" id="social-input-twitter" name="social[twitter]">
            <label for="social-input-twitter">twitter</label>
        </m-input>

        <m-input fwidth>
            <input type="text" id="social-input-google" name="social[google]">
            <label for="social-input-google">google</label>
        </m-input>

        <m-input fwidth>
            <input type="text" id="social-input-youtube" name="social[youtube]">
            <label for="social-input-youtube">youtube</label>
        </m-input>

        <m-input fwidth>
            <input type="text" id="social-input-linkedin" name="social[linkedin]">
            <label for="social-input-linkedin">linkedin</label>
        </m-input>

        <m-input fwidth>
            <input type="text" id="social-input-instagram" name="social[instagram]">
            <label for="social-input-instagram">instagram</label>
        </m-input>

        <m-input fwidth>
            <input type="text" id="social-input-pinterest" name="social[pinterest]">
            <label for="social-input-pinterest">pinterest</label>
        </m-input>
    </m-input-group>

    <input type="hidden" name="edit" value="0" id="edit-flag">

    <div class="button-holder align-right">
        <m-button plain modal-close>cancel</m-button>
        <m-button plain save-form>save</m-button>
    </div>
    {!! Form::close() !!}
</m-modal-wrapper>


<m-modal-wrapper id="settings-currency-form">

    {!! Form::open(array('class' => 'modal-window', 'id' => 'currency-form', 'data-function' => 'doNothing', 'data-url' => 'settings/currency/set', 'style' => 'max-width: 480px')) !!}
    <h3>exchange rate</h3>
    <m-input-group>
        <m-input fwidth>
            <input type="text" id="currency-input-idr" name="currencies[idr]">
            <label for="currency-input-idr">idr</label>
        </m-input>

        <m-input fwidth>
            <input type="text" id="currency-input-eur" name="currencies[eur]">
            <label for="currency-input-eur">eur</label>
        </m-input>

        <m-input fwidth>
            <input type="text" id="currency-input-rub" name="currencies[rub]">
            <label for="currency-input-rub">rub</label>
        </m-input>
        <m-input-desc>
            Define how much of each currency is equal to 1 USD
        </m-input-desc>
    </m-input-group>

    <input type="hidden" name="edit" value="0" id="edit-flag">

    <div class="button-holder align-right">
        <m-button plain modal-close>cancel</m-button>
        <m-button plain save-form>save</m-button>
    </div>
    {!! Form::close() !!}
</m-modal-wrapper>
@stop


@section('scripts')
<script>
    Matter.admin.settings();
</script>
@stop
