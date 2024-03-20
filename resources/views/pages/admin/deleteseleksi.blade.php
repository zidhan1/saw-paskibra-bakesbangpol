<!-- Modal tambah data -->
<div class="modal fade" id="deleteseleksi{{$dt->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('data-seleksi/delete', $dt->id)}}" method="POST">
                <div class="modal-body text-center">
                    <div>
                        <span class="fs-4">Apakah anda yakin?</span>
                    </div>
                    @csrf
                    <button type="submit" class="btn btn-edit" style="padding-left: 20px; padding-right: 20px;">Ya</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                </div>
            </form>
        </div>
    </div>
</div>