@extends("layout")

@section("content")

@if(session()->has("success"))
    <div class="alert alert-success">
        {{ session()->get("success") }}
    </div>
@endif
<section class="ab-info-main py-md-5 py-4">
        <div class="container py-md-3">
            <!-- top Products -->
            <div class="row">
                <!-- product left -->
                <div class="side-bar col-lg-4">
                    <button class="form-control margin" id="clear">Clear Filters</button>
                    <input class="form-control search" type="text" placeholder="Search" aria-label="Search" id="search">
                    <!--preference -->
                    <div class="left-side my-4">
                        <h3 class="sear-head">Brands</h3>
                        <ul class="w3layouts-box-list">
                            <?php $count = 1 ?>
                            @foreach($categories as $cat)
                                <li><a href="#" class="category-title" data-id="{{ $cat->id }}">{{ $cat->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- // preference -->
                    <!-- discounts -->
                    <div class="left-side my-4">
                        <h3 class="sear-head">Gender</h3>
                        <ul class="w3layouts-box-list">
                            <?php $count = 1 ?>
                        @foreach($gendre as $gen)
                            <li><a href="#" class="genrde-title" data-id="{{ $gen->id }}">{{ $gen->name }}</a></li>
                        @endforeach
                        </ul>
                    </div>
                    <!-- //discounts -->

                </div>
                <!-- //product left -->
                <!-- product right -->

                <div class="left-ads-display col-lg-8">
                        <div class="row products">

                            @foreach($products as $product)
                                @component("partials.product", [
                                    "p" => $product
                                ])

                                @endcomponent
                            @endforeach

                        </div>
                            <ul class="pagination" id="pagination">
                                {{$products->links()}}
                            </ul>
                </div>

            </div>
        </div>
    </section>
    <!-- //contact -->

@endsection

@section("appendScripts")
    <script>
        $(document).ready(function(){
            let data = {
                page: 1
            }
            $("#clear").click(function(){
                data = {
                    page : 1
                }

                ajaxRequest();
            });

            $("#search").keyup(function(){
               data['search'] = this.value;

               ajaxRequest();
            });

            $(".category-title").click(function(){
               data['category_id'] = $(this).attr("data-id");

               ajaxRequest();
            });

            $(".genrde-title").click(function(){
                data['gendre_id'] = $(this).attr("data-id");

                ajaxRequest();
            });

            function ajaxRequest(){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: data,
                    dataType:"json",
                    method:"GET",
                    url:"api/products",
                    success : function(data){
                        displayProducts(data.data);
                        displayPagination(data.last_page, data.current_page);
                    },
                    error:function(error, xhr, status){
                        console.log(error);
                    }
                });
            }

            function displayProducts(arr){
                let html = '';
                let url = '/home/';

                arr.forEach(
                    element => {
                        html += '<div class="col-md-4 product-men my-lg-4">' +
                                     '<a href="' + baseUrl + url + element.id +'">' +
                                     '<div class="product-shoe-info shoe text-center">' +
                                     '<div class="men-thumb-item">' +
                                     '<img src="' + element.src + '" class="img-fluid" alt="' + element.alt + '">' +
                                     '</div>' +
                                     '<div class="item-info-product">' +
                                     '<h4>' + element.name + '</h4>' +
                                     '<div class="product_price">' +
                                     '<div class="grid-price">' +
                                     '<span class="money">$' + element.price + '</span>' +
                                     '</div>' +
                                     '</div>' +
                                     '</div>' +
                                     '</div>' +
                                     '</a>' +
                                     '</div>';
                    }
                );
                $('.products').html(html);
            }

            function displayPagination(last_page, current_page){
                let html = "";
                for(let i = 1;i <= last_page; i++){

                    if(i == current_page){
                        html += `<li class='page-item active' data-page='${i}'><a class='page-link' >${i}</a></li>`
                    }
                    else{
                        html += `<li class='page-item' data-page='${i}'><a class='page-link' >${i}</a></li>`
                    }
                }
                $("#pagination").html(html);

                $(".page-item").click(function(){
                    data['page'] = $(this).attr("data-page");
                    ajaxRequest();
                })
            }
        });
    </script>
@endsection
