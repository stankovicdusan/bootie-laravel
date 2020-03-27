@extends("admin-layout")

@section("content")
    <section class="content">
        <div class="container-fluid">
            @if(session()->has("success"))
                <div class="alert alert-success">
                    {{ session()->get("success") }}
                </div>
            @endif
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Edit</th>
                        <th>Remove</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $rb = 1; ?>
                    @foreach($users as $u)
                        <tr>
                            <td>{{ $rb++ }}</td>
                            <td>{{ $u->firstName }}</td>
                            <td>{{ $u->username }}</td>
                            <td>{{ $u->email }}</td>
                            <td>{{ $u->password }}</td>
                            <td>{{ $u->name }}</td>
                            <td><a href="{{ route("users.show", ['user' => $u->id]) }}" class="btn btn-secondary">Edit</a></td>
                            <form action="{{ route("users.destroy", ['user' => $u->id]) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <td><button type="submit" class="btn btn-danger">Remove</button></td>
                            </form>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    </div>
    <!-- /.content-wrapper -->

@endsection
