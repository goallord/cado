@extends('member.layouts.members')

@section('title', "Add Apostolic Work History" )
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
                                <!-- resources/views/apostolic_works_form.blade.php -->

                                <form action="{{route('apostolic.history.save')}}" method="post" id="apostolicForm">
                                    @csrf
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="start_date">Start Month</label>
                                                    <input type="text" class="form-control" name="start_month"
                                                          value="{{old('start_month')}}" placeholder="Start Month, Eg. February 4">
                                                    @error('start_month')
                                                    <div class="text-danger">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="year">Year</label>
                                                    <input type="text" class="form-control" name="year" value="{{old('year')}}" placeholder="Year, EG. 2023">
                                                    @error('year')
                                                    <div class="text-danger">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="duration_in_words">Duration in Words</label>
                                                    <input type="text" class="form-control"
                                                           name="duration_in_words" placeholder="Eg. 6 months" value="{{old('duration_in_words')}}">
                                                    @error('duration_in_words')
                                                    <div class="text-danger">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="location">Destination</label>
                                                    <input type="text" class="form-control" name="location" value="{{old('location')}}" placeholder="Destination, Eg. Place of Assignment">
                                                    @error('location')
                                                    <div class="text-danger">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="description">Tell us about your Experience</label>
                                                    <textarea class="form-control" name="description" placeholder="Apostolic duty experience">{{old('description')}}</textarea>
                                                    @error('description')
                                                    <div class="text-danger">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-primary">Save Apostolic Works</button>
                                </form>
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
