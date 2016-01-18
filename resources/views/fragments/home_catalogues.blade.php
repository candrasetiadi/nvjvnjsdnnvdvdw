@foreach($catalogues as $catalogue)
<div class="item">
    <div class="picture"><img src="{{ asset('media/pdf/thumbnail') . '/' . $catalogue->thumbnail }}"/></div>
    <div class="desc">
        <div class="name">{{ $catalogue->title }}</div>
        <div class="date">{{ $catalogue->created_at }}</div>
        <a href="{{ baseUrl() }}/pdfcatalogue/{{ $catalogue->file }}"><button type="submit">VIEW</button></a>
    </div>
</div>
@endforeach
