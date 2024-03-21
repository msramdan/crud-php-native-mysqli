<?php
if (isset($_POST['cari'])) {
  $cari = $_POST['cari'];
} else {
  $cari = "";
}
?>

<div class="row">
  <div class="col-md-12">
    <div class="page-header">
      <h4>
        <i class="glyphicon glyphicon-user"></i> Data Jadwal Mengajar

        <div class="pull-right btn-tambah">
          <form class="form-inline" method="POST" action="index.php">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="glyphicon glyphicon-search"></i>
                </div>
                <input type="text" class="form-control" name="cari" placeholder="Cari Nama Guru..." autocomplete="off" value="<?php echo $cari; ?>">
              </div>
            </div>
            <a class="btn btn-info" href="?page=tambah">
              <i class="glyphicon glyphicon-plus"></i> Tambah
            </a>
          </form>
        </div>

      </h4>
    </div>
    <?php
    if (empty($_GET['alert'])) {
      echo "";
    } elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-alert'></i> Gagal!</strong> Terjadi kesalahan.
          </div>";
    } elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data Jadwal Mengajar berhasil disimpan.
          </div>";
    } elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data Jadwal Mengajar berhasil diubah.
          </div>";
    } elseif ($_GET['alert'] == 4) {
      echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data Jadwal Mengajar berhasil dihapus.
          </div>";
    }
    ?>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Data Jadwal Mengajar</h3>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Guru</th>
                <th>Mapel</th>
                <th>Kelas</th>
                <th>Ruangan</th>
                <th>Hari</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Aksi</th>
              </tr>
            </thead>

            <tbody>
              <?php
              /* Pagination */
              $batas = 5;

              if (isset($cari)) {
                $jumlah_record = mysqli_query($db, "SELECT * FROM tbl_ajar
                                                    WHERE nama_guru LIKE '%$cari%'")
                  or die('Ada kesalahan pada query jumlah_record: ' . mysqli_error($db));
              } else {
                $jumlah_record = mysqli_query($db, "SELECT * FROM tbl_ajar")
                  or die('Ada kesalahan pada query jumlah_record: ' . mysqli_error($db));
              }

              $jumlah  = mysqli_num_rows($jumlah_record);
              $halaman = ceil($jumlah / $batas);
              $page    = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
              $mulai   = ($page - 1) * $batas;
              /*-------------------------------------------------------------------*/
              $no = 1;
              if (isset($cari)) {
                $query = mysqli_query($db, "SELECT * FROM tbl_ajar
                                            WHERE nama_guru LIKE '%$cari%' 
                                            ORDER BY id DESC LIMIT $mulai, $batas")
                  or die('Ada kesalahan pada query siswa: ' . mysqli_error($db));
              } else {
                $query = mysqli_query($db, "SELECT * FROM tbl_ajar
                                            ORDER BY id DESC LIMIT $mulai, $batas")
                  or die('Ada kesalahan pada query siswa: ' . mysqli_error($db));
              }

              while ($data = mysqli_fetch_assoc($query)) {
                echo "  <tr>
                      <td width='10'>$no</td>
                      <td width='150'>$data[nama_guru]</td>
                      <td width='80'>$data[mapel]</td>
                      <td width='80'>$data[kelas]</td>
                      <td width='80'>$data[ruangan]</td>
                      <td width='80'>$data[hari]</td>
                      <td width='80'>$data[jam_mulai]</td>
                      <td width='80'>$data[jam_selesai]</td>
                      <td width='80'>
                        <div class=''>
                          <a data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' class='btn btn-info btn-sm' href='?page=ubah&id=$data[id]'>
                            <i class='glyphicon glyphicon-edit'></i>
                          </a>";
              ?>
                <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="proses-hapus.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Anda yakin ingin menghapus data ?');">
                  <i class="glyphicon glyphicon-trash"></i>
                </a>
              <?php
                echo "
                        </div>
                      </td>
                    </tr>";
                $no++;
              }
              ?>
            </tbody>
          </table>
          <?php
          if (empty($_GET['hal'])) {
            $halaman_aktif = '1';
          } else {
            $halaman_aktif = $_GET['hal'];
          }
          ?>

          <a>
            Halaman <?php echo $halaman_aktif; ?> dari <?php echo $halaman; ?> |
            Total <?php echo $jumlah; ?> data
          </a>

          <nav>
            <ul class="pagination pull-right">
              <!-- Button untuk halaman sebelumnya -->
              <?php
              if ($halaman_aktif <= '1') { ?>
                <li class="disabled">
                  <a href="" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
              <?php
              } else { ?>
                <li>
                  <a href="?hal=<?php echo $page - 1 ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
              <?php
              }
              ?>

              <!-- Link halaman 1 2 3 ... -->
              <?php
              for ($x = 1; $x <= $halaman; $x++) { ?>
                <li class="">
                  <a href="?hal=<?php echo $x ?>"><?php echo $x ?></a>
                </li>
              <?php
              }
              ?>

              <!-- Button untuk halaman selanjutnya -->
              <?php
              if ($halaman_aktif >= $halaman) { ?>
                <li class="disabled">
                  <a href="" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              <?php
              } else { ?>
                <li>
                  <a href="?hal=<?php echo $page + 1 ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              <?php
              }
              ?>
            </ul>
          </nav>
        </div>
      </div>
    </div> <!-- /.panel -->
  </div> <!-- /.col -->
</div> <!-- /.row -->