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
                        <th>Name</th>
                        <th>Edit</th>
                        <th>Remove</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $rb = 1; ?>
                    @foreach($categ as $c)
                        <tr>
                            <td>{{ $rb++ }}</td>
                            <td>{{ $c->name }}</td>
                            <td><a href="{{ route("categories.show", ['category' => $c->id]) }}" class="btn btn-secondary">Edit</a></td>
                            <form action="{{ route("categories.destroy", ['category' => $c->id]) }}" method="post">
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
