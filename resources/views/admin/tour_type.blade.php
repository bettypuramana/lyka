@extends('layouts.admin.admin_layout')
@section('title')
Tour Type - Lyka
@endsection
@section('content')

 <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Tour Type </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tour Type</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">

                  <div class="card-body">
                    <form class="forms-sample row" action="{{route('admin.tour_type_store')}}" method="post" enctype="multipart/form-data">
                        @csrf


                         <div class="form-group col-5">
                            <label for="exampleSelectGender">Tour Type</label>
                            <input type="text" class="form-control" name="type" placeholder="Adventure" value="{{old('type')}}">
                            @error('type')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                         
                        <div class="col-2 p-4">
                                <button type="submit" class="btn btn-success">Submit</button>
                        </div>

                    </form>
                    {{-- <h4 class="card-title">Gallery</h4> --}}
                    <hr>
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
                      <table class="table" id="myTable">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Type</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if (!empty($tour_type))
                                @foreach ($tour_type as $index => $row)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{ $row->type }}</td>
                                         <td>
                                            <a href="{{ route('admin.tour_type_delete', ['id' => $row->id]) }}"><i class="text-danger icon-trash" onclick="return confirm('Are you sure you want to delete this data ?');"></i></a>
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
