@extends('layouts.admin.admin_layout')
@section('title')
Package Enquiry - Lyka
@endsection
@section('content')

 <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Package Enquiry </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Package Enquiry</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    {{-- <h4 class="card-title">Package Enquiry</h4> --}}
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
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Travel Date</th>
                            <th>Destination</th>
                            <th>Passengers</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if (!empty($enquiries))
                                @foreach ($enquiries as $index => $row)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->phone}}</td>
                                        <td>{{$row->travel_date}}</td>
                                        <td>{{$row->country_name}}</td>
                                        <td>{{$row->passengers}}</td>

                                        <td>
                                            <a href="{{ route('admin.packag_enquiry_delete', ['id' => $row->id]) }}"><i class="text-danger icon-trash" onclick="return confirm('Are you sure you want to delete this data ?');"></i></a>
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
