<h2>Daftar mobil</h2>
<?= $this->session->flashdata('pesan'); ?>
<center>
  <a href="#tambah" data-toggle="modal" class="btn btn-warning">+Tambah</a>
</center>
<table id="example" class="table table-hover table-striped">
  <thead>
    <tr>
      <td>Kode</td>
      <td>Tipe</td>
      <td>Jenis</td>
      <td>Tahun</td>
      <td>Stok</td>
      <td>Harga</td>
      <td>Aksi</td>
    </tr>
  </thead>
  <tbody>
    <?php $no=0; foreach($tampil_mobil as $mobil):
    $no++; ?>
    <tr>
      <td><?= $mobil->kode_mobil ?></td>
      <td><?= $mobil->tipe_mobil ?></td>
      <td><?= $mobil->jenis ?></td>
      <td><?= $mobil->tahun ?></td>
      <td><?= $mobil->stok ?></td>
      <td><?= $mobil->harga ?></td>
      <td><a href="#edit" onclick="edit('<?= $mobil->kode_mobil ?>')" data-toggle="modal" class="btn btn-success">Ubah</a>
        <a href="<?=base_url('index.php/mobil/hapus/'.$mobil->kode_mobil)?>" onclick="return confirm('Are you sure?')" class="btn btn-danger">Hapus</a></td>
    </tr>
  <?php endforeach ?>
  </tbody>
</table>

<div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-titile">Tambah mobil</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/mobil/tambah')?>" method="post" enctype="multipart/form-data">
          <table>
            <tr>
              <td>Kode</td>
              <td><input type="text" name="kode_mobil" required class="form-control"></td>
            </tr>
            <tr>
              <td>Tipe</td>
              <td><input type="text" name="tipe_mobil" required class="form-control"></td>
            </tr>
            <tr>
              <td>Jenis</td>
              <td><select name="id_kategori" class="form-control">
                <option></option>
                <?php foreach($kategori as $kat): ?>
                <option value="<?=$kat->id_kategori?>"><?=$kat->jenis?></option>
                <?php endforeach ?>
              </select></td>
            </tr>
            <tr>
              <td>Tahun</td>
              <td><input type="number" name="tahun" required class="form-control"></td>
            </tr>
            <tr>
              <td>Stok</td>
              <td><input type="number" name="stok" required class="form-control"></td>
            </tr>
            <tr>
              <td>Harga</td>
              <td><input type="text" name="harga" required class="form-control"></td>
          </table>
          <input type="submit" name="create" value="Simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-titile">Edit mobil</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/mobil/edit_mobil')?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="kode_mobil_lama" id="kode_mobil_lama">
          <table>
            <tr>
              <td>Kode</td>
              <td><input type="text" name="kode_mobil" id="kode_mobil" class="form-control"></td>
            </tr>
            <tr>
              <td>Tipe</td>
              <td><input type="text" name="tipe_mobil" id="tipe_mobil" required class="form-control"></td>
            </tr>
            <tr>
              <td>Jenis</td>
              <td><select name="id_kategori" class="form-control" id="id_kategori">
                <option></option>
                <?php foreach($kategori as $kat): ?>
                <option value="<?=$kat->id_kategori?>"><?=$kat->jenis?></option>
                <?php endforeach ?>
              </select></td>
            </tr>
            <tr>
              <td>Tahun</td>
              <td><input type="number" name="tahun" required id="tahun" class="form-control"></td>
            </tr>
            <tr>
              <td>Stok</td>
              <td><input type="number" name="stok" required id="stok" class="form-control"></td>
            </tr>
            <tr>
              <td>Harga</td>
              <td><input type="number" name="harga" required id="harga" class="form-control"></td>
            </tr>
          </table>
          <input type="submit" name="edit" value="Simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function edit(a){
    $.ajax({
      type:"post",
      url:"<?=base_url()?>index.php/Mobil/edit_mobil/"+a,
      dataType:"json",
      success:function(data){
        $("#kode_mobil").val(data.kode_mobil);
        $("#tipe_mobil").val(data.tipe_mobil);
        $("#id_kategori").val(data.id_kategori);
        $("#tahun").val(data.tahun);
        $("#stok").val(data.stok);
        $("#harga").val(data.harga);
        $("#kode_mobil_lama").val(data.kode_mobil);
      }
    })
  }
</script>