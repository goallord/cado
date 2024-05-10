@extends('member.layouts.members')

@section('title', "Dashboard" )
@section('css')

@endsection

@section('members')

<div class="col-lg-8 col-md-12 col-sm-12 content-side">
    <div class="blog-details-content">
        <div class="news-block-one">
            <div class="inner-box">

                <div class="lower-content">
                    <h3>Activity Logs</h3>
                    <hr>
                    <div class="blog-details-content">
                        <div class="news-block-one">
                            @if(isset($taskActive))
                            <div class="table-responsive shadow p-2 pt-3 mb-4">
                                <table class="table table-hover">
                                    <caption><i class="fas fa-check text-success fa-fw"></i> <u class="text-primary">Active Apostolic Experience</u></caption>
                                    <tr>
                                        <th class="text-primary">Destination</th>
                                        <td class="text-muted">{{Str::title($taskActive->location)}}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-primary">Duration</th>
                                        <td class="text-muted">{{Str::title($taskActive->duration_in_words)}}</td>
                                    </tr>
                                </table>
                            </div>
                            @else
                                <div class="container">
                                    <p>No Experience</p>
                                    <p><b>Awaiting   </b> <i class="fas fa-spinner fa-spin"></i></p>
                                </div>
                                <hr>
                            @endif



                                @if($taskCompleted->count())
                                    <div class="table-responsive shadow p-2 pt-3">
                                        <table class="table table-hover">
                                            <caption><i class="fas fa-dot-circle text-success fa-fw"></i><u class="text-primary">Previous Apostolic Experience</u></caption>
                                            <tr>
                                                <th class="text-info">Destination</th>
                                                <th class="text-info">Year</th>
                                            </tr>
                                            @foreach($taskCompleted as $task)
                                                <tr>
                                                    <td>{{Str::title($task->location)}}</td>
                                                    <td>{{$task->year}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                @else
                                    <div class="container">
                                        <p>Waiting for your experience report</p>
                                        <p><b>Awaiting   </b> <i class="fas fa-spinner fa-spin"></i></p>
                                    </div>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>






</div>
@endsection





@section('js')

@endsection
