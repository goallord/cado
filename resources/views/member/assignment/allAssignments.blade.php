@extends('member.layouts.members')

@section('title', "All Assignments" )
@section('css')

@endsection

@section('members')

    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
        <div class="blog-details-content">
            <div class="news-block-one">
                <div class="inner-box">

                    <div class="lower-content">
                        <h3>All Previous Assignments</h3>
                        <hr>
                        <div class="table-responsive">
                            @if($tasks->count())
                                <table class="table table-hover">
                                    <tr>
                                        <th class="text-primary">sn</th>
                                        <th class="text-primary">Destination</th>
                                        <th class="text-primary">Date</th>
                                        <th>View</th>
                                    </tr>
                                    @foreach($tasks as $task)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                <a href="{{route('member.previousAssignmentDetails.view', $task)}}"
                                                   class="link">
                                                    <p>{{$task->location}}</p>
                                                    <p>
                                                    <p>
                                                        @if($task->status == 'disabled')
                                                            <span class="rounded p-1 text-light bg-primary">Completed</span>
                                                        @else
                                                            <span class="rounded p-1 text-light bg-success">Active</span>
                                                        @endif
                                                    </p>
                                                    </p>
                                                </a>
                                            </td>
                                            <td>{{$task->getYearStartMonth()}}</td>

                                            <td>
                                                <a href="{{route('member.previousAssignmentDetails.view', $task)}}"
                                                   class="btn btn-primary">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            @else
                                <div class="text-info">No active assignment, try again later.
                                    <a href="{{route('member.profile.view')}}" class="btn btn-outline-info">Profile</a>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>


        </div>






    </div>
@endsection





@section('js')

@endsection
