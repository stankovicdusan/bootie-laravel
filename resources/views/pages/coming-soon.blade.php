@extends('layout')

@section('content')
    <div class="bg-g1 size1 flex-w flex-col-c-sb p-l-15 p-r-15 p-t-55 p-b-35 respon1">
        <span></span>
        <div class="flex-col-c p-t-50 p-b-50">
            <h3 class="l1-txt1 txt-center p-b-10">
                Coming Soon
            </h3>

            <p class="txt-center l1-txt2 p-b-60">
                Our website is under construction
            </p>

        </div>

        <span class="s1-txt3 txt-center">
			@ 2017 Coming Soon Template. Designed by Colorlib
		</span>

    </div>

    <!-- Modal Login -->
    <div class="modal fade" id="subscribe" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document" data-dismiss="modal">
            <div class="modal-subscribe where1-parent bg0 bor2 size4 p-t-54 p-b-100 p-l-15 p-r-15">
                <button class="btn-close-modal how-btn2 fs-26 where1 trans-04">
                    <i class="zmdi zmdi-close"></i>
                </button>

                <div class="wsize1 m-lr-auto">
                    <h3 class="m1-txt1 txt-center p-b-36">
                        <span class="bor1 p-b-6">Subscribe</span>
                    </h3>

                    <p class="m1-txt2 txt-center p-b-40">
                        Follow us for update now!
                    </p>

                    <form class="contact100-form validate-form">
                        <div class="wrap-input100 m-b-10 validate-input" data-validate = "Name is required">
                            <input class="s1-txt4 placeholder0 input100" type="text" name="name" placeholder="Name">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 m-b-20 validate-input" data-validate = "Email is required: ex@abc.xyz">
                            <input class="s1-txt4 placeholder0 input100" type="text" name="email" placeholder="Email">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="w-full">
                            <button class="flex-c-m s1-txt2 size5 how-btn1 trans-04">
                                Get Updates
                            </button>
                        </div>
                    </form>

                    <p class="s1-txt5 txt-center wsize2 m-lr-auto p-t-20">
                        And don’t worry, we hate spam too! You can unsubcribe at anytime.
                    </p>
                </div>
            </div>

        </div>
    </div>
@endsection
