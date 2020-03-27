@extends("admin-layout")

@section("content")

    <section class="content">
        <div class="container-fluid">
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Message</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $rb = 1; ?>
                    @foreach($infos as $i)
                        <tr>
                            <td>{{ $rb++ }}</td>
                            <td>{{ $i->message }}</td>
                            <td>{{ $i->date }}</td>
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
