@extends('layouts.admin.admin_layout')
@section('title')
Countries - Lyka
@endsection
@section('content')

 <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Countries </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Countries</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample row" action="{{route('admin.country_store')}}" method="post" enctype="multipart/form-data">
                        @csrf


                         <div class="form-group col-3">
                            <label for="exampleSelectGender">Country</label>
                            <input type="text" class="form-control" name="country" placeholder="Afghanistan" value="{{old('country')}}">
                            @error('country')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                     <div class="form-group col-3">
                        <label for="exampleInputName1">Continent</label>
                        <select class="form-select p-2" name="continent" id="continent">
                            <option value="">Select</option>
                            @if ($continents)
                                @foreach ($continents as $row)
                                    <option value="{{$row->code}}" {{ old('continent') == $row->code ? 'selected' : '' }}>{{$row->name}}</option>
                                @endforeach
                            @endif
                        </select>
                          @error('continent')
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
                            <th>Country name</th>
                            <th>Continent name</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if ($countries)
                                @foreach ($countries as $index => $row)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->continent_name }}</td>
                                        <td>
                                            @if($row->status == 1)
                                                <a href="{{ route('admin.country_change_status', ['id' => $row->id, 'status' => $row->status]) }}"><label class="badge badge-success">Active</label></a>
                                            @else
                                                <a href="{{ route('admin.country_change_status', ['id' => $row->id, 'status' => $row->status]) }}"><label class="badge badge-danger">Inactive</label></a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.country_delete', ['id' => $row->id]) }}"><i class="text-danger icon-trash" onclick="return confirm('Are you sure you want to delete this data ?');"></i></a>
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
