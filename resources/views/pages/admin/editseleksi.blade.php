<!-- Modal tambah data -->
<div class="modal fade" id="editseleksi{{$dt->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Jadwal Seleksi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('data-seleksi/edit', $dt->id)}}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Ujian</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{$dt->nama}}">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{\Illuminate\Support\Carbon::parse($dt->tanggal_mulai)->format('Y-m-d')}}">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="{{\Illuminate\Support\Carbon::parse($dt->tanggal_selesai)->format('Y-m-d')}}">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="5">{{$dt->keterangan}}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-edit">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>