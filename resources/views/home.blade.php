@extends('layouts.app')

@section('content')
    <body>
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous"
            src="../connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0&appId=495166697263325&autoLogAppEvents=1"
            nonce="fX1PedQ5"></script>
    
        <header>
            <style>
                #in-header-middle-wrap {
                    display: inline-block;
                    min-height: 50px;
                    width: 100%;
                    margin-top: 10px;
                    background: #222222;
                }
            </style>
            <div class="menu-overlay"></div>

            <script type="text/javascript">
                $(function () {
                    $('.menu-icon-show').click(function () {
                        $('.login-nav ul').fadeToggle();
                    });
                    $('.advanced-field').hide();
                    $('.advance-search').click(function () {
                        $('.advanced-field').slideToggle()
                    });
                })
            </script>

            <!--======= nav bar =====-->
            @include('layouts.navbar')
            
        </header>
        <section class="products">
            <div class="container form-bg">
                <div class="container">
                    <!--==== search form ====-->
                   @include('layouts.searchForm')
                </div>
            </div>
            
            <div class="product-filters-container">
                <div class="container">
                    <div class="row">
                        <!--====left side bar ====-->
                        @include('layouts.left_sidebar')

                       <!--=====main section =====-->
                       @include('layouts.main_section')

                       <!--=====right side bar=====-->
                        @include('layouts.right_sidebar')
                    </div>
    
                </div>
            </div>
    
        </section>
    
        <script type="text/javascript">
            $(function () {
                $("#make").change(function () {
                    var id = $(this).val();
                    $.ajax({
                        type: "get",
                        url: "/shop/get_models/" + id,
                        beforeSend: function () {
                            $(".loading-div").show()
                        },
                        success: function (data) {
                            //console.log(data);
                            var item = '', obj = [];
    
                            $(".loading-div").hide();
                            $.each(data, function (i, v) {
                                item += '<option value="' + v.id + '">' + v.name + '</option>';
                            });
                            obj.push(item);
    
                            $("#models").html('<option value="">Select Model</option>' + obj);
    
                        },
                        dataType: "json",
                    })
                })
            });
        </script>
    
       <!--=====footer section=====-->
       @include('layouts.footer_section')

        <script type="text/javascript">
            $(function () {
                $('.quick-view').click(function () {
                    var _url = $(this).attr('href');
                    $('.container-details').load(_url);
                    $(".quick-view-table-wrapper").fadeIn();
                    return false;
                });
                $('.hide-preview').click(function () {
                    $(".quick-view-table-wrapper").fadeOut();
                });
    
                $('.attach-slip-button').click(function () {
                    $('.quick-view-container>h2>span').html('Attach Payment Slip');
                    var id = $(this).data('id');
                    var form_html = '<div style="padding: 0 30px"> ' +
                        '<p>Please attach the payment slip made for this order. Our accounts team will verify and update your invoice to PAID.</p>' +
                        '<form action="/account/upload_slip" method="POST" enctype="multipart/form-data">' +
                        '<input type="file" name="slip" /><input type="hidden" name="invoice_id" value="' + id + '" />' +
                        '<div style="padding-top: 30px;"><input type="submit" class="btn btn-primary" value="Upload Slip" /></div></form></div>';
                    $('.container-details').html(form_html);
                    $(".quick-view-table-wrapper").fadeIn();
                    return false;
                });
            });
        </script>
    </body>
@endsection
