<?php
// Set navbar for each user role
$navigation = Config::get('navbar');
?>

<m-mobile-nav>

    <?php foreach($navigation as $nav => $navlinks): ?>

    <m-mobile-nav-menu data-label="{{ $nav }}">
        <?php foreach($navlinks as $linkUrl => $linkName): ?>
        <a href="{{ URL::to('/') }}/admin/{{ $linkUrl }}">{{ $linkName }}</a>
        <?php endforeach ?>
    </m-mobile-nav-menu>

    <?php endforeach ?>

    <a href="/admin/logout" id="mobile-logout">logout</a>
</m-mobile-nav>
