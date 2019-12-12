@extends('Frontend.layouts.main')
@section('title','Wishlist')
@section('content')	        <!-- cart-main-area start -->
        <div class="wishlist-area section-padding--lg bg__white">
            <div class="container">
            <div class="alert alert-success" style="display:none">
				<strong>Success!</strong>Product added to cart
			</div>
            <div class="alert alert-danger" style="display:none" role="alert">
                Product deleted from Wishlist!
            </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <form action="#">
                                <div class="wishlist-table wnro__table table-responsive">
                                @if(count($wishlist))
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-remove"></th>
                                                <!-- <th class="product-thumbnail"></th> -->
                                                <th class="product-name"><span class="nobr">Product Name</span></th>
                                                <th class="product-price"><span class="nobr"> Unit Price </span></th>
                                                <!-- <th class="product-stock-stauts"><span class="nobr"> Stock Status </span></th> -->
                                                <th class="product-add-to-cart"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         
                                            @foreach($wishlist as $w)
                                            <tr>
                                            <input type="hidden" id="session" value="{{ session('session_wish') }}">
                                                <td class="product-remove"><a href="#" onclick="check('{{$w->product_id}}',this)" data-value="{{$w->product_id}}">X</a></td>
                                                <!-- <td class="product-thumbnail"><a href="#"><img src="images/product/sm-3/3.jpg" alt=""></a></td> -->
                                                <td class="product-name"><a href="#">{{$w->product_name}}</a></td>
                                                <td class="product-price"><span class="amount">$ {{$w->price}}</span></td>
                                                <!-- <td class="product-stock-status"><span class="wishlist-in-stock">In Stock</span></td> -->
                                                <td class="product-add-to-cart"><a href="#" onclick="addCart('{{$w->product_id}}',this)"> Add to Cart</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                    <section class="page_error section-padding--lg bg--white">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="error__inner text-center">
                                                        <div class="error__logo">
                                                            <a href="#"><img src="{{asset('images/no_products_found.png')}}" alt="error images"></a>
                                                        </div>
                                                        <div class="error__content">
                                                            <p>There are no products in wishlist!</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                @endif

                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end --> 
	</div>
    <!-- //Main wrapper -->
    @endsection
    @section('scripts')
    <script>
    function check(index,val)
    { 
        var session_id = $("#session").val();
        $.ajaxSetup
            ({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
            });
            $.ajax({
                url: "/delete/"+index+"/wish",
                type : 'get',
                data: {id:index ,session: session_id },
                dataType:'JSON',
                success: function(result)
                {
                    $('#myTableRow').remove();
                    $(".alert-danger").css("display", "block");
                    setTimeout(()=>{
                    $(".alert-danger").hide();	
                    },2000)
                },
                error: function(){
                    alert("error");
                }
            });        
    }
    function addCart(index)
			{
				// if(index == "modal")
				// {
				// 	index = $("#idButton").data("id");
				// }
				$.ajaxSetup
				({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
					}
				});
				$.ajax({
					url: "/add/"+index+"/cart/",
					type : "get",
					data: {id: index},
					success: function(result)
					{
						$(".alert-success").show();
						setTimeout(()=>{
							$(".alert-success").hide();	
						},2000)
						console.log(result)
					},
					error: function(){
						alert("error");
					}
				});
			}
			$(document).ready(function() {
			$('[id^=detail-]').hide();
			$('.toggle').click(function() {
				$input = $( this );
				$target = $('#'+$input.attr('data-toggle'));
				$target.slideToggle();
			});
		});
    </script>
    @stop
