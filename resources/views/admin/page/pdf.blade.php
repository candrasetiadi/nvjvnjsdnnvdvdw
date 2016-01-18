@extends('admin.master')
@section('page', 'pdf')

@section('fab')

<a href class="fab-button fab-button-salmon fab-button-action shadow-hover modal-open" data-target="#pdf-add"><i class="material-icons">add</i></a>

@stop

@section('content')

@if(count($catalogues) != 0)

<div class="pdf-wrapper flexbox flexbox-wrap justify-start">

    @foreach($catalogues as $catalogue)
    <div class="md-card shadow shadow-hover pdf-item w25-24" style="height: 360px; background-image: url({{ asset('media/pdf/thumbnail') . '/' . $catalogue->thumbnail }});">
        <div class="overlay overlay-hover overlay-fill overlay-white"></div>
        <div class="card-label">
            <h3 class="pdf-title">{{ $catalogue->title }}</h3>
            <a href="/system/ajax/pdf/delete/{{ $catalogue->id }}" class="pdf-item-more direct-delete">
                <i class="material-icons">close</i>
            </a>
        </div>
    </div>
    @endforeach
</div>

@else

<p class="empty-message">No catalogues found. Create one now</p>

@endif

@endsection

@section('modal')

<div class="modal-wrapper" id="pdf-add">

    {!! Form::open(array('class' => 'modal-window', 'id' => 'pdf-form')) !!}
    <h3>Add pdf</h3>
    <div class="m-input-group fwidth flexbox-wrap">

        <div class="m-input-wrapper fwidth">
            <input class="file" type="file" name="file" id="pdf-input" required>
        </div>

        <div class="m-input-wrapper" id="picture-wrapper">
            <div class="m-image-preview" id="catalogue-image-preview">
                <p class="drop-hint picture-preview-hint">drop pdf thumbnail file here</p>
            </div>
            <input class="m-image-input" type="file" name="thumbnail" id="catalogue-input-image" required>
        </div>

        <div class="m-input-wrapper fwidth">
            <input type="text" name="title" id="pdf-input-title" class="bind-input-from" data-target="#pdf-input-url" required>
            <label for="title">title</label>
        </div>
    </div>

    <input type="hidden" name="edit" value="0" id="edit-flag">

    <div class="button-holder align-right">
        <a href class="md-button md-button-plain modal-close" id="close-pdf-form">cancel</a>
        <a href class="md-button md-button-plain" id="save-pdf">save</a>
    </div>
    {!! Form::close() !!}
</div>
@endsection

@section('scripts')

<script>
    Matter.admin.pdf();
</script>

@endsection
