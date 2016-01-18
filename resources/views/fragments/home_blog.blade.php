<?php

function getBlogDate($dateIn) {

    $months = [0, 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    $dateEx = explode(' ', $dateIn);

    $date = reset($dateEx);

    $tokens = explode('-', $date);

    $monthN = $tokens[1];

    $dayN = $tokens[2];

    return array('m' => $months[$monthN], 'd' => $dayN);
}
?>

@foreach($blogs as $blog)
<a href="{{ baseUrl() . '/blog/' . $blog->url }}" class="blog-item">
    <div class="item">
        <div class="desc" style="background-image: url({{ asset('media/blog') . '/' . $blog->image }})">
            <!--			<span class="date">{-- getBlogDate($blog['created_at'])['m'] . ' ' . getBlogDate($blog['created_at'])['d'] --}<br>-->
            <!--				<span class="month">{-- getBlogDate($blog['created_at'])['d'] --}</span>-->
            <!--			</span>-->
        </div>
        <!--		<div class="picture" style="background-image: url({{ baseUrl() }}/matter/app/upload/blog/{{ $blog->image }})"></div> -->
        <div class="desc-bottom">
            <h2>{{ str_limit($blog->title, 28) }}</h2>
            <p>{{ str_limit($blog->title, 40) }}</p>
        </div>
    </div>
</a>
@endforeach
