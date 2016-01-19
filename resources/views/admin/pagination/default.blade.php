<?php 

    $range = 2;

    $currentpage = $paginator->currentPage();
    $totalpages = $paginator->lastPage();

    if (($currentpage - $range) <= 1) {
        $start_x = 1;
        $end_x = ($range * 2) + 1; 

        if ($end_x > $totalpages) $end_x = $totalpages;
    }
    else if ($currentpage >= ($totalpages - $range)) {
        $start_x = $totalpages - ($range * 2);
        $end_x = $totalpages;
    }
    else {  
        $start_x = $currentpage - $range;
        $end_x = $currentpage + $range;
    }

?>


@if ($paginator->lastPage() > 1)
  <ul class="pagination">

    <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
        <a href="{{ ($paginator->currentPage() == 1) ? '#' : $paginator->appends(Request::only('q'))->url($paginator->currentPage()-1) }}"><i class="fa fa-chevron-left"></i></a>
    </li>

    @for ($i = $start_x; $i <= $end_x; $i++)
        <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
            <a href="{{ $paginator->appends(Request::only('q'))->url($i) }}">{{ $i }}</a>
        </li>
    @endfor

    <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
        <a href="{{ ($paginator->currentPage() == $paginator->lastPage()) ? '#' : $paginator->appends(Request::only('q'))->url($paginator->currentPage()+1) }}" >
            <i class="fa fa-chevron-right"></i>
        </a>
    </li>

  </ul>
@endif