@extends('member.layouts.members')

@section('title', "Apostolic Work History" )
@section('css')

@endsection

@section('members')

    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
        <div class="blog-details-content">
            <div class="news-block-one">
                <div class="inner-box">

                    <div class="lower-content">
                        <h3>@yield('title')</h3>
                        <hr>
                        <div class="blog-details-content">
                            <div class="news-block-one">
                                  <div class="card-header">
                                      <a href="{{route('apostolic.history.create')}}" class="btn btn-info">
                                          <span class="fas fa-plus"></span> Add new </a>
                                  </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        @if($history->count())
                                            <table class="table table-hover">
                                                <tr>
                                                    <th>s/n</th>
                                                    <th>Destination</th>
                                                    <th>Date</th>
                                                    <!--<th>Action</th>-->
                                                </tr>
                                                @foreach($history as $history)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>
                                                            <p>{{Str::title($history->location)}}</p>
                                                            <p>
                                                                @if($history->status == 'disabled')
                                                                    <span class="rounded p-1 text-light bg-primary">Completed</span>
                                                                @else
                                                                    <span class="rounded p-1 text-light bg-success">Active</span>
                                                                @endif
                                                            </p>
                                                        </td>
                                                        <td>
                                                           <p> Date: {{$history->getYearStartMonth()}}
                                                           </p>
                                                            <p>{{Str::title($history->duration_in_words)}}</p>
                                                        </td>
                                                        <td class="btn-group">
                                                            <a href="{{route('apostolic.history.show', $history)}}" class="btn
                                                             btn-primary">View details</a>
                                                            <!--  <a onclick="return confirm('Are you Sure you want to ')" class="btn btn-danger" href="{{route('apostolic.history.destroy', $history)}}">Delete</a>
                                                        </td>-->
                                                    </tr>
                                                @endforeach

                                            </table>
                                        @else
                                            <p class="alert alert-info">Not available </p>
                                        @endif

                                    </div>
                                </div>
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
