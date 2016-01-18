@extends('admin.master')
@section('page', 'projects')

@section('fab')

<a href class="fab-button fab-button-salmon fab-button-action shadow-hover modal-open" data-target="#project-add"><i class="material-icons">add</i></a>

@stop

@section('content')
<div class="project-wrapper flexbox flexbox-wrap justify-start">
    <?php $i = 1 ?>
    @foreach($projectsByYear as $year => $projects)
    <div class="projects-by-year flexbox flexbox-wrap fwidth">
        <h3 class="project-year fwidth">Projects of {{ $year }}</h3>
        @foreach($projects as $project)
        <!--        <div class="md-card shadow shadow-hover project-item w25-24" style="background-image: url(http://loremflickr.com/246/360);">-->
        <div class="md-card shadow shadow-hover project-item w25-24" style="background-image: url('/media/projects/{{ $project->thumbnail->file }}');">
            <div class="overlay overlay-hover overlay-fill overlay-white"></div>
            <div class="card-label">
                <h3 class="project-title">{{ $project->title }}</h3>
                <a href="/system/ajax/project/delete/{{ $project->id }}" class="project-item-more item-delete direct-delete">
                    <i class="material-icons">close</i>
                </a>
                <a href="{{ $project->id }}" class="project-item-more item-edit" style="right: 32px;">
                    <i class="material-icons" style="font-size: 20px;">mode_edit</i>
                </a>
            </div>
        </div>
        <?php $i++ ?>
        @endforeach
    </div>
    @endforeach
</div>

@endsection

@section('modal')

<div class="modal-wrapper" id="project-add">

    {!! Form::open(array('class' => 'modal-window', 'id' => 'project-form')) !!}
    <h3>Add project</h3>
    <div class="input-group-caroussel">

        <div class="input-group-caroussel-header flexbox justify-end">
            <ul class="caroussel-switch flexbox">
                <?php $numberOfSlides = 2 ?>
                <li><a href class="m-caroussel-switch active">project info</a></li>
                <li><a href class="m-caroussel-switch">media</a></li>
            </ul>
        </div>

        <div class="input-group-caroussel-body">

            <div class="input-group-caroussel-slider flexbox align-start" style="width: <?= $numberOfSlides ?>00%;">

                <div class="input-group-caroussel-slide flexbox flexbox-wrap justify-between" id="caroussel-info" style="width: calc(100% / <?= $numberOfSlides ?>)">

                    <div class="m-input-wrapper m-input-wrapper-select fwidth">
                        <select id="project-input-year" name="year" required>
                            @for($year = date('Y'); $year > 1995; $year-=1)
                            <option value="{{ $year }}"{{ $year == date('Y') ? " selected" : "" }}>{{ $year }}</option>
                            @endfor
                        </select>
                        <label for="year">project year</label>
                    </div>

                    <div class="m-input-wrapper fwidth">
                        <input type="text" name="title" id="project-input-title" class="bind-input-from" data-target="#project-input-url" required>
                        <label for="title">project title</label>
                    </div>

                    <div class="m-input-group textarea fwidth flexbox flexbox-wrap">
                        <h3 class="input-group-title">description</h3>
                        <div class="input-wrapper fwidth">
                            <textarea name="description" id="project-input-description" rows="6" style="padding-top: 0"></textarea>
                        </div>
                    </div>
                </div>

                <div class="input-group-caroussel-slide flexbox flexbox-wrap justify-between" id="caroussel-gallery" style="width: calc(100% / <?= $numberOfSlides ?>)">

                    <div class="m-input-group textarea fwidth flexbox flexbox-wrap">
                        <h3 class="input-group-title">Media</h3>
                        <div class="m-input-wrapper" id="picture-wrapper">
                            <div class="drop-field">
                                <p class="drop-hint">drop multiple files at once here</p>
                            </div>
                            <input class="m-image-input" type="file" name="media[]" id="media-input" multiple>
                        </div>
                        <div class="gallery-wrapper flexbox flexbox-wrap justify-start" id="media-wrapper">
                            <!-- media wrapper -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" name="edit" value="0" id="edit-flag">

    <div class="button-holder align-right">
        <a href class="md-button md-button-plain modal-close" id="close-project-form">cancel</a>
        <a href class="md-button md-button-plain" id="save-project">save</a>
    </div>
    {!! Form::close() !!}
</div>
@endsection

@section('scripts')

<script>
    Matter.admin.projects();
</script>

@endsection
