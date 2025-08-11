@extends('layouts.admin.admin_layout')
@section('content')

  <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Banner Add </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Banner Add</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Banner Add</h4>
                    <form class="forms-sample row" action="{{route('admin.banner_store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-6">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" class="form-control" name="title" id="exampleInputName1" placeholder="Title" value="{{old('title')}}">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleSelectGender">Image</label>
                        <input type="file" class="form-control" name="image">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Sub Titile</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4" name="sub_titile">{{old('sub_titile')}}</textarea>
                        @error('sub_titile')
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
@endsection
