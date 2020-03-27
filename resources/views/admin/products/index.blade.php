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
                                <th>Price</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Edit</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $rb = 1; ?>
                            @foreach($products as $p)
                            <tr>
                                <td>{{ $rb++ }}</td>
                                <td>{{ $p->name }}</td>
                                <td>${{ $p->price }}</td>
                                <td>{{ $p->description }}</td>
                                <td><img src="{{ asset($p->src) }}" class="img-fluid" alt="{{ $p->alt }}"></td>
                                <td><a href="{{ route("products.show", ['product' => $p->id]) }}" class="btn btn-secondary">Edit</a></td>
                                <form action="{{ route("products.destroy", ['product' => $p->id]) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <td><button type="submit" class="btn btn-danger">Remove</button></td>
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->

@endsection
