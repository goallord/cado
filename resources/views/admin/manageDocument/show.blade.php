@extends('admin.layouts.admin')

@section('title', 'Document Detail')
@section('css')

@endsection
@section('admin')
<div class="row">
    <div class="mx-auto col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th class="text-primary">Document Title</th>
                            <td>
                                <p>{{ Str::title($manageDocument->title ?? 'Not Available')  }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p>
                                    {{ $manageDocument->document_description ?? 'No Description ....' }}
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                            <h4 class="text-primary">Document File</h4>

                                @if($manageDocument->document)
                                    @if(pathinfo($manageDocument->document, PATHINFO_EXTENSION)
                                    === 'pdf')
                                        <!-- Display PDF -->
                                        <a href="{{ asset($manageDocument->document) }}" target="_blank">View PDF</a>
                                    @else
                                        <!-- Display Image -->
                                        <a href="{{ asset($manageDocument->document) }}" download>
                                            <img src="{{ asset($manageDocument->document) }}" alt="Additional File" class="img-fluid">
                                        </a>
                                    @endif
                                @else
                                    No additional file
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->


@endsection
@section('js')


@endsection
