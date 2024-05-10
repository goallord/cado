@extends('member.layouts.members')

@section('title', "All necessary Documents" )
@section('css')

@endsection

@section('members')

    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
        <div class="blog-details-content">
            <div class="news-block-one">
                <div class="inner-box">

                    <div class="lower-content">
                        <h3>All Notification</h3>
                        <hr>
                        <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <th class="text-primary">s/n</th>
                                        <th class="text-primary">Title</th>
                                        <th class="text-primary">Action</th>
                                    </tr>
                                    @forelse($manageDocs as $downloadD)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{Str::title($downloadD->title)}}</td>
                                            <td>
                                                <a class="btn btn-primary" href="{{ route('member.download', ['id' => $downloadD->id]) }}"><i class="fas fa-download"></i></a>
                                            </td>
                                        </tr>
                                    @empty

                                    @endforelse

                                </table>


                        </div>

                    </div>
                </div>
            </div>


        </div>






    </div>
@endsection





@section('script')

@endsection

