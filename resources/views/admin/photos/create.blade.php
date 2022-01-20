@extends('admin.layouts.app')

@section('title')
    Upload Photo
@endsection

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endsection

@section('scripts')
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form enctype="multipart/form-data" action="{{route('photos.store')}}" method="post" class="dropzone" id="dropzone">
@csrf
                </form>
            </div>
        </div>
    </div>

@endsection
