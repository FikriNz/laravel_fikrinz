@extends('layouts.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h4">
            Pasien
        </h1>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-light">
                    <h6 class="card-title text-center">
                        Data Pasien
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
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <a href="{{ route('pasien.create') }}" class="btn btn-primary btn-sm mb-3">
                        <i class="fas fa-plus"></i> Tambah Pasien
                    </a>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="filter_rs" class="form-label">Rumah Sakit</label>
                                <select name="filter_rs" id="filter_rs" class="form-control">
                                    <option value="">--PILIH--</option>
                                    <option value="ALL">ALL</option>
                                    @foreach ($rs as $r)
                                        <option value="{{ $r->id }}">{{ strtoupper($r->nama_rumah_sakit) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-sm" id="table-pasen">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Pasien</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Telepon</th>
                                    <th scope="col">Rumah Sakit</th>
                                    <th scope="col"><i class="fas fa-cogs text-center"></i></th>
                                </tr>
                            </thead>
                            <tbody id="pasen_tbody">
                                @foreach ($pasen as $p)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ strtoupper($p->nama_pasien) }}</td>
                                        <td>{{ strtoupper($p->alamat) }}</td>
                                        <td>{{ strtoupper($p->telepon) }}</td>
                                        <td>{{ strtoupper($p->rumahSakit->nama_rumah_sakit ?? 'Data tidak tersedia') }}</td>
                                        <td>
                                            <a href="{{ route('pasien.show', $p->id) }}"><i
                                                    class="fas fa-eye text-info"></i></a>
                                            <a href="{{ route('pasien.edit', $p->id) }}"><i
                                                    class="fas fa-edit text-warning"></i></a>
                                            <div class="d-inline">
                                                <button type="button" class="btn-delete p-0 border-0 bg-transparent"
                                                    data-id="{{ $p->id }}"><i
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
            $('#filter_rs').change(function() {
                var rumahSakitId = $(this).val()
                $.ajax({
                    url: "{{ url('get-pasien-by-rs') }}",
                    type: 'GET',
                    data: {
                        id_rumah_sakit: rumahSakitId
                    },
                    dataType: 'json',
                    success: function(response) {
                        var html = '';
                        if (response.length > 0) {
                            $.each(response, function(index, value) {
                                html += '<tr>';
                                html += '<td>' + (index + 1) + '</td>'
                                html += '<td>' + value.nama_pasien.toUpperCase() +
                                    '</td>'
                                html += '<td>' + value.alamat.toUpperCase() + '</td>'
                                html += '<td>' + value.telepon + '</td>'
                                html += '<td>' + (value.rumah_sakit ? value.rumah_sakit
                                        .nama_rumah_sakit || '-' : 'Data tidak tersedia'
                                    )
                                    .toUpperCase() +
                                    '</td>'
                                html +=
                                    '<td><a href="/pasien/' + value.id +
                                    '"><i class="fas fa-eye text-info"></i></a> ';
                                html +=
                                    '<a href="/pasien/' + value.id +
                                    '/edit"><i class="fas fa-edit text-warning"></i></a> ';
                                html +=
                                    '<button type="button" class="btn-delete p-0 border-0 bg-transparent" data-id="' +
                                    value.id +
                                    '"><i class="fas fa-trash text-danger"></i></button></td>';
                                html += '</tr>';
                            })
                        } else {
                            html +=
                                '<tr><td colspan="6" class="text-center text-danger">Data tidak ditemukan</td></tr>'
                        }
                        $('#pasen_tbody').html(html)
                    },
                    error: function(xhr, status, error) {
                        alert('Server Error')
                    }
                })
            })

            // START DELETE
            $('#sukses-alert').hide();
            $('#error-alert').hide();
            $(document).on('click', '.btn-delete', function() {
                var id_pasen = $(this).data('id');
                var tr = $(this).closest('tr');
                if (confirm("Apakah anda yakin ingin menghapus data ini?")) {
                    $.ajax({
                        url: '{{ route('pasien.destroy', ':id') }}'.replace(':id', id_pasen),
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success) {
                                tr.remove();
                                if ($('#pasen_tbody').find('tr').length == 0) {
                                    $('#pasen_tbody').html(
                                        '<tr><td colspan="6" class="text-center text-danger">Data tidak ditemukan</td></tr>'
                                    );
                                } else {
                                    $('table tbody tr').each(function(index) {
                                        $(this).find('td:first').text(index + 1);
                                    });
                                }
                                $('#sukses-alert').show();
                                $('#pesan-alert').text(response.success);
                            } else {
                                $('#error-alert').show();
                                $('#pesan-alert').text(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            $('#error-alert').show();
                            $('#pesan-alert').text(response.error);
                        }
                    });
                }
            });
        });
    </script>
@endpush
