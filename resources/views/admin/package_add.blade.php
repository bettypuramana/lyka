@extends('layouts.admin.admin_layout')
@section('title')
Package Add - Lyka
@endsection
@section('content')

  <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Package Add </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Package Add</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    {{-- <h4 class="card-title">Package Add</h4> --}}
                    <form class="forms-sample row" action="{{route('admin.package_store')}}" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                        @csrf
                        <div class="form-group col-6">
                        <label for="exampleInputName1">Package Title</label>
                        <input type="text" class="form-control" name="package_title" id="exampleInputName1" placeholder="Package Name">
                        <p class="text-danger" id="package_title_error"></p>
                      </div>
                      <div class="form-group col-3">
                        <label for="exampleSelectGender">Price</label>
                        <input type="number" class="form-control" name="price">
                        <p class="text-danger" id="price_error"></p>
                      </div>
                      <div class="form-group col-3">
                        <label for="exampleSelectGender">Group Size</label>
                        <input type="number" class="form-control" name="group_size">
                        <p class="text-danger" id="group_size_error"></p>
                      </div>
                      <div class="form-group col-4">
                        <label for="exampleInputName1">Continent</label>
                        <select class="form-select" name="continent" id="continent" onchange="getCountries();">
                            <option value="">Select</option>
                            @if ($continents)
                                @foreach ($continents as $row)
                                    <option value="{{$row->code}}">{{$row->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        <p class="text-danger" id="continent_error"></p>
                      </div>
                      <div class="form-group col-4">
                        <label for="exampleInputName1">Country</label>
                        <select class="form-select" name="country" id="country">

                        </select>
                        <p class="text-danger" id="country_error"></p>
                      </div>

                      <div class="form-group col-4">
                        <label for="exampleSelectGender">Tour Type</label>
                        <select class="form-select" id="exampleSelectGender" name="tour_type">
                            <option value="">Select</option>
                             @if ($tour_types)
                                @foreach ($tour_types as $row)
                                    <option value="{{$row->id}}">{{$row->type}}</option>
                                @endforeach
                            @endif
                        </select>
                        <p class="text-danger" id="tour_type_error"></p>
                      </div>
                      <div class="form-group col-3">
                        <label for="exampleSelectGender">Duration ( Days )</label>
                        <select class="form-select" id="Duration" name="duration" onchange="addTourPlan();">
                            <option value="">Select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <p class="text-danger" id="duration_error"></p>
                      </div>
                       <div class="form-group col-3">
                        <label for="exampleSelectGender">No Of Nights</label>
                        <input type="number" class="form-control" name="night" placeholder="No Of Nights">
                        <p class="text-danger" id="night_error"></p>
                      </div>
                      <div class="form-group col-3">
                        <label for="exampleSelectGender">Main Image</label>
                        <input type="file" class="form-control" name="main_image" accept=".png, .jpg, .jpeg">
                        <p class="text-danger" id="main_image_error"></p>
                      </div>
                      <div class="form-group col-3">
                        <label for="exampleSelectGender">Images</label>
                        <input type="file" class="form-control" name="images[]" multiple accept=".png, .jpg, .jpeg">
                        <p class="text-danger" id="images_error"></p>
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">About</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4" name="about"></textarea>
                        <p class="text-danger" id="about_error"></p>
                      </div>
                      <div class="form-group">
                        <b>Tour Plan</b>
                        <p class="text-danger" id="tour_plan_error"></p>
                      </div>
                      <div id="tourPlanDiv" class="row">

                      </div>

                      <div class="form-group">
                        <b>Trip Highlights</b>
                        {{-- <a href="javascript:void(0)" class="text-primary icon-plus" onclick="addInputColum('highlights');"></a> --}}
                        <p class="text-danger" id="highlights_error"></p>
                      </div>
                      <div id="tripHighlightsDiv" >

                      </div>
                      <div class="form-group">
                        <a href="javascript:void(0)" class="btn btn-dark btn-sm" onclick="addInputColum('highlights');">Add Highlights</a>
                        </div>
                      <div class="form-group">
                        <b>Included</b>
                        {{-- <a href="javascript:void(0)" class="text-primary icon-plus" onclick="addInputColum('included')"></a> --}}
                        <p class="text-danger" id="included_error"></p>
                      </div>
                      <div id="includedDiv" >

                      </div>
                        <div class="form-group">
                            <a href="javascript:void(0)" class="btn btn-dark btn-sm" onclick="addInputColum('included')">Add Included</a>
                        </div>
                      <div class="form-group">
                        <b>Exclude</b>
                        {{-- <a href="javascript:void(0)" class="text-primary icon-plus" onclick="addInputColum('exclude')"></a> --}}
                        <p class="text-danger" id="exclude_error"></p>
                      </div>
                      <div id="excludedDiv" >

                      </div>
                        <div class="form-group">
                            <a href="javascript:void(0)" class="btn btn-dark btn-sm" onclick="addInputColum('exclude')">Add Exclude</a>
                        </div>
                        {{-- <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div> --}}
                      <button type="submit" class="btn btn-success me-2 col-2">Submit</button>
                      {{-- <button class="btn btn-light">Cancel</button> --}}
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

@endsection
@section('js')
<script>
    function addTourPlan(){
        var duration = document.getElementById("Duration").value;
        var container = document.getElementById("tourPlanDiv");
        var existingDays = container.querySelectorAll('input[name="day[]"]').length;

        if (duration < existingDays) {
        // Remove blocks after duration
        for (let i = existingDays; i > duration; i--) {
            // Find the .row containing day input with value i and remove it
            let toRemove = Array.from(container.querySelectorAll('input[name="day[]"]'))
                .find(input => parseInt(input.value) === i);
            if (toRemove) toRemove.closest('.row').remove();
        }
        return;
        }

        for (let day = existingDays + 1; day <= duration; day++) {
        let html = `
        <div class="row">
            <div class="form-group col-1">
                <label>Day</label>
                <input type="text" class="form-control" name="day[]" value="${day}" readonly>
            </div>
            <div class="form-group col-5">
                <label>Title</label>
                <input type="text" class="form-control" name="title[]" placeholder="Enter title">
            </div>
            <div class="form-group col-2">
                <label>Image 1</label>
                <input type="file" class="form-control" name="image_one[]" accept=".png, .jpg, .jpeg">
            </div>
            <div class="form-group col-2">
                <label>Image 2</label>
                <input type="file" class="form-control" name="image_two[]" accept=".png, .jpg, .jpeg">
            </div>
            <div class="form-group col-2">
                <label>Image 3</label>
                <input type="file" class="form-control" name="image_three[]" accept=".png, .jpg, .jpeg">
            </div>
            <div class="form-group col-12 ">
                <label>Description</label>
                <textarea class="form-control" name="description[]" rows="4" placeholder="Enter description"></textarea>
            </div><hr>
        </div>
        `;

        container.insertAdjacentHTML('beforeend', html);
    }
    }
//     function removeTourPlan(el) {
//     el.closest('.row').remove();

//     // Optional: If you want to update day numbers after removal:
//     updateDayNumbers();
// }

// function updateDayNumbers() {
//     let days = document.querySelectorAll('#tourPlanDiv .form-group.col-1 input[name="day[]"]');
//     days.forEach((input, index) => {
//         input.value = index + 1;
//     });
// }
function addInputColum(type) {
    let containerId = '';
    let inputName = '';

    // Determine container div ID and input name based on type
    switch(type) {
        case 'highlights':
            containerId = 'tripHighlightsDiv';
            inputName = 'highlights[]';
            break;
        case 'included':
            containerId = 'includedDiv';
            inputName = 'includes[]';
            break;
        case 'exclude':
            containerId = 'excludedDiv';
            inputName = 'excludes[]';
            break;
        default:
            console.error('Unknown type:', type);
            return;
    }

    const container = document.getElementById(containerId);

    const html = `
            <div class="row">
            <div class="form-group col-11">
                <input type="text" class="form-control" name="${inputName}">
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

// Remove specific input row
function removeInputColum(element) {
    element.closest('.row').remove();
}


function validateForm() {
    let isValid = true;

    // Clear previous errors
    ['package_title', 'price', 'group_size', 'continent', 'country', 'tour_type', 'duration', 'night', 'main_image', 'images', 'about','highlights','included','exclude','tour_plan']
      .forEach(id => document.getElementById(id + '_error').textContent = '');

    // Get values
    const packageTitle = document.querySelector('input[name="package_title"]').value.trim();
    const price = document.querySelector('input[name="price"]').value.trim();
    const groupSize = document.querySelector('input[name="group_size"]').value.trim();
    const continent = document.querySelector('select[name="continent"]').value;
    const country = document.querySelector('select[name="country"]').value;
    const tourType = document.querySelector('select[name="tour_type"]').value;
    const duration = document.querySelector('select[name="duration"]').value;
    const night = document.querySelector('input[name="night"]').value;
    const mainImage = document.querySelector('input[name="main_image"]');
    const images = document.querySelector('input[name="images[]"]');
    const about = document.querySelector('textarea[name="about"]').value.trim();

    // Validate each field
    if (!packageTitle) {
        document.getElementById('package_title_error').textContent = 'Package Title is required';
        isValid = false;
    }
    if (!price || isNaN(price) || Number(price) <= 0) {
        document.getElementById('price_error').textContent = 'Valid Price is required';
        isValid = false;
    }
    if (!groupSize || isNaN(groupSize) || Number(groupSize) <= 0) {
        document.getElementById('group_size_error').textContent = 'Valid Group Size is required';
        isValid = false;
    }
    if (!continent) {
        document.getElementById('continent_error').textContent = 'Continent is required';
        isValid = false;
    }
    if (!country) {
        document.getElementById('country_error').textContent = 'Country is required';
        isValid = false;
    }
    if (!tourType) {
        document.getElementById('tour_type_error').textContent = 'Tour Type is required';
        isValid = false;
    }
    if (!duration) {
        document.getElementById('duration_error').textContent = 'Duration is required';
        isValid = false;
    }
    if (!night) {
        document.getElementById('night_error').textContent = 'Night is required';
        isValid = false;
    }
    if (mainImage.files.length === 0) {
        document.getElementById('main_image_error').textContent = 'Main Image is required';
        isValid = false;
    }
    // images[] is multiple, check if at least 1 selected
    if (!document.querySelector('input[name="images[]"]').files.length) {
        document.getElementById('images_error').textContent = 'At least three images are required';
        isValid = false;
    }else if (document.querySelector('input[name="images[]"]').files.length < 3) {
    document.getElementById('images_error').textContent = 'At least three images are required';
    isValid = false;
    }
    if (!about) {
        document.getElementById('about_error').textContent = 'About field is required';
        isValid = false;
    }
    const highlights_input = document.querySelectorAll('input[name="highlights[]"]');
    if(highlights_input.length>0){
        for (let i = 0; i < highlights_input.length; i++) {
        if (!highlights_input[i].value.trim()) {
            document.getElementById('highlights_error').innerHTML='Please fill all Trip Highlights fields or remove empty ones.';
            isValid = false;
        }
    }
    }else{
             document.getElementById('highlights_error').innerHTML='Please add Trip Highlights';
            isValid = false;
    }
    const includes_input = document.querySelectorAll('input[name="includes[]"]');
    if(includes_input.length>0){
        for (let i = 0; i < includes_input.length; i++) {
        if (!includes_input[i].value.trim()) {
            document.getElementById('included_error').innerHTML='Please fill all Trip Highlights fields or remove empty ones.';
            isValid = false;
        }
    }
    }else{
             document.getElementById('included_error').innerHTML='Please add Trip Highlights';
            isValid = false;
    }
    const excludes_input = document.querySelectorAll('input[name="excludes[]"]');
    if(excludes_input.length>0){
        for (let i = 0; i < excludes_input.length; i++) {
        if (!excludes_input[i].value.trim()) {
            document.getElementById('exclude_error').innerHTML='Please fill all Trip Highlights fields or remove empty ones.';
            isValid = false;
        }
    }
    }else{
             document.getElementById('exclude_error').innerHTML='Please add Trip Highlights';
            isValid = false;
    }

    const titles = document.querySelectorAll('input[name="title[]"]');
    const descriptions = document.querySelectorAll('textarea[name="description[]"]');
    const imageOnes = document.querySelectorAll('input[name="image_one[]"]');
    const imageTwos = document.querySelectorAll('input[name="image_two[]"]');
    const imageThrees = document.querySelectorAll('input[name="image_three[]"]');

    document.getElementById('tour_plan_error').innerHTML = ''; // clear previous error
    if (titles.length > 0) {
        for (let i = 0; i < titles.length; i++) {
            if (!titles[i].value.trim()) {
                document.getElementById('tour_plan_error').innerHTML = 'Please fill all Tour Plan or remove empty ones.';
                isValid = false;
                break;
            }
            if (!descriptions[i].value.trim()) {
                document.getElementById('tour_plan_error').innerHTML = 'Please fill all Tour Plan or remove empty ones.';
                isValid = false;
                break;
            }
            // Check if at least one image file is selected
            const hasImageOne = imageOnes[i].files.length > 0;
            const hasImageTwo = imageTwos[i].files.length > 0;
            const hasImageThree = imageThrees[i].files.length > 0;

            if (!hasImageOne && !hasImageTwo && !hasImageThree) {
                document.getElementById('tour_plan_error').innerHTML = 'Please fill all Tour Plan or remove empty ones.';
                isValid = false;
                break;
            }
        }
    } else {
        document.getElementById('tour_plan_error').innerHTML = 'Please add Tour Plan';
        isValid = false;
    }


    return isValid;
}

function getCountries() {
    event.preventDefault();
    var id = document.getElementById("continent").value;
    $.ajax({
        url: "{{ route('admin.country_by_continent') }}",
        type: "POST",
        data: {
            "_token": "{{ csrf_token() }}",
            id: id,
        },
        dataType: 'json',
        success: function(res) {
            // console.log(res);

            var html = '<option value="">select</option>';
            for (var i = 0; i < res.length; i++) {
                html += '<option value="' + res[i].id + '" >' + res[i].name + '</option>';
            }
                $('#country').html(html);
        },
            error: function(e) {
                //    loader_off();
            }
        });
}
</script>
@endsection
