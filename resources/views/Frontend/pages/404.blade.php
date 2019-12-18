@extends('Frontend.layouts.main')
@section('content')
        <section class="page_error section-padding--lg bg--white">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="error__inner text-center">
							<div class="error__logo">
								<a href="#"><img src="{{asset('boighor/images/others/404.png')}}" alt="error images"></a>
							</div>
							<div class="error__content">
								<h2>error - not found</h2>
								<p>It looks like you are lost!</p>
								
							</div>
						</div>
					</div>
				</div>
			</div>
        </section>
@endsection