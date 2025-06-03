@extends('layouts.admin')

@section('title')
    Tambah DAPIL
@endsection

@push('addStyle')
    <script src="//unpkg.com/alpinejs" defer></script>
@endpush

@section('content')
<form action="{{route('admin.real-count.dapil.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="" >
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label for="" class="form-label">Gambar/Thumbnail</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Nama DAPIL</label>
                    <input type="text" class="form-control" name="nama_dapil">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="" cols="30" rows="4" class="form-control"></textarea>
                </div>
            </div>
        </div>

        <div id="caleg_data">
            <div class="card my-4 caleg_0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Nama Calon</label>
                                <input type="text" name="caleg[0][nama]" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Nomor Calon</label>
                                <input type="number" name="caleg[0][nomor]" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="btn btn-danger remove_caleg" onclick="removeData(0)">
                            <i class="bi bi-trash"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="text-center mb-5">
            <button type="button" class="btn-outline-warning btn add_caleg">Tambah Kandidat Calon</button>
        </div>

        <button type="submit" class="btn btn-warning">Simpan</button>
    </div>
</form>
@endsection


@push('addScript')
    <script>
        let i = 0;
       $(".add_caleg").on("click", function(){
             ++i;
            let tagHtml = `
                <div class="card my-4 caleg_${i}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="" class="form-label">Nama Calon</label>
                                    <input type="text" name="caleg[${i}][nama]" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="" class="form-label">Nomor Calon</label>
                                    <input type="number" name="caleg[${i}][nomor]" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <div class="btn btn-danger remove_caleg" onclick="removeData(${i})">
                                <i class="bi bi-trash"></i>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            $("#caleg_data").append(tagHtml);
       })

       function removeData(id){
            console.log('id', id)
            $(`.caleg_${id}`).remove();
       }

    </script>
@endpush

