<?php  
  include "header.php";
  include "navbar.php";
?>

      <div class="card mt-2">
        <div class="card-body">
                   <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah-data">
              Tambah Data
                 </button>
        </div>
        <div class="card-body">
          <?php
            if (isset($_GET['pesan'])) {
            if ($_GET['pesan']=="simpan") {?>
            <div class="alert alert-success" role="alert">
                Data Berhasil Disimpan
            </div>
                <?php } ?>
            <?php  if ($_GET['pesan']=="update") {?>
            <div class="alert alert-success" role="alert">
                Data Berhasil Di Perbarui
            </div>
              <?php } ?>

            <?php  if ($_GET['pesan']=="hapus") {?>
            <div class="alert alert-success" role="alert">
                Data Berhasil Di Hapus
            </div>
            <?php } ?>
            <?php
              }
            ?>
          <table class="table">
                  <thead>
                    <th>No</th>
                    <th>Nama Petugas</th>
                    <th>Usename</th>
                    <th>Akses Petugas</th>
                    <th>Aksi</th>
                  </thead>
                  <tbody>
                    <?php 
            include '../koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi,"select * from user");
            while($d = mysqli_fetch_array($data)){
            ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['nama']; ?></td>
                    <td><?php echo $d['username']; ?></td>
                    <td>
                      <?php
                      if ($d['level'] == '1') { ?>
                          Administrator
                       <?php } else { ?>
                          Petugas
                       <?php } ?>
                    </td>
                    <td>
                  
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit-data<?php echo $d['iduser']; ?>">
                  Edit
                      </button>
                       <?php
                      if ($d['level'] == $_SESSION['level']) { ?>
                       <?php } else { ?>
                          <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus-data<?php echo $d['iduser']; ?>">
                  Hapus 
                      </button>
                       <?php } ?>
                    </td>
                  </tr>
<!-- Modal Edit Data-->
<div class="modal fade" id="edit-data<?php echo $d['iduser']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="proses_update_petugas.php" method="post">
      <div class="modal-body">
        <div class="form-group">
            <label>Nama</label>
            <input type="hidden" name="iduser" value="<?php echo $d['iduser']; ?>">
            <input type="text" name="nama" class="form-control" value="<?php echo $d['nama']; ?>">
          </div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $d['username']; ?>">
          <div class="form-group">
            <label>Password</label>
            <input type="text" name="password" class="form-control">
            <small class="text-danger text-sm">* Kosongkan kalau tidak merubah password</small>
          </div>
          </div>
          <div class="form-group">
            <label>Akses Petugas</label>
            <select name="level" class="form-control">
              <option>--- Akses Akses ---</option>
              <option value="1" <?php if ($d['level'] == '1') { echo "selected";} ?>>Adminitrator</option>
              <option value="2" <?php if ($d['level'] == '2') { echo "selected";} ?>>Petugas</option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Perbarui</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- Modal Hapus Data-->
<div class="modal fade" id="hapus-data<?php echo $d['iduser']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="proses_hapus_petugas.php" method="post">
      <div class="modal-body">
        <input type="hidden" name="iduser" value="<?php echo $d['iduser']; ?>">
        Apakah anda yakin akan menghapus data produk <b> <?php echo $d['nama']; ?> </b>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Hapus</button>
      </div>
    </form>
    </div>
  </div>
</div>
      <?php } ?>
                  </tbody>
                 </table>
        </div>
      </div>

<!-- Modal Tambah Data-->
<div class="modal fade" id="tambah-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="proses_simpan_petugas.php">
      <div class="modal-body">
          <div class="form-group">
            <label>nama</label>
            <input type="text" name="nama" class="form-control">
          </div>

          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control">
          </div>

          <div class="form-group">
            <label>Password</label>
            <input type="text" name="password" class="form-control">
          </div>
            <div class="form-group">
            <label>Akses Petugas</label>
            <select name="level" class="form-control">
              <option>--- Akses Akses ---</option>
              <option value="1">Adminitrator</option>
              <option value="2">Petugas</option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php  

include "footer.php";

?>