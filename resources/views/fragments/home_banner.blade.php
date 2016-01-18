<?php $i = 1; ?>
<div class="home-banner flexbox flexbox-wrap" style="width: {{ count($homeSlides) }}00vw">
    @foreach($homeSlides as $slide)
    <div class="home-banner-item" id="home-banner-{{ $i }}" data-id="{{ $slide->id }}" style="background-image: url('{{ asset('media/home_slide') . '/' . $slide->file }}')">

    </div>
    <?php $i++; ?>
    @endforeach
</div>
