@extends('layouts.admin.admin_layout')
@section('content')

  <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Settings </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Settings</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    {{-- <h4 class="card-title">About Section</h4> --}}
                    <form class="forms-sample row" action="{{route('admin.visa_store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                        <b>About Section</b>
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleSelectGender">Title</label>
                        <input type="text" class="form-control" name="about_title" placeholder="Title">
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleInputName1">Image</label>
                        <input type="file" class="form-control" name="about_image" id="exampleInputName1" >
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="6" name="about_description" placeholder="Description"></textarea>
                      </div>
                       <div class="form-group">
                        <b>Social Media Links</b>
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleSelectGender">Facebook</label>
                        <input type="text" class="form-control" name="facebook" placeholder="Facebook">
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleSelectGender">Instagram</label>
                        <input type="text" class="form-control" name="instagram" placeholder="Instagram">
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleSelectGender">Linkedin</label>
                        <input type="text" class="form-control" name="linkedin" placeholder="Linkedin">
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleSelectGender">X.com</label>
                        <input type="text" class="form-control" name="twitter" placeholder="X.com">
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleSelectGender">Youtube</label>
                        <input type="text" class="form-control" name="youtube" placeholder="Youtube">
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
