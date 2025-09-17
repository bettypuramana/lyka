@extends('layouts.admin.admin_layout')
@section('title')
Contact Enquiry - Lyka
@endsection
@section('content')

 <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Contact Enquiry </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Contact Enquiry</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    {{-- <h4 class="card-title">Contact Enquiry</h4> --}}
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
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Enquired On</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if (!empty($contact_enquiries))
                                @foreach ($contact_enquiries as $index => $row)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->email}}</td>
                                        <td>{{$row->subject}}</td>
                                        <td>{{ $row->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <a type="button" class="text-primary open-enquiry-modal" data-bs-toggle="modal" data-bs-target="#exampleModal" data-name="{{ $row->name }}" data-email="{{ $row->email }}" data-subject="{{ $row->subject }}" data-message="{{ $row->message }}"><i class="icon-eye"></i></a>&nbsp;&nbsp;&nbsp;
                                            <a href="{{ route('admin.contact_enquiry_delete', ['id' => $row->id]) }}"><i class="text-danger icon-trash" onclick="return confirm('Are you sure you want to delete this data ?');"></i></a>
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

          {{-- modal --}}
          <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enquiry</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <b>name : </b>
            <p id="modalName"></p>
            <b>Email : </b>
            <p id="modalEmail"></p>
            <b>Subject : </b>
            <p id="modalSubject"></p>
            <b>Message : </b>
            <p id="modalMessage"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection
@section('js')
<script>
document.querySelectorAll('.open-enquiry-modal').forEach(button => {
  button.addEventListener('click', function() {
    const name = this.getAttribute('data-name');
    const email = this.getAttribute('data-email');
    const subject = this.getAttribute('data-subject');
    const message = this.getAttribute('data-message');

    document.getElementById('modalName').textContent = name;
    document.getElementById('modalEmail').textContent = email;
    document.getElementById('modalSubject').textContent = subject;
    document.getElementById('modalMessage').textContent = message;
  });
});
</script>
@endsection
