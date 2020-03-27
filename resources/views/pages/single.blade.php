@extends("layout")

@section("content")
    <section class="ab-info-main py-md-5 py-4">
        <div class="container py-md-3">
            <!-- top Products -->
            <div class="row">

                <!-- product right -->
                <div class="left-ads-display col-lg-8">
                    <div class="row">
                        <div class="desc1-left col-md-6">
                            <img src="{{ asset($product->src) }}" class="img-fluid" alt="{{ $product->alt }}">
                        </div>
                        <div class="desc1-right col-md-6 pl-lg-4">
                            <h3>{{ $product->name }}</h3>
                            <h5>${{ $product->price }}</h5>
                            @if(session()->has("success"))
                                <div class="alert alert-success">
                                    {{ session()->get("success") }}
                                </div>
                            @elseif(session()->has("error"))
                                <div class="alert alert-danger">
                                    {{ session()->get("error") }}
                                </div>
                            @endif
                            @if(session()->has("user"))
                                <h3 class="pt-3">Add to cart functionality coming soon!</h3>
                            @endif
                            <div class="available mt-3">
                                @if(!session()->has("user"))
                                    <span><a href="{{ route("login") }}">Login to see more details </a></span>
                                @endif
                                <p>Lorem Ipsum has been the industry's standard since the 1500s. Praesent ullamcorper dui turpis.. </p>
                            </div>
                            <div class="share-desc">
                                <div class="share">
                                    <h4>Share Product :</h4>
                                    <ul class="w3layouts_social_list list-unstyled">
                                        <li>
                                            <a href="#" class="w3pvt_facebook">
                                                <span class="fa fa-facebook-f"></span>
                                            </a>
                                        </li>
                                        <li class="mx-2">
                                            <a href="#" class="w3pvt_twitter">
                                                <span class="fa fa-twitter"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="w3pvt_dribble">
                                                <span class="fa fa-dribbble"></span>
                                            </a>
                                        </li>
                                        <li class="ml-2">
                                            <a href="#" class="w3pvt_google">
                                                <span class="fa fa-google-plus"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row sub-para-w3layouts mt-5">
                        <p>{{$product->description}}</p>
                    </div>


                </div>
            </div>
        </div>
    </section>

@endsection

{{--}}@section("appendScripts")
    <script>
        $(document).ready(function(){
           $("#add-to-cart-ajax").click(function(){
              let id = $(this).data("id");

              $.ajax({
                 headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
                 url: baseUrl + '/insertCart/' + id,
                 method: 'post',
                 dataType: 'json',
                 data: {
                     id: id
                 },
                 success: function(){
                     console.log(id);
                 },
                 error: function(error){
                     alert(error.responseJSON.greska);
                 }
              });
           });
        });
    </script>
@endsection{{--}}
