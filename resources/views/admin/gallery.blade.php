@extends('layouts.admin.admin_layout')
@section('content')

 <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Gallery </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample row" action="{{route('admin.store_gallery')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group col-5">
                            <label for="exampleSelectGender">Image</label>
                            <input type="file" class="form-control" name="image">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                         <div class="form-group col-5">
                            <label for="exampleSelectGender">Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                      <button type="submit" class="btn btn-success col-2">Submit</button>
                    </form>
                    <h4 class="card-title">Gallery</h4>
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                        {{ session()->get('success') }}
                        </div>
                    @endif
                    @if(session()->has('fail'))
                        <div class="alert alert-danger">
                        {{ session()->get('fail') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if (!empty($galleryimages))
                                @foreach ($galleryimages as $index => $row)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td><img style="width:70px;border-radius:0px;" src="{{ asset('uploads/gallery/'.$row->image) }}" ></td>
                                        <td>{{$row->title}}</td>
                                        <td>
                                            <a href="{{ route('admin.gallery_delete', ['id' => $row->id]) }}"><i class="text-danger icon-trash" onclick="return confirm('Are you sure you want to delete this data ?');"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

@endsection
@section('js')
@endsection
