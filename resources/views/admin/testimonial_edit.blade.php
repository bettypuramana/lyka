@extends('layouts.admin.admin_layout')
@section('title')
Testimonial Edit - Lyka
@endsection
@section('content')

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Edit Testimonial</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Testimonial</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample row" action="{{ route('admin.testimonial_update', $testimonial->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-6">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $testimonial->name) }}" placeholder="Name">
                            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group col-6">
                            <label>Designation</label>
                            <input type="text" class="form-control" name="designation" value="{{ old('designation', $testimonial->designation) }}" placeholder="Designation">
                            @error('designation') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group col-6">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image" id="imageInput" accept=".png, .jpg, .jpeg">

                            <div class="mt-2">
                                <img id="previewImage"
                                    src="{{ asset('uploads/testimonial/' . $testimonial->image) }}"
                                    width="80">
                            </div>

                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label>Comment</label>
                            <textarea class="form-control textarea" rows="6" name="message">{{ old('message', $testimonial->message) }}</textarea>
                            @error('message') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <button type="submit" class="btn btn-success me-2 col-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script>
    document.getElementById('imageInput').addEventListener('change', function (event) {
        let reader = new FileReader();
        reader.onload = function () {
            document.getElementById('previewImage').src = reader.result;
        };
        if(event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        }
    });
</script>
@endsection
