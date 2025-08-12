@extends('layouts.admin.admin_layout')
@section('title')
Visa Add - Lyka
@endsection
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
                    {{-- <h4 class="card-title">Visa Add</h4> --}}
                    <form class="forms-sample row" action="{{route('admin.visa_store')}}" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                        @csrf
                        <div class="form-group col-6">
                        <label for="exampleInputName1">Visa Title</label>
                        <input type="text" class="form-control" name="visa_title" id="exampleInputName1" placeholder="Visa Name">
                        <p class="text-danger" id="visa_title_error"></p>
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleInputName1">Continent</label>
                        <select class="form-select" name="continent" id="continent">
                            <option value="">Select</option>
                            @if ($continents)
                                @foreach ($continents as $row)
                                    <option value="{{$row->code}}">{{$row->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        <p class="text-danger" id="continent_error"></p>
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleSelectGender">Flag</label>
                        <input type="file" class="form-control" name="flag" accept=".png, .jpg, .jpeg">
                        <p class="text-danger" id="flag_error"></p>
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleSelectGender">Image</label>
                        <input type="file" class="form-control" name="image" accept=".png, .jpg, .jpeg">
                        <p class="text-danger" id="image_error"></p>
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea class="form-control textarea" id="exampleTextarea1" rows="6" name="description"></textarea>
                        <p class="text-danger" id="description_error"></p>
                      </div>
                       <div class="form-group">
                        <b>Documents needed</b>
                        <a href="javascript:void(0)" class="text-primary icon-plus" onclick="addDocumentColum();"></a>
                         <p class="text-danger" id="Document_colum_error"></p>
                      </div>
                      <div id="documentsDiv" >

                      </div>
                      <div class="form-group">
                        <b>FAQs</b>
                        <a href="javascript:void(0)" class="text-primary icon-plus" onclick="addFaqColum();"></a>
                        <p class="text-danger" id="faq_colum_error"></p>
                      </div>

                      <div id="faqDiv" >

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
function validateForm() {
    let isValid = true;
    document.getElementById('visa_title_error').innerHTML='';
    document.getElementById('continent_error').innerHTML='';
    document.getElementById('flag_error').innerHTML='';
    document.getElementById('image_error').innerHTML='';
    document.getElementById('description_error').innerHTML='';
    document.getElementById('Document_colum_error').innerHTML='';
    document.getElementById('faq_colum_error').innerHTML='';
    // Check visa_title
    const visaTitle = document.querySelector('input[name="visa_title"]').value.trim();
    if (!visaTitle) {
        document.getElementById('visa_title_error').innerHTML='This field is required';
        isValid = false;
    }

    // Check continent
    const continent = document.querySelector('select[name="continent"]').value;
    if (!continent) {
        document.getElementById('continent_error').innerHTML='This field is required';
        isValid = false;
    }

    // Check flag file
    const flagInput = document.querySelector('input[name="flag"]');
    if (flagInput.files.length === 0) {
        document.getElementById('flag_error').innerHTML='This field is required';
        isValid = false;
    }

    // Check image file
    const imageInput = document.querySelector('input[name="image"]');
    if (imageInput.files.length === 0) {
        document.getElementById('image_error').innerHTML='This field is required';
        isValid = false;
    }

    // Check description
    const description = document.querySelector('textarea[name="description"]').value.trim();
    if (!description) {
        document.getElementById('description_error').innerHTML='This field is required';
        isValid = false;
    }

    // Check documents inputs (if any added)
    const documents = document.querySelectorAll('input[name="documents[]"]');
    if(documents.length>0){
        for (let i = 0; i < documents.length; i++) {
        if (!documents[i].value.trim()) {
            document.getElementById('Document_colum_error').innerHTML='Please fill all document fields or remove empty ones.';
            isValid = false;
        }
    }
    }else{
            document.getElementById('Document_colum_error').innerHTML='Please add documents';
            isValid = false;
    }


    // Check FAQ questions and answers (if any added)
    const questions = document.querySelectorAll('input[name="questions[]"]');
    const answers = document.querySelectorAll('textarea[name="answers[]"]');
    if(questions.length>0){
    for (let i = 0; i < questions.length; i++) {
        if (!questions[i].value.trim()) {


            document.getElementById('faq_colum_error').innerHTML='Please fill all FAQ questions or remove empty ones.';
            isValid = false;
        }
        if (!answers[i].value.trim()) {
            document.getElementById('faq_colum_error').innerHTML='Please fill all FAQ answers or remove empty ones.';
            isValid = false;
        }
    }
    }else{
            document.getElementById('faq_colum_error').innerHTML='Please add FAQ';
            isValid = false;
    }

    // If all validations passed
    return isValid;
}
</script>
@endsection
