<!-- Modal -->
<div class="modal fade" id="editkriteria{{$dt->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit data kriteria</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('kriteria.update', $dt->id)}}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_kriteria" class="form-label">Nama Kriteria</label>
                        <input readonly="readonly" type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" value="{{$dt->nama_kriteria}}">
                    </div>
                    <div class="mb-3">
                        <label for="tipe" class="form-label">Tipe Kriteria</label>
                        <select name="tipe" id="tipe" class="form-control">
                            <option @if($dt->tipe === 'benefit') selected="selected" @endif value="benefit">Benefit</option>
                            <option @if($dt->tipe === 'cost') selected="selected" @endif value="cost">Cost</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="bobot" class="form-label">Bobot Kriteria</label>
                        <input type="text" class="form-control" id="bobot" name="bobot" value="{{$dt->bobot}}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-orange btn-sm text-white">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>