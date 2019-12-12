@extends('Frontend.layouts.main')
@section('title','Cart')
@section('content')	 

        <!-- cart-main-area start -->
        <div class="cart-main-area section-padding--lg bg--white">
            <div class="container">
            <div class="alert alert-success" style="display:none">
			<strong>Success!</strong>Cart Updated
            </div>
            <div id="vouch" class="alert alert-success" style="display:none">
			    <strong>Success!</strong>Voucher Applied
            </div>
            <div class="alert alert-danger" style="display:none" role="alert">
                Product deleted from cart!
            </div>
            <div class="alert alert-danger voucherror" style="display:none" role="alert">
                Voucher not found!
            </div>
            <div id="vouchinfo" class="alert alert-danger vouchinfo" style="display:none" role="alert">
                Voucher not Active!
            </div>
            <div id="vouchexpire" class="alert alert-danger " style="display:none" role="alert">
                Voucher is expired!
            </div>
            <div id="need" class="alert alert-danger " style="display:none" role="alert">
                You need to add more product in order to avail this voucher!
            </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 ol-lg-12">
                        <form action="#">               
                            <div class="table-content wnro__table table-responsive">
                                <table id="cart">
                                    <thead>
                                        <tr class="title-top">
                                            <th class="product-name">Product name</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                @if(!empty($cart_items))
                                        @foreach($cart_items as $c)
                                        <tr id="{{$c->id}}" >
                                            <input type="hidden" id="session" value="{{session('session_id')}}">
                                            <td class="product-name"><a href="#">{{$c->product_name}}</a></td>
                                            <td class="product-price"><span class="amount">{{$c->price}}</span></td>
                                            <td class="product-quantity"><input type="number" id="quantity" min="1" value="{{$c->quantity}}" ></td>
                                            <td class="product-subtotal">{{$c->total_price}}</td>
                                            <td class="product-remove"><a id="delete" href="javascript:void(0);" onclick="check('{{$c->product_id}}',this)" data-value="{{$c->product_id}}">X</a></td>
                                        </tr>
                                        @endforeach
                                @endif
                                        
                                    </tbody>
                                </table>
                            </div>
                        </form> 
                        <div class="cartbox__btn">
                            <ul class="cart__btn__list d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between">
                                <li><a href="#" style="background:none"></a></li>
                                <li><a href="#" style="background:none"></a></li>
                                <li><a href="{{ route('checkoutpage') }}" >Check Out</a></li>
                            </ul>
                        </div>
                        <div class="checkout_info">
        						<span>Have a coupon? </span>
        						<a class="showcoupon" href="#">Click here to enter your code</a>
        					</div>
        					<div class="checkout_coupon">
        						<form  id="coupon">
        							<div class="form__coupon">
        								<input type="text" id="vouchname" name="name" placeholder="Coupon code">
        								<button type="button" onclick="vouch(event)">Apply coupon</button>
        							</div>
        						</form>
        					</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 offset-lg-6">
                        <div class="cartbox__total__area">
                            <div class="cartbox-total d-flex justify-content-between">
                                <ul class="cart__total__list">
                                    <li>Cart total</li>
                                    @if(Session::has('voucher_amount'))
                                    <li>Discount</li>
                                    @endif
                                    @if(Session::has('total_amount'))
                                    <li>Sub Total</li>
                                    @endif
                                </ul>
                                <ul class="cart__total__tk">
                                    <li>$ &nbsp;{{ Session::get('total_price')}}</li>
                                    @if(Session::has('voucher_amount'))
                                    <li>$ &nbsp;{{ Session::get('voucher_amount')}}</li>
                                    @endif
                                    @if(Session::has('total_amount'))
                                        <li>$ &nbsp;{{ Session::get('total_amount')}}</li>
                                    @endif
                                </ul>
                            </div>
                            <div class="cart__total__amount">
                                <span>Grand Total</span>
                                @if(Session::has('total_amount'))
                                       <span> $ &nbsp;{{ Session::get('total_amount')}}</span>
                                @else
                                <span>$ &nbsp;{{ Session::get('total_price')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        <!-- cart-main-area end -->
		<!-- Footer Area -->
		
		<!-- //Footer Area -->

	</div>
	<!-- //Main wrapper -->

@endsection
@section('scripts')
<script>
    $(".product-quantity").on('change' , 'input[type="number"]',function() { 
        var q = ($(this).val());
        var rowid = $(this).closest('tr').attr('id');
        var session_id = $("#session").val();
        $.ajaxSetup
				({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
					}
				});
				$.ajax({
					url: "/update/cart",
					type : 'get',
					data: {id: rowid,quantity: q, session: session_id},
					success: function(result)
					{
                        $(".alert-success").css("display", "block");
						setTimeout(()=>{
						$(".alert-success").hide();	
						},2000)
					},
					error: function(){
						console.log("error");
					}
				});
    })
    function check(index,val)
    { 
        var session_id = $("#session").val();
        alert(val);
        $.ajaxSetup
            ({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
            });
            $.ajax({
                url: "/delete/"+index+"/cart",
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
    function vouch(e)
    { 
        var name = $('#vouchname').val();
        var session_id = $("#session").val();
        $.ajaxSetup
            ({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
            });
            $.ajax({
                url: "/vouch/add",
                type : 'post',
                data: { _token : "{{ csrf_token() }}", name:name , session: session_id },
                dataType:'JSON',
                success: function(result)
                {
                    if(result.error)
                    {
                        
                        $('.voucherror').css("display", "block");
                        window.scrollTo({
						top: 500,
						behavior: 'smooth',
					    });
                    }
                    if(result.info)
                    {
                        $('#vouchinfo').css("display", "block");
                        window.scrollTo({
						top: 500,
						behavior: 'smooth',
					    });
                    }
                    if(result.expire)
                    {
                        $('#vouchexpire').css("display", "block");
                        window.scrollTo({
						top: 500,
						behavior: 'smooth',
					    });
                    }
                    if(result.success)
                    {
                        location.reload(true);
                        $('#vouch').css("display", "block");
                        window.scrollTo({
						top: 500,
						behavior: 'smooth',
					    });
                    }
                    if(result.need)
                    {
                        $('#need').css("display", "block");
                        window.scrollTo({
						top: 500,
						behavior: 'smooth',
					    });
                    }
                },
                error: function(){
                    alert("error");
                    e.preventDefault();
                }
            });        
    }
</script>
@stop