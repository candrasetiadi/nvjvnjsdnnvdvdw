@extends('admin.master')
@section('page', 'settings')
@section('content')

<div class="settings-wrapper flexbox flexbox-wrap justify-between">

    <div class="settings-group">
        <h3>Homepage Video</h3>
        <div class="md-card">
            <ul class="settings-ul">
                <li class="settings-list flexbox">
                    <label for="loop-video">
                        <i class="material-icons">replay</i>
                        Loop Video
                        <input type="checkbox" name="loop-video" checked>
                        <span class="lever">
                        </span>
                    </label>
                </li>

                <li class="settings-list flexbox">
                    <label for="loop-video">
                        <i class="material-icons">replay</i>
                        Loop Video
                        <input type="checkbox" name="loop-video">
                        <span class="lever">
                        </span>
                    </label>
                </li>

                <li class="settings-list flexbox">
                    <label for="loop-video">
                        <i class="material-icons">replay</i>
                        Loop Video
                        <input type="checkbox" name="loop-video">
                        <span class="lever">
                        </span>
                    </label>
                </li>
            </ul>
        </div>
    </div>

    <div class="settings-group">
        <h3>Admin Panel</h3>
        <div class="md-card">
            <ul class="settings-ul">
                <li class="settings-list flexbox">
                    <label for="dark-theme">
                        <i class="material-icons">apps</i>
                        Dark Theme
                        <input type="checkbox" name="dark-theme" checked>
                        <span class="lever">
                        </span>
                    </label>
                </li>
            </ul>
        </div>
    </div>

    <div class="settings-group save">
        <ul class="flexbox">
            <li>
                <a href class="md-button md-button-salmon shadow-hover">save</a>
            </li>
        </ul>
    </div>
</div>

@stop


@section('scripts')

@stop
