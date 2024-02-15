@extends('layouts.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h4">
            Rumah Sakit
        </h1>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-light">
                    <h6 class="card-title text-center">
                        Data Rumah Sakit
                    </h6>
                </div>
                <div class="card-body">
                    <div class="alert alert-success alert-dismissible fade show" id="sukses-alert">
                        <strong>Success!</strong>
                        <div id="pesan-alert"></div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="alert alert-danger alert-dismissible fade show" id="error-alert">
                        <strong>Error!</strong>
                        <div id="pesan-alert"></div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @if (session()->has('success-rumahsakit'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success-rumahsakit') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session()->has('error-rumahsakit'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            {{ session('error-rumahsakit') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <a href="{{ route('rumah-sakit.create') }}" class="btn btn-primary btn-sm mb-3">
                        <i class="fas fa-plus"></i> Tambah Rumah Sakit
                    </a>
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Rumah Sakit</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Telepon</th>
                                    <th scope="col"><i class="fas fa-cogs text-center"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_rs as $rs)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ strtoupper($rs->nama_rumah_sakit) }}</td>
                                        <td>{{ strtoupper($rs->alamat) }}</td>
                                        <td>{{ strtolower($rs->email) }}</td>
                                        <td>{{ $rs->telepon }}</td>
                                        <td>
                                            <a href="{{ route('rumah-sakit.show', $rs->id) }}"><i
                                                    class="fas fa-eye text-info"></i></a>
                                            <a href="{{ route('rumah-sakit.edit', $rs->id) }}"><i
                                                    class="fas fa-edit text-warning"></i></a>
                                            <div class="d-inline">
                                                <button type="button" class="btn-delete p-0 border-0 bg-transparent"
                                                    data-id="{{ $rs->id }}"><i
                                                        class="fas fa-trash text-danger"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('#sukses-alert').hide();
            $('#error-alert').hide();
            $('.btn-delete').click(function() {
                var id_rs = $(this).data('id');
                var tr = $(this).closest('tr');
                if (confirm("Apakah anda yakin ingin menghapus data ini?")) {
                    $.ajax({
                        url: '{{ route('rumah-sakit.destroy', ':id') }}'.replace(':id', id_rs),
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            // console.log(response)
                            if (response.success) {
                                tr.remove();
                                $('#sukses-alert').show();
                                $('#pesan-alert').text(response.success);
                                $('table tbody tr').each(function(index) {
                                    $(this).find('td:first').text(index + 1);
                                });
                            } else {
                                $('#error-alert').show();
                                $('#pesan-alert').text(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            $('#error-alert').show();
                            $('#pesan-alert').text(response.error);
                        }
                    })
                }
            });
        })
    </script>
@endpush
