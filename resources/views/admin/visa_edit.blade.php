@extends('layouts.admin.admin_layout')
@section('content')

  <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Visa Add </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Visa Add</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Visa Add</h4>
                    <form class="forms-sample row" action="{{ route('admin.visa_update', ['id' => $visa->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-6">
                        <label for="exampleInputName1">Visa Title</label>
                        <input type="text" class="form-control" name="visa_title" id="exampleInputName1" placeholder="Visa Name" value="{{$visa->title}}">
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleInputName1">Continent</label>
                        <select class="form-select" name="continent" id="continent">
                            <option value="">Select</option>
                            @if ($continents)
                                @foreach ($continents as $row)
                                    <option value="{{$row->code}}" {{ $visa->continent == $row->code ? "selected" :""}}>{{$row->name}}</option>
                                @endforeach
                            @endif
                        </select>
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleSelectGender">Flag</label>
                        <input type="file" class="form-control" name="flag">
                        <img style="width:70px;margin-top:5px;" src="{{ asset('uploads/visa/flags/'.$visa->flag) }}" >
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleSelectGender">Image</label>
                        <input type="file" class="form-control" name="image">
                        <img style="width:70px;margin-top:5px;" src="{{ asset('uploads/visa/'.$visa->image) }}" >
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="6" name="description">{{$visa->description}}</textarea>
                      </div>
                       <div class="form-group">
                        <b>Documents needed</b>
                        <a href="javascript:void(0)" class="text-primary icon-plus" onclick="addDocumentColum();"></a>
                      </div>
                      <div id="documentsDiv" >
                            @if (!empty($visa->visaDocuments))
                                @foreach ($visa->visaDocuments as $document)
                                    <div class="row">
                                        <div class="form-group col-11">
                                            <input type="text" class="form-control" name="documents[]" value="{{$document->title}}">
                                            <input type="hidden" name="document_id[]" id="document_id" value="{{$document->id}}">
                                        </div>
                                        <div class="form-group col-1">
                                            <a href="javascript:void(0)" onclick="removeInputColum(this);" class="text-danger p-4" title="Remove">
                                                <i class="icon-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                      </div>
                      <div class="form-group">
                        <b>FAQs</b>
                        <a href="javascript:void(0)" class="text-primary icon-plus" onclick="addFaqColum();"></a>
                      </div>
                      <div id="faqDiv" >
                             @if (!empty($visa->visaFAQs))
                                @foreach ($visa->visaFAQs as $faq)
                                    <div class="row">
                                        <div class="form-group col-11">
                                            <input type="text" class="form-control" name="questions[]" placeholder="Question" value="{{$faq->question}}">
                                            <input type="hidden" name="faq_id[]" id="faq_id" value="{{$faq->id}}">
                                        </div>
                                        <div class="form-group col-11">
                                            <textarea class="form-control" id="exampleTextarea1" rows="6" name="answers[]" placeholder="Answer">{{$faq->answer}}</textarea>
                                        </div>
                                        <div class="form-group col-1">
                                            <a href="javascript:void(0)" onclick="removeInputColum(this);" class="text-danger p-4" title="Remove">
                                                <i class="icon-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
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
<script>
function addDocumentColum() {
    const container = document.getElementById('documentsDiv');
    const html = `
            <div class="row">
            <div class="form-group col-11">
                <input type="text" class="form-control" name="documents[]">
            </div>
            <div class="form-group col-1">
                <a href="javascript:void(0)" onclick="removeInputColum(this);" class="text-danger p-4" title="Remove">
                    <i class="icon-trash"></i>
                </a>
            </div>
            </div>
    `;

    container.insertAdjacentHTML('beforeend', html);
}
function addFaqColum() {
    const container = document.getElementById('faqDiv');
    const html = `
            <div class="row">
            <div class="form-group col-11">
                <input type="text" class="form-control" name="questions[]" placeholder="Question">
            </div>
            <div class="form-group col-11">
                <textarea class="form-control" id="exampleTextarea1" rows="6" name="answers[]" placeholder="Answer"></textarea>
            </div>
            <div class="form-group col-1">
                <a href="javascript:void(0)" onclick="removeInputColum(this);" class="text-danger p-4" title="Remove">
                    <i class="icon-trash"></i>
                </a>
            </div>
            </div>
    `;

    container.insertAdjacentHTML('beforeend', html);
}
function removeInputColum(element) {
    element.closest('.row').remove();
}
</script>
@endsection
