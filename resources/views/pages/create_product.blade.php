@extends('layouts.backend')
@section('title','SHF | Add new Product')
@section('stylesheets')
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" rel="stylesheet" media="all" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
<style>

#preview_img {
  /* border: 1px solid black; */
  padding: 10px;
  margin-right:35px;
  margin-left:35px;
}

#preview_img img {
  width: 100px;
  padding: 5px;
}
/*start of radio button style*/
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 18px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}
.radioLeft input{
    text-align: left;
    display:inline;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}

/*end of radio button style*/

.autocomplete {
  position: relative;
  display: inline-block;
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}

/*autocomplete */

* {
  box-sizing: border-box;
}
#regForm {
  /* background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px; */
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
</style>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Products
          <small>Add Product</small>
        </h1>
        <ol class="breadcrumb">
          <li>
              <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li><a href="{{ route('product.index') }}">Products</a></li>
          <li class="active">Add Product</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
      @if ($message = Session::get('success'))
          <div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"> </i>{{$message}}.
	        <button type="button" class="close" data-dismiss="alert">×</button>	
          </div>
      @endif
<div class="box">     
      <form method="POST" id="regForm" autocomplete="off"  action="{{ action ('ProductController@store') }}"  enctype="multipart/form-data">
      @csrf
  <!-- One "tab" for each step in the form: -->
  <div class="tab">
            <div class="box-header">
              <h3 class="box-title">Name: </h3>
            </div>
              <div class="box-body pad">
                <input type="text" class="form-control" name="product_name" id="product_name" oninput="this.className = ''" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
                @if ($errors->has('product_name'))
                <span class="help-block">
                <strong style="color:red">{{ $errors->first('product_name') }}</strong>
                </span> 
                @endif           
            </div>
           <!-- /.box -->
           
            <div class="box-header">
               <h3 class="box-title">Description: </h3>
            </div>
            <div class="box-body pad">              
              <p><textarea class="textarea"  id="description" name="description" oninput="this.className = ''" 
                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea></p>
                @if ($errors->has('description'))
                <span class="help-block">
                <strong style="color:red">{{ $errors->first('description') }}</strong>
                </span> 
                @endif       
            </div>    
            
            <div class="box-header">
              <h3 class="box-title">Price: </h3>
            </div>
            <div class="box-body pad">
              <input type="number" class="form-control" name="price" id="price" oninput="this.className = ''" min="0" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
                @if ($errors->has('price'))
                <span class="help-block">
                <strong style="color:red">{{ $errors->first('price') }}</strong>
                </span> 
              
                @endif
            </div>

            <div class="box-header">
              <h3 class="box-title">Quantity</h3>
            </div>
            <div class="box-body pad">
                <input type="number" class="form-control" name="quantity" id="quantity" min="0" oninput="this.className = ''" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>

                @if ($errors->has('quantity'))
                <span class="help-block">
                <strong style="color:red">{{ $errors->first('quantity') }}</strong>
                </span> 
                
                @endif           
            </div>

            <div class="box-header">
              <h3 class="box-title">Status:</h3>
            </div>
            <div class="box-body pad">
                  <select name="stock_status" id="stock_status" class="form-control">
                    <option name="stock_status" id="stock_status" value="1">In Stock</option>
                    <option id="stock_status" name="stock_status" value="0">Out of Stock</option>
                  </select>      
            </div>

            <div class="box-header">
              <h3 class="box-title">Manufacturer:</h3>
            </div>
            <div class="box-body pad">
                  <select name="manufacture_id" id="manufacture_id" class="selectpicker form-control" data-live-search="true">                          
                      <option  value = "0"></option>
                      @foreach($man as $t)
                      <option  value="{{ $t->id }}">{{$t->name}}</option>
                      @endforeach
                  </select>
            </div>

            <div class="box-header">
            <h3 class="box-title">Tag:</h3>
            </div>
            <div class="box-body pad">
            <select name="tag_id" id="tag_id" class="selectpicker form-control"  data-live-search="true" >
                <option value=""></option>
                @foreach($tag as $t)
                  <option  value="{{ ($t->id) }}">{{$t->name}}</option>
                  @endforeach
            </select>
            </div>
            <div class="box-header">
            <h3 class="box-title">Category:</h3>
            </div>
            <div class="box-body pad">
            <select name="category_id" id="category_id" class="selectpicker form-control"  data-live-search="true" >
                <!-- <option value=""></option>
                @foreach($cat as $c)
                <option  value="{{ ($c->id) }}">{{$c->name}}</option>
                @endforeach -->
                {!! $categories_d !!}
            </select>
            </div>
            <div class="box-header">
              <h3 class="box-title">Sort Order:</h3>
            </div>
            <label  style="margin-left:15px;" class="container radioLeft ">Top
            <input type="radio"  name="sort_order" onclick="test(this)" id="radioBtn" value ="1">
            <span class="checkmark"></span>
            </label>    
  </div>   
  <div class="tab">

            <div class="box-header">
              <h3 class="box-title">Width:</h3>
            </div>
            <div class="box-body pad">
            <input type="number" class="form-control" name="width" id="width" oninput="this.className = ''" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
              @if ($errors->has('width'))
              <span class="help-block">
              <strong style="color:red">{{ $errors->first('width') }}</strong>
              </span> 
            
              @endif
            </div>

            <div class="box-header">
              <h3 class="box-title">Height:</h3>
            </div>
            <div class="box-body pad">
            <input type="number" class="form-control" name="width" id="width" oninput="this.className = ''" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
              @if ($errors->has('width'))
              <span class="help-block">
              <strong style="color:red">{{ $errors->first('height') }}</strong>
              </span> 
            
              @endif
            </div>
            <div class="box-header">
              <h3 class="box-title">Weight:</h3>
            </div>
            <div class="box-body pad">
            <input type="number" class="form-control" name="height" id="height" oninput="this.className = ''" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
              @if ($errors->has('height'))
              <span class="help-block">
              <strong style="color:red">{{ $errors->first('height') }}</strong>
              </span> 
            
              @endif
            </div>

            <div class="box-header">
               <h3 class="box-title">Length:</h3>
            </div>
            <div class="box-body pad">
            <input type="number" class="form-control" name="length" id="length" oninput="this.className = ''" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
              @if ($errors->has('length'))
              <span class="help-block">
              <strong style="color:red">{{ $errors->first('length') }}</strong>
              </span> 
            
              @endif
            </div>

            
            <div class="box-header">
               <h3 class="box-title">Meta Title:</h3>
            </div>
            <div class="box-body pad">
            <input type="text" class="form-control" name="meta_title" id="meta" oninput="this.className = ''" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
              @if ($errors->has('meta_title'))
              <span class="help-block">
              <strong style="color:red">{{ $errors->first('meta_title') }}</strong>
              </span> 
            
              @endif
            </div>
            <div class="box-header">
              <h3 class="box-title">Related Products:</h3>
            </div>
            <div class="box-body pad">
                  <select name="related_product[]" id="related_product" class="selectpicker form-control" multiple="multiple" data-live-search="true">                          
                      <option  value = "0"></option>
                      @foreach($products as $p)
                      <option  value="{{ $p->id }}">{{$p->name}}</option>
                      @endforeach
                  </select>
            </div>

            <div class="box-header">
              <h3 class="box-title">Product Image:</h3>
            </div>
         
              <div class="form-group">
                <input type="file" id="profileImage" name="image[]" class="form-control" multiple/>
              </div> 
            <div class="row" id="preview_img">
              
            </div>
            <br>
            
  </div>
  <div style="float:right;margin-right:1.5rem" class="row">
      <button type="button" id="prevBtn" class="btn btn-default" onclick="nextPrev(-1)" style="margin-right: 10px;">Previous</button>
      <button type="button" id="nextBtn" class="btn btn-primary" onclick="nextPrev(1)" style="margin-right:10px">Next</button>
  </div>
    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
      <span class="step"></span>
      <span class="step"></span>
    </div>
  </form>
