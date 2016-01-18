<header>
    <div class="header-content">
        <div class="mini-info">
            <div class="socials">
                <a href="https://www.facebook.com/warisan.furniture" target="_blank"><i class="fa fa-facebook icon-facebook "></i></a>
                <a href="#" target="_blank"><i class="fa fa-instagram icon-instagram "></i></a>
                <a href="https://plus.google.com/+WarisanFurniture" target="_blank"><i class="fa fa-google-plus icon-google-plus"></i></a>
                <a href="https://www.linkedin.com/company/warisan/" target="_blank"><i class="fa fa-linkedin icon-linkedin"></i></a>
                <a href="https://www.pinterest.com/warisan/" target="_blank"><i class="fa fa-pinterest icon-pinterest "></i></a>
                <a href="http://www.houzz.com/" target="_blank"><img class="icon-houzz" src="{{ asset('assets/img/houzz.png') }}"></a>
            </div>
            <div class="accounts">
                @if(session('customer_id'))
                <span class="login"><a href="{{ baseUrl() . '/' . trans('url.account') }}">{{ $customer->name or trans('word.my_account') }}</a></span>
                <span class="create"><a href="{{ baseUrl() . '/' }}customer/logout">{{ trans('word.logout') }}</a></span>
                <span class="create"><a href="{{ baseUrl() . '/' . trans('url.checkout') }}"> - cart ({{ count($cart) }})</a></span>
                @else
                <span class="login"><a href="{{ baseUrl() . '/' . trans('url.login') }}">{{ trans('word.login') }}</a></span>
                <span class="create"><a href="{{ baseUrl() . '/' . trans('url.register') }}">{{ trans('word.create_an_account') }}</a></span>
                @endif
            </div>


            <div class="language-bar">
                <a href class="language-bar-button">{{ strtoupper(App::getLocale()) }}</a>
                <ul>
                    <li><a href="{{ url() . '/' }}">english</a></li>
                    <li><a href="{{ url() . '/' }}id/">indonesian</a></li>
                    <li><a href="{{ url() . '/' }}it/">italian</a></li>
                </ul>
            </div>

        </div>
        <div class="logo">
            <a href="{{ baseUrl() . '/' }}"><img src="{{ asset('assets/img/common/logo.png') }}"></a>
        </div>
        <div class="main_nav">
            <div class="search-box">
                <div class="search">
                    <form id="search-form">
                        <div class="search__inner">
                            <input id="search-input" placeholder="Search" type="text" class="search-input" autocomplete="off">
                        </div>
                        <input type="submit" class="search-submit"/><span class="icon-search"></span>
                    </form>
                </div>
            </div>
            <nav id="nav">
                <a href="#nav" title="Show navigation">Show navigation</a>
                <a href title="Hide navigation">Hide navigation</a>
                <ul class="clearfix">
                    <li>
                        <a href="{{ baseUrl() . '/' . trans('url.about') }}">{{ trans('word.about') }}</a>
                    </li>
                    <li>
                        <a href="{{ baseUrl() . '/' . trans('url.products') }}"><span>{{ trans('word.products') }}</span></a>
                        <?php #getCategory($warisan->getCategories()); ?>
                        <ul class="category-drop">
                            @foreach($navigation as $group)
                            <li>
                                <a href="{{ baseUrl() . '/group/' . $group->data->url }}">{{ $group->data->title }}</a>
                                <ul class="child-category">
                                    @foreach($group->categories as $category)
                                    <li>
                                        <a href="{{ baseUrl() . '/category/' . $category->data->url }}">{{ $category->data->title }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <a href="{{ baseUrl() . '/' . trans('url.projects') }}">{{ trans('word.projects') }}</a>
                    </li>
                    <li>
                        <a href="{{ baseUrl() . '/' . trans('url.materials') }}">{{ trans('word.materials') }}</a>
                    </li>
                    <li>
                        <a href="{{ baseUrl() . '/' . trans('url.showroom') }}">{{ trans('word.showroom') }}</a>
                    </li>
                    <li>
                        <a href="{{ baseUrl() . '/' . trans('url.contact') }}">{{ trans('word.contact') }}</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
