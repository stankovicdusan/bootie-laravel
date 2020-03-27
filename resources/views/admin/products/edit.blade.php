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
                        <h3 class="card-title">Update product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route("products.update", ["product" => $singleProduct->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" value="{{ $singleProduct->name }}" name="name" id="nameProduct" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" value="{{ $singleProduct->price }}" name="price" id="price" placeholder="Enter price">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" value="{{ $singleProduct->description }}" name="description" id="descr" placeholder="Enter description">
                            </div>
                            <div class="form-group">
                                <label for="brand">Brand</label>
                                <select name="categoryId" class="form-control select2">
                                    <option value="0">Choose brand</option>
                                    @foreach($categories as $c)
                                        <option {{ $c->id == $singleProduct->id_category ? "selected" : "" }} value="{{ $c->id }}"> {{ $c->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gendreId">Gendre</label>
                                <select name="gendreId" class="form-control select2">
                                    <option value="0">Choose gendre</option>
                                    @foreach($gendre as $g)
                                        <option {{ $g->id == $singleProduct->id_gendre ? "selected" : "" }} value="{{ $g->id }}"> {{ $g->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Image input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose picture</label>
                                        <input type="hidden" name="hidden_image" value="{{ $singleProduct->src }}"/>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
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
