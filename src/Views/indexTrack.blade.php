@extends('layouts.admin.main')

@section('title', 'Arts')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet"
          href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/skins/_all-skins.min.css') }}">
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Arts</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin/albums') }}"><i class="fa fa-dashboard"></i> Albums</a></li>
                <li><a href="{{ action('\Vadiasov\TracksAdmin\Controllers\TracksController@index', $album->id) }}">Tracks</a></li>
                <li><a href="#">Arts</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Data Table With Arts of Track <span
                                        style="color: #3c8dbc">{{ $track->title }}</span> of Album <span
                                        style="color: #3c8dbc">{{ $album->title }}</span></h3>
                            <a href="{{ action('\Vadiasov\Upload\Controllers\UploadController@upload4', ['artsAdminFromTracks', $album->id, $track->id]) }}"
                               class="btn btn-info pull-right">Add Arts</a>
                            <a href="{{ action('\Vadiasov\Ordering\Controllers\OrderingController@index2', ['artsTrackOrdering', $album->id, $track->id]) }}"
                               class="btn btn-success pull-right" style="margin-right: 20px">Order Arts</a>
                            @if (session('status'))
                                <h4 class="alert alert-success" style="margin-top: 20px;">
                                    {{ session('status') }}
                                </h4>
                            @endif
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Order</th>
                                    <th>File</th>
                                    <th>Thumb</th>
                                    <th>Cover</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($arts as $art)
                                    <tr>
                                        <td>{{ $art->id }}</td>
                                        <td>{{ $art->order }}</td>
                                        <td>{{ $art->file }}</td>
                                        <td><img src="{{ asset('storage/arts/' . $art->file) }}" alt="" height="100px">
                                        </td>
                                        @if($art->cover == 0)
                                            <td>
                                                <a href="{{action('\Vadiasov\ArtsAdmin\Controllers\ArtsController@setCoverTrack', [$album->id, $track->id, $art->id])}}">
                                                    <i class="fa fa-ban" aria-hidden="true"></i></a>
                                            </td>
                                        @else
                                            <td>
                                                <a href="{{action('\Vadiasov\ArtsAdmin\Controllers\ArtsController@notCoverTrack', [$album->id, $track->id, $art->id])}}">
                                                    <i class="fa fa-check" aria-hidden="true"></i></a>
                                            </td>
                                        @endif
                                        <td>{{ $art->created_at }}</td>
                                        <td>{{ $art->updated_at }}</td>
                                        <td>
                                            <a href="{{action('\Vadiasov\ArtsAdmin\Controllers\ArtsController@destroyTrack', [$album->id, $track->id, $art->id])}}">
                                                <i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Order</th>
                                    <th>File</th>
                                    <th>Thumb</th>
                                    <th>Cover</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Actions</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('js')
    <!-- DataTables -->
    <script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('admin/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('admin/dist/js/demo.js') }}"></script>
    <!-- page script -->
    <script>
        $(function () {
            $('#example1').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            });
        })
    </script>
@endsection