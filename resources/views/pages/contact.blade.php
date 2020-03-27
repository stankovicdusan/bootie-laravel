@extends("layout")

@section('content')
    <section class="ab-info-main py-5">
        <div class="container py-3">
            <h3 class="tittle text-center"><span class="sub-tittle">Find Us</span> Contact Us</h3>
            <div class="row contact-main-info mt-5">
                @if(session()->has("success"))
                    <div class="alert alert-success">
                        {{ session()->get("success") }}
                    </div>
                @endif
                @if(session()->has("error"))
                    <div class="alert alert-danger">
                        {{ session()->get("error") }}
                    </div>
                @endif
                <div class="col-md-6 contact-right-content">
                    <form action="{{ route("sendMail") }}" method="post">
                        @csrf

                        <input type="text" name="Name" placeholder="Name">
                        <input type="text" name="Subject" placeholder="Subject">
                        <textarea name="Message" placeholder="Message"></textarea>
                        <div class="read mt-3">
                            <input type="submit" value="Submit">
                        </div>
                    </form>

                </div>

                <div class="col-md-6 contact-left-content">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="address-con">
                        <h4 class="mb-2"><span class="fa fa-phone-square" aria-hidden="true"></span> Phone</h4>
                        <p>+121 098 8907 9987</p>
                        <p>+121 098 8907 9987</p>
                    </div>
                    <div class="address-con my-4">
                        <h4 class="mb-2"><span class="fa fa-envelope-o" aria-hidden="true"></span> Email </h4>
                        <p><a href="mailto:info@example.com">info@example.com</a></p>
                        <p><a href="mailto:info@example.com">info@example.com</a></p>
                    </div>
                    <div class="address-con mb-4">
                        <h4 class="mb-2"><span class="fa fa-fax" aria-hidden="true"></span> Fax</h4>

                        <p>(800) 123-80088</p>
                    </div>
                    <div class="address-con">
                        <h4 class="mb-2"><span class="fa fa-map-marker" aria-hidden="true"></span> Location </h4>

                        <p>Honey Avenue, New York City</p>
                    </div>

                </div>

            </div>

        </div>
    </section>

@endsection
