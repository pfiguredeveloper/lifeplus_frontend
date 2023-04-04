<html lang="en">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<style>
    body {
         background: #d2d6de;
    }

    *[role="form"] {
        max-width: 400px;
        padding: 15px;
        margin: 0 auto;
        border-radius: 0.3em;
        background-color: #f2f2f2;
        padding-bottom: 0px;
    }

    .ss {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-clip: border-box;
        border-radius: .25rem;
    }

    *[role="form"] h1 {
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 4px;
        font-size: 20px;
        font-weight: bold;
        color: White;
        line-height: 35px;
        margin-bottom: 15px;
        text-align: center;
        background-color: #6B6121;
        margin-top: 0px;
    }
    .card-product .img-wrap {
        border-radius: 3px 3px 0 0;
        overflow: hidden;
        position: relative;
        text-align: center;
    }
    .card-product .img-wrap img {
        max-height: 100%;
        max-width: 100%;
        object-fit: cover;
    }
    .card-product .info-wrap {
        overflow: hidden;
        padding: 15px;
        border-top: 1px solid #eee;
    }
    .card-product .bottom-wrap {
        padding: 15px;
        border-top: 1px solid #eee;
    }
    .label-rating { margin-right:10px;
        color: #333;
        display: inline-block;
        vertical-align: middle;
    }
    .card-product .price-old {
        color: #999;
    }
    .img-responsive {display: block;height: 125px;margin: auto;margin-bottom: 30px;}
</style>
<body>
<br>
<div class="container" style="margin: 3% auto;">
    {!! Form::open(['url' => url('payment_store'), 'files'=>true, 'method' => 'post', 'class' => 'form-horizontal','role'=>'form']) !!}
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

        <h1>Payment</h1>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <figure class="ss card-product">
                    <div class="img-wrap">
                        <img src="{{ URL::asset('assets/website/images/insurance/Life.png') }}" class="img-responsive">
                    </div>
                    <figcaption class="info-wrap">
                        <!-- <h4 class="title">LIFEPLUS</h4>
                        <p class="desc">New Age CRM For Today"s Competitive Insurance Business. Trusted By Insurance & Investment Professional Since 1989</p> -->
                    </figcaption>
                    <div class="bottom-wrap">
                        <a href="javascript:void(0)" class="btn btn-sm btn-primary float-right buy_now" data-amount="<?PHP ECHO $productPrice; ?>" data-id="1" data-cpl_id="<?PHP ECHO $cpl_id; ?>"  data-append_month="<?PHP ECHO $append_month; ?>" data-c_id="<?PHP ECHO $c_id; ?>"   data-pid="<?PHP ECHO $pid; ?>" 
                data-email="<?PHP ECHO $email; ?>"  data-corporateName="<?PHP ECHO $corporateName; ?>"   data-contact="<?PHP ECHO $contact; ?>"  style="width: 115px !important;"> <?php echo $label;?></a> 
                        <div class="price-wrap h5">
                            Pay : 
                            <?PHP ECHO $productPrice; ?>
                        </div>
                    </div>
                </figure>
                <?php if($checkExpiredLicense != 0): ?>
                <center>
                    <div class="btn-group">
                        <a href="{{url('admin')}}" class="btn btn-success">CONTINUE AS DEMO</a>
                    </div>
                </center>
                <?php endif; ?>
                <br>
            </div>
        </div>
        <!-- <button type="submit" class="btn btn-primary btn-block">Register</button> -->
        <!-- <script src="https://checkout.razorpay.com/v1/checkout.js"
                data-key="{{ env('RAZOR_KEY') }}"
                data-amount="118000"
                data-buttontext="Register"
                data-name="LIFEPLUS"
                data-image="{{ URL::asset('assets/website/images/insurance/Life.jpg') }}"
                data-prefill.name="name"
                data-prefill.email="email"
                data-theme.color="red">
        </script> -->
    {!! Form::close() !!}
</div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    var SITEURL = '{{URL::to('')}}';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('body').on('click', '.buy_now', function(e) {
        var totalAmount = $(this).attr("data-amount");
        var product_id  =  $(this).attr("data-id");
        var client_id   = "<?php echo $c_id; ?>";
        var cpl_id   = $(this).attr("data-cpl_id");
        var append_month   = $(this).attr("data-append_month");

        var pid   = $(this).attr("data-pid");
        var c_id   = $(this).attr("data-c_id");
        

        var email = $(this).attr("data-email");
        var corporateName =$(this).attr("data-corporateName");
        var contact =$(this).attr("data-contact");
        
        var options = {
            "key": "{{ env('RAZOR_KEY') }}",
            "amount": (totalAmount*100), // 2000 paise = INR 20
            "prefill"           : {
        "name"              : corporateName,
        "email"            : email,
        "contact"           : contact,
        },
        "name": "LIFEPLUS",
            "image": "{{ URL::asset('assets/website/images/insurance/Life.jpg') }}",
            "handler": function (response) {
                $.ajax({
                    url: "{{ url('payment_store') }}",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        razorpay_payment_id: response.razorpay_payment_id , 
                        totalAmount : totalAmount ,product_id : product_id,append_month:append_month,client_id : client_id,pid : pid,c_id : c_id,cpl_id : cpl_id,"_token":"{{ csrf_token() }}",
                    }, 
                    success: function (msg) {
                        window.location.href = "{{ url('thank-you') }}";
                    }
                });
            },
            "theme": {
                "color": "#528FF0"
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
        e.preventDefault();
    });
</script>

</body>
</html>