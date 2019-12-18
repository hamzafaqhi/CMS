@extends('Frontend.layouts.main')
@section('title', "$details->meta_title")
@section('meta_description', "$details->meta_description")
@section('keywords', "$details->meta_keywords")

@section('content')
<!-- Start About Area -->
        <div class="page-about about_area bg--white section-padding--lg">
        	<div class="container">
			<div class="row">
        			<div class="col-lg-12">
        				<div class="section__title--3 text-center pb--30">
        					<!-- <h1>About Us</h1> -->
        				</div>
        			</div>
        		</div>
				<div class="row">
        			<div class="col-lg-12">
        				<div class="section__title--3 text-center pb--30">
        					<h2>{{$details->title}}</h2>
        					<p>{{$details->description}}</p>
        				</div>
        			</div>
        		</div>
        		
        	</div>
        </div>
        <!-- End About Area -->
        <!-- Start Team Area -->
      
        <!-- End Team Area -->
	</div>
    <!-- //Main wrapper -->
@endsection