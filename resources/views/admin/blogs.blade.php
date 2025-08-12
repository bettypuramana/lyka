@extends('layouts.admin.admin_layout')
@section('title')
Blogs - Lyka
@endsection
@section('content')

 <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Blogs <a href="{{route('admin.blog_new')}}" class="btn btn-success btn-sm">Add</a></h3>

              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    {{-- <h4 class="card-title">Blogs</h4> --}}
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
                            <th>Image</th>
                            <th>Title</th>
                            <th>Published Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if (!empty($blogs))
                                @foreach ($blogs as $index => $row)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td><img style="width:70px;border-radius:0px;" src="{{ asset('uploads/blogs/'.$row->image) }}" ></td>
                                        <td>{{$row->title}}</td>
                                        <td>{{$row->published_at}}</td>
                                        <td>
                                            <a href="{{ route('admin.blog_edit', ['id' => $row->id]) }}"><i class="icon-pencil" ></i></a>&nbsp;&nbsp;&nbsp;
                                            <a href="{{ route('admin.blog_delete', ['id' => $row->id]) }}"><i class="text-danger icon-trash" onclick="return confirm('Are you sure you want to delete this data ?');"></i></a>
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
