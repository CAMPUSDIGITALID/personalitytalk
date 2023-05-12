@extends('faturcms::template.admin.main')

@section('title', 'Data Pop-Up')

@section('content')

<!-- Main -->
<main class="app-content">

    <!-- Breadcrumb -->
    @include('faturcms::template.admin._breadcrumb', ['breadcrumb' => [
        'title' => 'Data Pop-Up',
        'items' => [
            ['text' => 'Pop-Up', 'url' => route('admin.pop-up.index')],
            ['text' => 'Data Pop-Up', 'url' => '#'],
        ]
    ]])
    <!-- /Breadcrumb -->

    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-md-12">
            <!-- Tile -->
            <div class="tile">
                <!-- Tile Title -->
                <div class="tile-title-w-btn">
                    <div class="btn-group">
                        <a href="{{ route('admin.pop-up.create') }}" class="btn btn-sm btn-theme-1"><i class="fa fa-plus mr-2"></i> Tambah Data</a>
                    </div>
                </div>
                <!-- /Tile Title -->
                <!-- Tile Body -->
                <div class="tile-body">
                    @if(Session::get('message') != null)
                    <div class="alert alert-dismissible alert-success">
                        <button class="close" type="button" data-dismiss="alert">×</button>{{ Session::get('message') }}
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="20"><input type="checkbox"></th>
                                    <th>Judul</th>
                                    <th width="90">Waktu Awal</th>
                                    <th width="90">Waktu Akhir</th>
                                    <th width="60">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($popup as $data)
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>{{ $data->popup_judul }}</td>
                                    <td>
                                        <span class="d-none">{{ $data->popup_from }}</span>
                                        {{ date('d/m/Y', strtotime($data->popup_from)) }}
                                    </td>
                                    <td>
                                        <span class="d-none">{{ $data->popup_to }}</span>
                                        {{ date('d/m/Y', strtotime($data->popup_to)) }}
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            @if($data->popup_tipe == 1)
                                            <a href="{{ asset('assets/images/pop-up/'.$data->popup) }}" class="btn btn-sm btn-info btn-magnify-popup" data-toggle="tooltip" title="Gambar Pop-Up"><i class="fa fa-image"></i></a>
                                            @elseif($data->popup_tipe == 2)
                                            <a href="{{ $data->popup }}" class="btn btn-sm btn-info btn-magnify-popup video-link" data-toggle="tooltip" title="Video Pop-Up"><i class="fa fa-video-camera"></i></a>
                                            @endif
                                            <a href="{{ route('admin.pop-up.edit', ['id' => $data->id_popup]) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                                            <a href="#" class="btn btn-sm btn-danger btn-delete" data-id="{{ $data->id_popup }}" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <form id="form-delete" class="d-none" method="post" action="{{ route('admin.pop-up.delete') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id">
                        </form>
                    </div>
                </div>
                <!-- /Tile Body -->
            </div>
            <!-- /Tile -->
        </div>
        <!-- /Column -->
    </div>
    <!-- /Row -->
</main>
<!-- /Main -->

@endsection

@section('js-extra')

@include('faturcms::template.admin._js-table')

<script type="text/javascript">
    // DataTable
    generate_datatable("#dataTable");
</script>

@endsection

@section('css-extra')

<link rel="stylesheet" type="text/css" href="{{ asset('templates/vali-admin/vendor/magnific-popup/magnific-popup.css') }}">

@endsection