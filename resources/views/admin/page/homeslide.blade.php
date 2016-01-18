@extends('admin.master')
@section('page', 'homeslide')

@section('fab')

<a href class="fab-button fab-button-salmon fab-button-action shadow-hover modal-open" data-target="#homeslide-add"><i class="material-icons">add</i></a>

@stop

@section('content')
<div class="homeslide-wrapper flexbox flexbox-wrap justify-start">
    <?php $i = 1 ?>
    @foreach($homeSlides as $slide)
    <div class="md-card shadow shadow-hover homeslide-item w25-24" style="order: {{ $i }};height: 360px; background-image: url({{ asset('media/home_slide') . '/' . $slide->file }});">
        <div class="overlay overlay-hover overlay-fill overlay-white"></div>
        <div class="card-label">
            <h3 class="homeslide-title">{{ $slide->file }}</h3>
            <a href="/system/ajax/homeslide/delete/{{ $slide->id }}" class="homeslide-item-more direct-delete">
                <i class="material-icons">close</i>
            </a>
        </div>
    </div>
    <?php $i++ ?>
    @endforeach
</div>

@endsection

@section('modal')

<div class="modal-wrapper" id="homeslide-add">

    {!! Form::open(array('class' => 'modal-window', 'id' => 'homeslide-form')) !!}
    <h3>Add homeslide</h3>
    <div class="m-input-group fwidth flexbox-wrap">

        <div class="m-input-wrapper" id="picture-wrapper">
            <div class="m-image-preview" id="blog-image-preview">
                <p class="drop-hint picture-preview-hint">drop homeslide picture here</p>
            </div>
            <input class="m-image-input" type="file" name="file" id="blog-input-image" required>
        </div>
    </div>

    <input type="hidden" name="author_id" id="homeslide-input-admin" value="1">
    <input type="hidden" name="edit" value="0" id="edit-flag">

    <div class="button-holder align-right">
        <a href class="md-button md-button-plain modal-close" id="close-homeslide-form">cancel</a>
        <a href class="md-button md-button-plain" id="save-homeslide">save</a>
    </div>
    {!! Form::close() !!}
</div>
@endsection

@section('scripts')

<script>
    Matter.admin.homeslide();
</script>

@endsection
