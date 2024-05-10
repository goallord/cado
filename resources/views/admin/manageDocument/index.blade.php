@extends('admin.layouts.admin')

@section('title', 'Manage Documents')
@section('css')

@endsection
@section('admin')
<div class="row">
    <div class="col-md-7">
        <div class="table-responsive ">
            <table class="table table-striped dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th>sn</th>
                        <th>Document Title</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($documents as $document)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ Str::title($document->title) }}</td>
                        <td>
                            <a href="{{ route('admin.document.show', $document->id) }}" class="btn btn-sm btn-info">View</a>
                            <a onclick="return confirm('Are you sure about this action ?')" href="{{ route('admin.document.delete', $document->id) }}" class="btn btn-sm btn-info">Delete</a>
                        </td>
                    </tr>
                    @empty
                    <div class="alert alert-danger">No Documents At The Moment</div>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h4>Create New Document</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.document.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 form-group">
                        <label for="title">Document Title</label>
                        <input type="text" name="title" placeholder="Document Title ..." class="form-control"
                            value="{{ old('title') }}">
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label for="title">Document</label>
                        <input type="file" name="document" class="form-control" value="{{ old('document') }}">
                        @error('document')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label for="title">Document Description</label>
                        <textarea placeholder="Document Description ..." type="file" name="document_description"
                            class="form-control">{{ old('document_description') }}</textarea>
                        @error('document_description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end row -->



@endsection
@section('js')


@endsection