</div>      
            <!-- /.content -->
</section>
            
</div>

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/esm/popper.min.js" type="text/javascript"></script>
<script>
$('select').selectpicker();

$('#profileImage').on('change', function(){ //on file input change
    if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
    {

        var data = $(this)[0].files; //this file data
         
        $.each(data, function(index, file){ //loop though each file
            if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                var fRead = new FileReader(); //new filereader
                fRead.onload = (function(file){ //trigger function on successful read
                return function(e) {
                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element 
                    $('#preview_img').append(img); //append image to output element
                };
                })(file);
                fRead.readAsDataURL(file); //URL representing the file's data.
            }
        });
         
    }else{
        alert("Your browser doesn't support File API!"); //if File API is absent
    }
 });

var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  // for (i = 0; i < y.length; i++) {
  //   // If a field is empty...
  //   if (y[i].value == "") {
  //     // add an "invalid" class to the field:
  //     y[i].className += " invalid";
  //     // and set the current valid status to false
  //     valid = false;
  //   }
  // }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}

var radioState = false;
    function test(element){
        if(radioState == false) {
            check();
            radioState = true;
        }else{
            uncheck();
            radioState = false;
        }
    }
    function check() {
        document.getElementById("radioBtn").checked = true;
    }
    function uncheck() {
        document.getElementById("radioBtn").checked = false;
    }
</script>

@endsection
