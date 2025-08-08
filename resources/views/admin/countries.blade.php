@extends('layouts.admin.admin_layout')
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
                    <h4 class="card-title">Countries</h4>
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
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if ($countries)
                                @foreach ($countries as $index => $row)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>
                                            @if($row->status == 1)
                                                <a href="{{ route('admin.country_change_status', ['id' => $row->id, 'status' => $row->status]) }}"><label class="badge badge-success">Active</label></a>
                                            @else
                                                <a href="{{ route('admin.country_change_status', ['id' => $row->id, 'status' => $row->status]) }}"><label class="badge badge-danger">Inactive</label></a>
                                            @endif
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
