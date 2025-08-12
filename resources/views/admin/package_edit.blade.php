@extends('layouts.admin.admin_layout')
@section('title')
Package Edit - Lyka
@endsection
@section('content')

  <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Package Edit </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Package Edit</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    {{-- <h4 class="card-title">Package Add</h4> --}}
                    <form class="forms-sample row" action="{{ route('admin.package_update', ['id' => $package->id]) }}" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                        @csrf
                        <div class="form-group col-6">
                        <label for="exampleInputName1">Package Title</label>
                        <input type="text" class="form-control" name="package_title" id="exampleInputName1" placeholder="Package Name" value="{{$package->package_title}}">
                         <p class="text-danger" id="package_title_error"></p>
                      </div>
                      <div class="form-group col-3">
                        <label for="exampleSelectGender">Price</label>
                        <input type="number" class="form-control" name="price" value="{{$package->price}}">
                        <p class="text-danger" id="price_error"></p>
                      </div>
                      <div class="form-group col-3">
                        <label for="exampleSelectGender">Group Size</label>
                        <input type="number" class="form-control" name="group_size" value="{{$package->group_size}}">
                        <p class="text-danger" id="group_size_error"></p>
                      </div>
                      <div class="form-group col-4">
                        <label for="exampleInputName1">Continent</label>
                        <select class="form-select" name="continent" id="continent">
                            <option value="">Select</option>
                            @if ($continents)
                                @foreach ($continents as $row)
                                    <option value="{{$row->code}}" {{ $package->continent == $row->code ? "selected" :""}}>{{$row->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        <p class="text-danger" id="continent_error"></p>
                      </div>
                      <div class="form-group col-4">
                        <label for="exampleInputName1">Country</label>
                        <select class="form-select" name="country" id="country">
                            <option value="">Select</option>
                            @if ($countries)
                                @foreach ($countries as $row)
                                    <option value="{{$row->id}}" {{ $package->country == $row->id ? "selected" :""}}>{{$row->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        <p class="text-danger" id="country_error"></p>
                      </div>

                      <div class="form-group col-4">
                        <label for="exampleSelectGender">Tour Type</label>
                        <select class="form-select" id="exampleSelectGender" name="tour_type">
                            <option value="">Select</option>
                             @if ($tour_types)
                                @foreach ($tour_types as $row)
                                    <option value="{{$row->id}}" {{ $package->tour_type == $row->id ? "selected" :""}}>{{$row->type}}</option>
                                @endforeach
                            @endif
                        </select>
                        <p class="text-danger" id="tour_type_error"></p>
                      </div>
                      <div class="form-group col-4">
                        <label for="exampleSelectGender">Duration ( Days )</label>
                        <select class="form-select" id="Duration" name="duration" onchange="addTourPlan();">
                            <option value="">Select</option>
                            <option value="1" {{ $package->duration == 1 ? "selected" :""}}>1</option>
                            <option value="2" {{ $package->duration == 2 ? "selected" :""}}>2</option>
                            <option value="3" {{ $package->duration == 3 ? "selected" :""}}>3</option>
                            <option value="4" {{ $package->duration == 4 ? "selected" :""}}>4</option>
                            <option value="5" {{ $package->duration == 5 ? "selected" :""}}>5</option>
                            <option value="6" {{ $package->duration == 6 ? "selected" :""}}>6</option>
                            <option value="7" {{ $package->duration == 7 ? "selected" :""}}>7</option>
                            <option value="8" {{ $package->duration == 8 ? "selected" :""}}>8</option>
                            <option value="9" {{ $package->duration == 9 ? "selected" :""}}>9</option>
                            <option value="10" {{ $package->duration == 10 ? "selected" :""}}>10</option>
                        </select>
                        <p class="text-danger" id="duration_error"></p>
                      </div>
                      <div class="form-group col-4">
                        <label for="exampleSelectGender">Main Image</label>
                        <input type="file" class="form-control" name="main_image" accept=".png, .jpg, .jpeg">
                        <img style="width:70px;margin-top:5px;" src="{{ asset('uploads/package/image/'.$package->main_image) }}" >
                        <p class="text-danger" id="main_image_error"></p>
                      </div>
                      <div class="form-group col-4">
                        <label for="exampleSelectGender">Images</label>
                        <input type="file" class="form-control" name="images[]" multiple accept=".png, .jpg, .jpeg">
                        <p class="text-danger" id="images_error"></p>
                        @foreach ($package->packageImages as $img)
                        <div class="row">
                                <img style="width:70px;margin-top:5px;" src="{{ asset('uploads/package/images/'.$img->images) }}" >
                                <input type="hidden" name="image_id[]" value="{{$img->id}}">

                                <a href="javascript:void(0)" onclick="removeInputColum(this);" class="text-danger" title="Remove"><i class="icon-trash"></i></a>
                        </div>

                        @endforeach
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">About</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4" name="about">{{$package->about}}</textarea>
                        <p class="text-danger" id="about_error"></p>
                      </div>
                      <div class="form-group">
                        <b>Tour Plan</b>
                        <p class="text-danger" id="tour_plan_error"></p>
                      </div>
                      <div id="tourPlanDiv" class="row">
                        @if (!empty($package->packageDayPlans))
                            @foreach ($package->packageDayPlans as $row)
                                <div class="row">
                                <div class="form-group col-1">
                                    <label>Day</label>
                                    <input type="text" class="form-control" name="day[]" value="{{$row->day}}" readonly>
                                    <input type="hidden" name="dayplan_id[]" id="dayplan_id" value="{{$row->id}}">
                                </div>
                                <div class="form-group col-5">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title[]" placeholder="Enter title" value="{{$row->title}}">
                                </div>
                                <div class="form-group col-2">
                                    <label>Image 1</label>
                                    <input type="file" class="form-control" name="image_one[]">
                                    <img style="width:70px;margin-top:5px;" src="{{ asset('uploads/package/images/'.$row->image_one) }}" accept=".png, .jpg, .jpeg">
                                </div>
                                <div class="form-group col-2">
                                    <label>Image 2</label>
                                    <input type="file" class="form-control" name="image_two[]">
                                    <img style="width:70px;margin-top:5px;" src="{{ asset('uploads/package/images/'.$row->image_two) }}" accept=".png, .jpg, .jpeg">
                                </div>
                                <div class="form-group col-2">
                                    <label>Image 3</label>
                                    <input type="file" class="form-control" name="image_three[]">
                                    <img style="width:70px;margin-top:5px;" src="{{ asset('uploads/package/images/'.$row->image_three) }}" accept=".png, .jpg, .jpeg">
                                </div>
                                <div class="form-group col-12 ">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description[]" rows="4" placeholder="Enter description">{{$row->description}}</textarea>
                                </div><hr>
                            </div>
                            @endforeach
                        @endif
                      </div>

                      <div class="form-group">
                        <b>Trip Highlights</b>
                        <a href="javascript:void(0)" class="text-primary icon-plus" onclick="addInputColum('highlights');"></a>
                        <p class="text-danger" id="highlights_error"></p>
                      </div>
                      <div id="tripHighlightsDiv" >
                        @if (!empty($package->packageMoreHighlights))
                            @foreach ($package->packageMoreHighlights as $row)
                                <div class="row">
                                    <div class="form-group col-11">
                                        <input type="text" class="form-control" name="highlights[]" value="{{$row->title}}">
                                        <input type="hidden" name="highlights_id[]" id="highlight_id" value="{{$row->id}}">
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
                        <b>Included</b>
                        <a href="javascript:void(0)" class="text-primary icon-plus" onclick="addInputColum('included')"></a>
                        <p class="text-danger" id="included_error"></p>
                      </div>
                      <div id="includedDiv" >
                            @if (!empty($package->packageMoreIncludes))
                            @foreach ($package->packageMoreIncludes as $row)
                                <div class="row">
                                    <div class="form-group col-11">
                                        <input type="text" class="form-control" name="includes[]" value="{{$row->title}}">
                                        <input type="hidden" name="includes_id[]" id="include_id" value="{{$row->id}}">
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
                        <b>Exclude</b>
                        <a href="javascript:void(0)" class="text-primary icon-plus" onclick="addInputColum('exclude')"></a>
                        <p class="text-danger" id="exclude_error"></p>
                      </div>
                      <div id="excludedDiv" >
                            @if (!empty($package->packageMoreExcludes))
                            @foreach ($package->packageMoreExcludes as $row)
                                <div class="row">
                                    <div class="form-group col-11">
                                        <input type="text" class="form-control" name="excludes[]" value="{{$row->title}}">
                                        <input type="hidden" name="excludes_id[]" id="exclude_id" value="{{$row->id}}">
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
    ['package_title', 'price', 'group_size', 'continent', 'country', 'tour_type', 'duration', 'about','highlights','included','exclude','tour_plan']
      .forEach(id => document.getElementById(id + '_error').textContent = '');

    // Get values
    const packageTitle = document.querySelector('input[name="package_title"]').value.trim();
    const price = document.querySelector('input[name="price"]').value.trim();
    const groupSize = document.querySelector('input[name="group_size"]').value.trim();
    const continent = document.querySelector('select[name="continent"]').value;
    const country = document.querySelector('select[name="country"]').value;
    const tourType = document.querySelector('select[name="tour_type"]').value;
    const duration = document.querySelector('select[name="duration"]').value;
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

        }
    } else {
        document.getElementById('tour_plan_error').innerHTML = 'Please add Tour Plan';
        isValid = false;
    }


    return isValid;
}
</script>
@endsection
