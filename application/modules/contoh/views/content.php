<div class="container" style="color: #000">
  <h2>Todo List</h2>
  <p>Contoh Module CRUD</p>
  <div><a href="/contoh/tambah" class="btn btn-primary" role="button">Tambah</a></div>
  <table class="table table-hover" style="color: #000">
    <thead>
      <tr style="background: #F5F5F5">
          <th width="10">No</th>
        <th>Nama Kegiatan</th>
        <th>Deskripsi Kegiatan</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
        <?php if($data){
        
            foreach($data as $index => $values){ ?>
        
                <tr>
                    <td><?php echo $index + 1 ?></td>
                    <td><?php echo $values['nama']; ?></td>
                    <td><?php echo $values['deskripsi']; ?></td>
                    <td><a href="/contoh/edit/<?php echo $values['id']; ?>" class="btn btn-primary" role="button">Ubah</a></td>
                    <td><a href="/contoh/delete/<?php echo $values['id']; ?>" class="btn btn-primary" role="button">Hapus</a></td>
                </tr>
                
            <?php
            }
        }
        ?>
    </tbody>
  </table>
</div>