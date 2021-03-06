@extends("admin-layout")

@section("content")

    <section class="content">
        <div class="container-fluid">
            <div class="col-md-8">
                @if(session()->has("error"))
                    <div class="alert alert-danger">
                        {{ session()->get("error") }}
                    </div>
                @endif
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update user</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route("users.update", ['user' => $user->id]) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">

                        <div class="card-body">
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" value="{{ $user->firstName }}" name="firstName" id="nameProduct" placeholder="Enter first name">
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" value="{{ $user->lastName }}" name="lastName" id="price" placeholder="Enter last name">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" value="{{ $user->username }}" name="username" id="descr" placeholder="Enter username">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" value="{{ $user->email }}" name="email" id="descr" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" value="{{ $user->password }}" name="password" id="descr" placeholder="Enter password">
                            </div>
                            <div class="form-group">
                                <label for="brand">Role</label>
                                <select name="roleId" class="form-control select2">
                                    <option value="0">Choose role</option>
                                    @foreach($roles as $r)
                                        <option {{ $r->id == $user->id ? "selected" : "" }} value="{{ $r->id }}"> {{ $r->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>

                </div>

            </div>
            <div class="col-md-4">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </section>
    </div>
    <!-- /.content-wrapper -->

@endsection
