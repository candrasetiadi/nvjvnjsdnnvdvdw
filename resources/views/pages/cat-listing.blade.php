@extends('index')
@section('title', "$product->title")
@section('content')

<link rel="stylesheet" href="{{ asset('assets/phpcss/products.css') }}">
<div class="content">
    @include('fragments.sidebar')

    <h3>Products from @{{ GROUP }}</h3>

    <div class="products-listing" style="margin-top: 24px; overflow: hidden;" data-page="1" data-sort="DESC">


        <? if(isset($_GET['par']) && $warisan->toEnglish($_GET['par']) == 'search'): ?>

        <? foreach($warisan->searchCollection($_GET['par_2']) as $productId => $productInfo): ?>

        <? $slug = preg_replace("/[^A-Za-z0-9\-]/", '', strtolower(str_replace(' ', '-', $productInfo['title']))); ?>

        <div class="product-box">
            <div class="product-box-img">
                <img src="http://warisan.com/produk/<?= $productInfo['image'] ?>" class="img-responsive">
            </div>
            <div class="product-box-desc">
                <div class="product-desc-position">
                    <span class="product-name"><a href="<?= $PUBLIC_PATH . $warisan->translateUrl('product-detail') ?>/<?= $productInfo['id'] . '/' . $slug?>/"><?= $productInfo['title'] ?></a></span>
                    <span class="product-size"><?= $productInfo['sku'] ?></span>
                    <span class="product-link"><a href="<?= $PUBLIC_PATH . $warisan->translateUrl('product-detail') ?>/<?= $productInfo['id'] . '/' . $slug?>/"><?=$warisan->translate('view')?></a></span>
                </div>
            </div>
        </div>

        <? endforeach ?>

        <? elseif(isset($_GET['par']) && $warisan->toEnglish($_GET['par']) == 'category'): ?>

        <? foreach($warisan->getCatByGroup($warisan->getGroupId($_GET['par_2']), TRUE) as $cat): ?>
        <? $picture = $warisan->getLatestImageFromCategory($cat['id']) ?>

        <a href="<?= $PUBLIC_PATH . $warisan->translateUrl('products') . '/' . $warisan->translate('subcategory') . '/' . $cat['id'] ?>" class="category-box-link">
            <div class="category-box">
                <div class="category-box-img" style="background-image: url('http://warisan.com/produk/<?= $picture ?>');"></div>
                <p class="category-box-title"><?= $cat["title"] ?></p>
            </div>
        </a>

        <? endforeach ?>

        <? elseif(isset($_GET['par']) && $warisan->toEnglish($_GET['par']) == 'subcategory'): ?>

        <? $products = $warisan->getProductsByCatSql($_GET['par_2'], TRUE) ?>

        <? if(count($products) != 0): ?>

        <? foreach($warisan->getProductsByCatSql($_GET['par_2'], TRUE) as $productId => $productInfo): ?>

        <? $slug = preg_replace("/[^A-Za-z0-9\-]/", '', strtolower(str_replace(' ', '-', $productInfo['title']))); ?>

        <div class="product-box">
            <div class="product-box-img">
                <img src="http://warisan.com/produk/<?= $productInfo['image'] ?>" class="img-responsive">
            </div>
            <div class="product-box-desc">
                <div class="product-desc-position">
                    <span class="product-name"><a href="<?= $PUBLIC_PATH . $warisan->translateUrl('product-detail') ?>/<?= $productInfo['id'] . '/' . $slug?>/"><?= $productInfo['title'] ?></a></span>
                    <span class="product-size"><?= $productInfo['sku'] ?></span>
                    <span class="product-link"><a href="<?= $PUBLIC_PATH . $warisan->translateUrl('product-detail') ?>/<?= $productInfo['id'] . '/' . $slug?>/"><?=$warisan->translate('view')?></a></span>
                </div>
            </div>
        </div>

        <? endforeach ?>

        <? else: ?>

        <p style="margin-bottom: 8px">No products found under this category.</p>

        <? endif ?>

        <? elseif(isset($_GET['par']) && $warisan->toEnglish($_GET['par']) == 'subgroup'): ?>

        <? $products = $warisan->getProductsBySubSql($_GET['par_2'], TRUE) ?>

        <? if(count($products) != 0): ?>

        <? foreach($warisan->getProductsBySubSql($_GET['par_2'], TRUE) as $productId => $productInfo): ?>

        <? $slug = preg_replace("/[^A-Za-z0-9\-]/", '', strtolower(str_replace(' ', '-', $productInfo['title']))); ?>

        <div class="product-box">
            <div class="product-box-img">
                <img src="http://warisan.com/produk/<?= $productInfo['image'] ?>" class="img-responsive">
            </div>
            <div class="product-box-desc">
                <div class="product-desc-position">
                    <span class="product-name"><a href="<?= $PUBLIC_PATH . $warisan->translateUrl('product-detail') ?>/<?= $productInfo['id'] . '/' . $slug?>/"><?= $productInfo['title'] ?></a></span>
                    <span class="product-size"><?= $productInfo['sku'] ?></span>
                    <span class="product-link"><a href="<?= $PUBLIC_PATH . $warisan->translateUrl('product-detail') ?>/<?= $productInfo['id'] . '/' . $slug?>/"><?=$warisan->translate('view')?></a></span>
                </div>
            </div>
        </div>

        <? endforeach ?>

        <? else: ?>

        <p style="margin-bottom: 8px">No products found under this category.</p>

        <? endif ?>

        <? else: ?>

        <? foreach($warisan->getProductCategories(TRUE) as $group): ?>
        <? $picture = $warisan->getLatestImageFromGroup($group['id']) ?>

        <a href="<?= $PUBLIC_PATH . $warisan->translateUrl('products') . '/' . $warisan->translate('category') . '/' . $group['url_' . $warisan->language] ?>" class="category-box-link">
            <div class="category-box">
                <div class="category-box-img" style="background-image: url('http://warisan.com/produk/<?= $picture ?>');"></div>
                <p class="category-box-title"><?= $group["title"] ?></p>
            </div>
        </a>

        <? endforeach ?>

        <? endif ?>

    </div>
