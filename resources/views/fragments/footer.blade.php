<footer>
    <div class="footer-content">
        <div class="footer-about">
            <span class="title">about us</span>
            <span class="description">
                <a href="{{ baseUrl() . '/' . trans('url.about') }}">
                    Established in 1989 as a purveyor of high quality antiques, Warisan progressively grew to become a modern high end hospitality furniture manufacturer in Bali with several offices and showrooms worldwide. From Bali to the Balkans, from California to the Caribbean's, from Mallorca to the Maldives you may find Warisan's solid mahogany &amp; teak furniture in many of the most elegant and luxurious properties.
                </a>
            </span>
        </div>
        <!-- END FOOTER ABOUT -->
        <div class="footer-info">
            <div class="footer-info-col">
                <span class="title">pages</span>
                <ul>
                    <li><a href="{{ baseUrl() }}">{{ trans('word.home') }}</a></li>
                    <li><a href="{{ baseUrl() . '/' . trans('url.products') }}">{{ trans('word.products') }}</a></li>
                    <li><a href="{{ baseUrl() . '/' . trans('url.projects') }}">{{ trans('word.projects') }}</a></li>
                    <li><a href="{{ baseUrl() . '/' . trans('url.materials') }}">{{ trans('word.materials') }}</a></li>
                    <li><a href="{{ baseUrl() . '/' . trans('url.showroom') }}">{{ trans('word.showroom') }}</a></li>
                    <li><a href="{{ baseUrl() . '/' . trans('url.contact') }}">{{ trans('word.contact') }}</a></li>
                </ul>
            </div>
            <!-- END FOOTER MENU 1 -->
            <div class="footer-info-col">
                <span class="title">informations</span>
                <ul>
                    <li><a href="{{ baseUrl() . '/' . trans('url.account') }}#order">{{ trans('word.my_orders') }}</a></li>
                    <li><a href="{{ baseUrl() . '/' . trans('url.account') }}">{{ trans('word.my_personal_info') }}</a></li>
                    <li><a href="{{ baseUrl() . '/' . trans('url.about') }}#faqs">FAQs</a></li>
                    <li><a href="{{ baseUrl() . '/' . trans('url.about') }}#privacy">{{ trans('word.privacy_policy') }}</a></li>
                    <li><a href="{{ baseUrl() . '/' . trans('url.about') }}#sales">{{ trans('word.condition_of_sales') }}</a></li>
                    <li><a href="{{ baseUrl() . '/' . trans('url.about') }}#terms">{{ trans('word.terms_and_conditions') }}</a></li>
                </ul>
            </div>
            <!-- END FOOTER MENU 2 -->
            <div class="footer-info-col">
                <span class="title">contact us</span>
                <div class="box-info">
                    <span class="img"><img src="{{ asset('assets/img/common/phone.png') }}" height="30"></span>
                    <span class="text">
                        <a href="tel:+6281805439492"><strong>+62 818 0543 94 92</strong></a>
                        <em>Informations</em>
                    </span>
                </div>
                <div class="box-info">
                    <span class="img"><img src="{{ asset('assets/img/common/envelope.png') }}" height="28"></span>
                    <span class="text">
                        <a href="mailto:contact@warisan.com"><strong>contact@warisan.com</strong></a>
                        <em>Orders &amp; Informations</em>
                    </span>
                </div>
            </div>
            <!-- END FOOTER MENU 2 -->
        </div>

        <div class="footer-socials flexbox">
            <a href="https://www.facebook.com/warisan.furniture" target="_blank"><i class="fa fa-facebook icon-facebook "></i></a>
            <a href="#" target="_blank"><i class="fa fa-instagram icon-instagram "></i></a>
            <a href="https://plus.google.com/+WarisanFurniture" target="_blank"><i class="fa fa-google-plus icon-google-plus"></i></a>
            <a href="https://www.linkedin.com/company/warisan/" target="_blank"><i class="fa fa-linkedin icon-linkedin"></i></a>
            <a href="https://www.pinterest.com/warisan/" target="_blank"><i class="fa fa-pinterest icon-pinterest "></i></a>
            <a href="http://www.houzz.com/" target="_blank"><img class="icon-houzz" src="{{ asset('assets/img/houzz.png') }}"></a>
        </div>

    </div><!-- END FOOTER ABOUT -->
</footer>
