@extends('admin.layouts.admin')

@section('title', 'Work History')
@section('css')

@endsection
@section('admin')
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if(!$users->count())
                        <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                            No data available
                        </div>
                    @else
                        <div class="table-responsive">
                            <table id="" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                <tr>
                                    <th>s/n</th>
                                    <th>Name</th>
                                    <th>Destination</th>
                                    <th>Status</th>
                                    <th>Dates</th>
                                </tr>
                                </thead>


                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <p> {{ Str::title($user->user->name) }}</p>
                                        </td>
                                        <td>{{ $user->location ?? 'N/A' }}</td>
                                        <td>
                                            @if ($user->status == "active")
                                               <span class="badge bg-success">Active</span> 
                                            @else
                                               <span class="badge bg-warning">Ended</span> 
                                                
                                            @endif
                                        </td>

                                         <td>
                                             <p>Date: {{$user->getYearStartMonth() ?? "N/A"}}</p>
                                             <p>{{$user->duration_in_words ?? 'N/A'}}</p>
                                         </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    @endif


                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>

@endsection
@section('script')
    <script>
        $(function() {
            $(document).on('click', '#delete', function(e) {
                e.preventDefault();
                var link = $(this).data("id");
                console.log({
                    link
                });

                Swal.fire({
                    title: 'Are you sure?'
                    , text: "You won't be able to revert this!"
                    , icon: 'warning'
                    , showCancelButton: true
                    , confirmButtonColor: '#3085d6'
                    , cancelButtonColor: '#d33'
                    , confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        if ($("#delete").submit()) {
                            Swal.fire(
                                'Deleted!'
                                , 'Content deleted.'
                                , 'success'
                            )
                        }
                    }
                })
            })

        })

    </script>



@endsection
