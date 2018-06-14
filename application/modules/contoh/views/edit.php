<div class="container">
  <h2>Form Tambah</h2>
  <form role="form" action="/contoh/save" method="POST">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="form-group">
      <label for="email">Nama</label>
      <input class="form-control" name="nama" placeholder="Nama Kegiatan" value="<?php echo $nama; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Deskripsi</label>
      <input class="form-control" name="deskripsi" placeholder="Deskripsi Kegiatan" value="<?php echo $deskripsi; ?>">
    </div>
    <button type="submit" class="btn btn-default">Simpan</button>
  </form>
</div>
