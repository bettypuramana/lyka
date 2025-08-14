@extends('layouts.admin.admin_layout')
@section('title')
Packages - Lyka
@endsection
@section('content')

 <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Packages </h3>


              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">

                  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Packages</li>
                  <a href="{{route('admin.package_new')}}" class="btn btn-dark btn-sm ml" style="margin-left: 10px" >Add</a>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    {{-- <h4 class="card-title">Packages</h4> --}}
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
                            <th>Main Image</th>
                            <th>Package Title</th>
                            <th>Country</th>
                            <th>Group Size</th>
                            <th>Days</th>
                            <th>Tour Type</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if (!empty($packages))
                                @foreach ($packages as $index => $row)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td><img style="width:70px;border-radius:0px;" src="{{ asset('uploads/package/image/'.$row->main_image) }}" ></td>
                                        <td>{{ \Illuminate\Support\Str::limit($row->package_title, 50, '..') }}</td>
                                        <td>{{$row->countryName->name}}</td>
                                        <td>{{$row->group_size}}</td>
                                        <td>{{$row->duration}}</td>
                                        <td>{{$row->tourType->type}}</td>
                                        <td>{{$row->price}}</td>

                                        <td>
                                            @if ($row->status==1)
                                            <a href="{{ route('admin.package_change_status', ['id' => $row->id, 'status' => $row->status]) }}"><label class="badge badge-success">Active</label></a>
                                            @else
                                            <a href="{{ route('admin.package_change_status', ['id' => $row->id, 'status' => $row->status]) }}"><label class="badge badge-danger">Inactive</label></a>
                                            @endif

                                        </td>
                                        <td>
                                            <a href="{{ route('admin.package_edit', ['id' => $row->id]) }}"><i class="icon-pencil" ></i></a>&nbsp;&nbsp;&nbsp;
                                            <a href="{{ route('admin.package_delete', ['id' => $row->id]) }}"><i class="text-danger icon-trash" onclick="return confirm('Are you sure you want to delete this data ?');"></i></a>
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
