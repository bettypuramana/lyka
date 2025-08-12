@extends('layouts.admin.admin_layout')
@section('content')

  <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Blog Add </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Blog Add</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Blog Add</h4>
                    <form class="forms-sample row" action="{{route('admin.blog_store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group col-6">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" class="form-control" name="title" id="exampleInputName1" placeholder="Title" value="{{old('title')}}">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleSelectGender">image</label>
                        <input type="file" class="form-control" name="image" accept=".png, .jpg, .jpeg">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleInputName1">Tags</label>
                        <input type="text" class="form-control p-2" name="tags" id="tags" placeholder="Tags" value="{{old('tags')}}">
                        @error('tags')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleInputName1">Published Date</label>
                        <input type="date" class="form-control" name="published_date" id="published_date" value="{{old('published_date')}}">
                        @error('published_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Short Description</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4" name="short_description">{{old('short_description')}}</textarea>
                        @error('short_description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="6" name="description">{{old('description')}}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title" id="exampleInputName1" placeholder="Meta Title" value="{{old('meta_title')}}">
                        @error('meta_title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Meta Description</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4" name="meta_description">{{old('meta_description')}}</textarea>
                        @error('meta_description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <button type="submit" class="btn btn-success me-2 col-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

@endsection
@section('js')
<script>
    var input = document.querySelector('#tags');
    new Tagify(input);
</script>
@endsection
