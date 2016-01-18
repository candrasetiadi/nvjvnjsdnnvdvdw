@extends('admin.master')
@section('page', 'dashboard')
@section('content')

<div class="dashboard-wrapper flexbox flexbox-wrap justify-between">

    <div class="md-card shadow dashboard-item flexbox flexbox-wrap" id="overview">
        <h3>Overview</h3>

        <div class="overview-item">
            <p class="overview-item-title">Today's Visitors</p>
            <p class="overview-item-count" id="ga-output-today">-</p>
        </div>

        <div class="overview-item">
            <p class="overview-item-title">Most Viewed Item</p>
            <p class="overview-item-count">Try Scuba Diving</p>
        </div>

        <div class="overview-item">
            <p class="overview-item-title">Bookings Made</p>
            <p class="overview-item-count">2</p>
        </div>

        <div class="overview-item">
            <p class="overview-item-title">Today's Sales</p>
            <p class="overview-item-count">IDR 6,535,000</p>
        </div>
    </div>

    <div class="md-card shadow dashboard-item" id="statistics">
        <h3>General Statistics</h3>

        <div id="analytics-timeline">
            <i class="material-icons">chevron_right</i>
            <span class="drop-holder">Last 30 Days</span>
            <ul class="k-select-wrapper md-card">
                <li>
                    <a href class="k-dropdown-option" data-value="6daysAgo">Last 7 Days</a>
                </li>
                <li>
                    <a href class="k-dropdown-option" data-value="29daysAgo">Last 30 Days</a>
                </li>
                <li>
                    <a href class="k-dropdown-option" data-value="6monthsAgo">Last 6 Months</a>
                </li>
            </ul>
        </div>

        <div id="statistics-data">
            <canvas id="analytics-canvas">Your browser does not support the canvas tag.</canvas>
        </div>

        <div id="statistics-map">
        </div>
    </div>

    <div class="md-card shadow dashboard-item" id="top-results">
        <h3>Top Results</h3>

        <div class="analytics-viewer">
            <div class="analytics-viewer-head before2">
                <ul class="flexbox justify-between">
                    <li>
                        <a href class="analytics-viewer-tab">top pages</a>
                    </li>
                    <li>
                        <a href class="analytics-viewer-tab">devices</a>
                    </li>
                    <li>
                        <a href class="analytics-viewer-tab">countries</a>
                    </li>
                </ul>
            </div>

            <div class="analytics-viewer-body flexbox">
                <div class="analytics-viewer-body-item">

                </div>
                <div class="analytics-viewer-body-item" id="analytics-devices">
                    <ul>

                    </ul>
                </div>
                <div class="analytics-viewer-body-item" id="analytics-countries">
                    <ul>

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="md-card shadow dashboard-item" id="ga-quick">
        <h3>Quick Analytics</h3>
        <ul class="quick-ul">
            <li class="flexbox">
                <p class="quick-title">Bounce Rate</p>
                <p class="quick-description" id="ga-output-bounce">-</p>
            </li>
            <li class="flexbox">
                <p class="quick-title">Avg. Session Duration</p>
                <p class="quick-description" id="ga-output-session">-</p>
            </li>
            <li class="flexbox">
                <p class="quick-title">Pages/Session</p>
                <p class="quick-description" id="ga-output-pagepersession">-</p>
            </li>
            <li class="flexbox">
                <p class="quick-title">New Visitors</p>
                <p class="quick-description" id="ga-output-newvisits">-</p>
            </li>
        </ul>
    </div>

    <div class="md-card shadow dashboard-item" id="some2">
        <h3>Calendar</h3>
    </div>

    <div class="md-card md-card-base shadow dashboard-item" id="support-ticket">
        <h3>Support Ticket</h3>
        <div class="ticket-wrapper">
            <form id="ticket-form">
                <div class="m-input-wrapper">
                    <input type="text" name="subject" id="ticket-input-subject" required>
                    <label for="subject">subject</label>
                </div>
                <div class="input-wrapper">
                    <textarea name="content" id="ticket-message" rows="3" placeholder="MESSAGE"></textarea>
                </div>
                <div class="button-holder align-right">
                    <a href class="md-button md-button-salmon shadow-hover" id="send-ticket">send</a>
                </div>
            </form>
        </div>
    </div>
</div>

@stop

@section('scripts')

<script type="text/javascript">
    Matter.admin.dashboard();
</script>

@stop
