@extends('layouts.admin.admin_layout')
@section('title')
Visa Enquiry - Lyka
@endsection
@section('content')

 <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Visa Enquiry </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Visa Enquiry</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body" >
                    {{-- <h4 class="card-title">Visa Enquiry</h4> --}}
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
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Nationality</th>
                            <th>Destination</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if (!empty($visa_enquiries))
                                @foreach ($visa_enquiries as $index => $row)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->phone}}</td>
                                        <td>{{$row->email}}</td>
                                        <td>{{$row->nation_name}}</td>
                                        <td>{{$row->destination_name}}</td>
                                        <td>
                                            <a href="{{ route('admin.visa_enquiry_delete', ['id' => $row->id]) }}"><i class="text-danger icon-trash" onclick="return confirm('Are you sure you want to delete this data ?');"></i></a>
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