</div>

<? if(!isset($_GET['par'])): ?>
<script>
    var blockH, items, sortOrder;

    $(document).ready(function() {

        items = 24;

        sortOrder = $('.products-listing').attr('data-sort');
    });

    $(document).on('click', '#view-more-products', function(e) {

        e.preventDefault();

        var page = $('.products-listing').attr('data-page');

        getCollection(((items * parseInt(page)) + 1), 24, false);

        $('#current-item-shown').html(24 * (parseInt(page) + 1));

        $('.products-listing').attr('data-page', (parseInt(page) + 1));
    });

    function getCollection(start, limit, meth) {

        return $.ajax({

            url: baseUrl + 'matter/app/AjaxInterface.php',

            type: 'POST',

            data: {access_db: 1, method: 'range', database: 'catalog', start: start, limit: limit, order: sortOrder},

            dataType: 'json',

            async: true,

            error: function(xhr, status, message){

            console.log(xhr);

            console.log(status);

            console.log(message);

        }}).done(function(data) {

            var products = '';

            $.each(data, function(key, value) {

                products += '<div class="product-box">';
                products += '<div class="product-box-img">';
                products += '<img src="http://warisan.com/produk/' + value.image + '" class="img-responsive">';
                products += '</div>';
                products += '<div class="product-box-desc">';
                products += '<div class="product-desc-position">';
                products += '<span class="product-name"><a href="<?= $PUBLIC_PATH . $warisan->translateUrl("product-detail") ?>/' + value.id + '/' + value.slug + '/">' + value.title + '</a></span>';
                products += '<span class="product-size">' + value.sku + '</span>';
                products += '<span class="product-link"><a href="<?= $PUBLIC_PATH . $warisan->translateUrl("product-detail") ?>/' + value.id + '/' + value.slug + '/"><?= $warisan->translate('view') ?></a></span>';
                products += '</div>';
                products += '</div>';
                products += '</div>';

            });

            switch(meth) {

                case true:

                    $('.products-listing').html(products);

                    break;

                default:

                    $('.products-listing').append(products);
            }
        });

    }

</script>
<? endif ?>

@stop
