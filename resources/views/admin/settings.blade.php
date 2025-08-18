@extends('layouts.admin.admin_layout')
@section('title')
Settings - Lyka
@endsection
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
                    <form class="forms-sample row" action="{{ route('admin.settings_update', ['id' => $settings->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                        <b>About Section</b>
                      </div>
                      <div class="form-group col-4">
                        <label for="exampleSelectGender">Title</label>
                        <input type="text" class="form-control" name="about_title" placeholder="Title" value="{{$settings->about_title}}">
                        @error('about_title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group col-4">
                        <label for="exampleInputName1">Image</label>
                        <input type="file" class="form-control" name="about_image" id="exampleInputName1" accept=".png, .jpg, .jpeg">
                        @error('about_image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <img style="width:70px;margin-top:5px;" src="{{ asset('uploads/about_us/'.$settings->about_image) }}" >

                      </div>
                      <div class="form-group col-4">
                        <label for="exampleSelectGender">Year Experince</label>
                        <input type="number" class="form-control" name="year_experince" placeholder="Year Experince" value="{{$settings->year_experince}}">
                        @error('year_experince')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea class="form-control textarea" id="editor" rows="6" name="about_description" placeholder="Description">{{$settings->about_description}}</textarea>
                        @error('about_description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                       <div class="form-group">
                        <b>Social Media Links</b>
                      </div>
                      <div class="form-group col-4">
                        <label for="exampleSelectGender">Facebook</label>
                        <input type="text" class="form-control" name="facebook" placeholder="Facebook" value="{{$settings->facebook}}">
                        @error('facebook')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group col-4">
                        <label for="exampleSelectGender">Instagram</label>
                        <input type="text" class="form-control" name="instagram" placeholder="Instagram" value="{{$settings->instagram}}">
                        @error('instagram')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group col-4">
                        <label for="exampleSelectGender">Linkedin</label>
                        <input type="text" class="form-control" name="linkedin" placeholder="Linkedin" value="{{$settings->linkedin}}">
                        @error('linkedin')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group col-4">
                        <label for="exampleSelectGender">X.com</label>
                        <input type="text" class="form-control" name="twitter" placeholder="X.com" value="{{$settings->twitter}}">
                        @error('titltwittere')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group col-4">
                        <label for="exampleSelectGender">Youtube</label>
                        <input type="text" class="form-control" name="youtube" placeholder="Youtube" value="{{$settings->youtube}}">
                        @error('youtube')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                      <b>Contact Home Page</b>
                      </div>
                      <div class="form-group col-3">
                        <label for="exampleSelectGender">Working Time</label>
                        <input type="text" class="form-control" name="working_time" placeholder="Hours: 8:00 - 17:00, Mon - Sat" value="{{$settings->working_time}}">
                        @error('working_time')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group col-3">
                        <label for="exampleSelectGender">Contact Number</label>
                        <input type="text" class="form-control" name="contact_number" placeholder="+971 54 346 5001" value="{{$settings->contact_number}}">
                        @error('contact_number')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group col-3">
                        <label for="exampleSelectGender">Second Contact Number</label>
                        <input type="text" class="form-control" name="contact_number_two" placeholder="+91 95444 99009" value="{{$settings->contact_number_two}}">
                        @error('contact_number_two')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group col-3">
                        <label for="exampleSelectGender">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="support@lyka.com" value="{{$settings->email}}">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group col-3">
                        <label for="exampleSelectGender">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="4517 Washington Ave. Manchester, Kentucky 39495" value="{{$settings->address}}">
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group col-3">
                        <label for="exampleSelectGender">Whats App Number</label>
                        <input type="text" class="form-control" name="whats_app" placeholder="+91 95444 99009" value="{{$settings->whats_app}}">
                        @error('whats_app')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="form-group col-3">
                        </div>
                        <div class="form-group col-3">
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
