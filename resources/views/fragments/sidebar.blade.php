<aside class="sidenav-product">
    <div class="sidenav-box">
        <span class="title_side_nav">categories</span>
        <ul class="sidebar-categories">
            <ul class="category-drop">
                @foreach($navigation as $group)
                <li>
                    <a href="{{ baseUrl() . '/group/' . $group->data->url }}">{{ $group->data->title }}</a>
                    <ul class="child-category">
                        @foreach($group->categories as $category)
                        <li>
                            <a href="{{ baseUrl() . '/category/' . $category->data->url }}">{{ $category->data->title }}</a>
                            <ul class="child-category grandchild-category" style="max-height: 132px">
                                @foreach($category->subcategories as $subcategory)
                                <li>
                                    <a href="{{ baseUrl() . '/subcategory/' . $subcategory->data->url }}">{{ $subcategory->data->title }}</a>
                                </li>
                                @endforeach
                            </ul>
                            <a class="expand"></a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
            <li>
                <a href="{{ baseUrl() . '/' . trans('url.bestseller') }}/">{{ trans('url.bestseller') }}</a>
            </li>
            <li>
                <a href="{{ baseUrl() . '/' . trans('url.overstock') }}/">{{ trans('url.overstock') }}</a>
            </li>
        </ul>
    </div>
</aside>
