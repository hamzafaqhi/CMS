@extends('layouts.backend')
@section('title','SHF | Add new Product')
@section('stylesheets')
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
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
          <li><a href="{{ route('category.index') }}">Products</a></li>
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
      <form id="regForm" action="">
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
            <input type="text" class="form-control" name="price" id="price" oninput="this.className = ''" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
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
              <input type="text" class="form-control" name="quantity" id="quantity" oninput="this.className = ''" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
              @if ($errors->has('quantity'))
              <span class="help-block">
              <strong style="color:red">{{ $errors->first('quantity') }}</strong>
              </span> 
              
              @endif           
              </div>
                 
  </div>
  <div class="tab">
              <div class="box-header">
            <h3 class="box-title">Status:</h3>
            </div>
            <div class="box-body pad">
                  <select class="form-control">
                    <option value="0"></option>
                    <option value="1">In Stock</option>
                    <option value="0">Out of Stock</option>
                  </select>      
            </div>

            <div class="box-header">
            <h3 class="box-title">Manufacture:</h3>
            </div>
            <div class="box-body pad">
                  <select class="form-control">
                    <option value="0"></option>
                    <option value="1">In Stock</option>
                    <option value="0">Out of Stock</option>
                  </select>      
            </div>
            
            <div class="box-header">
            <h3 class="box-title">Image:</h3>
            </div>
            <div class="box-body pad">         
                  <input type="file" id="exampleInputFile">
                </div>
                <div class="box-header">
            <h3 class="box-title">Image:</h3>
            </div>
            <div class="box-body pad"> 
                <label>
                  <input type="radio" name="top" value="1" class="minimal" >
                </label>
              </div>
  </div>
  <div class="tab">Birthday:
    <p><input placeholder="dd" oninput="this.className = ''" name="dd"></p>
    <p><input placeholder="mm" oninput="this.className = ''" name="nn"></p>
    <p><input placeholder="yyyy" oninput="this.className = ''" name="yyyy"></p>
  </div>
  <div class="tab">Login Info:
    <p><input placeholder="Username..." oninput="this.className = ''" name="uname"></p>
    <p><input placeholder="Password..." oninput="this.className = ''" name="pword" type="password"></p>
  </div>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
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
<script>
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
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
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
</script>

@endsection
