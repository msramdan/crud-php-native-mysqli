<?php 
date_default_timezone_set('Asia/Jakarta');
$nama_hari = array(
    'Minggu',
    'Senin',
    'Selasa',
    'Rabu',
    'Kamis',
    'Jumat',
    'Sabtu'
);
$indeks_hari = date('w');
$today = $nama_hari[$indeks_hari];
?>

<div class="row">
  <div class="col-md-12">
    <div class="page-header">
      <h4>
        <i class="glyphicon glyphicon-user"></i> Data Jadwal Mengajar
      </h4>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Data Jadwal Mengajar</h3>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped table-hover table-xs">
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
              </tr>
            </thead>

            <tbody>
              <?php
              /* Pagination */
              $batas = 100;
              $jumlah_record = mysqli_query($db, "SELECT * FROM tbl_ajar WHERE hari='$today' AND jam_selesai > CURTIME()")
                or die('Ada kesalahan pada query jumlah_record: ' . mysqli_error($db));
              $jumlah  = mysqli_num_rows($jumlah_record);
              $halaman = ceil($jumlah / $batas);
              $page    = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
              $mulai   = ($page - 1) * $batas;
              /*-------------------------------------------------------------------*/
              $no = 1;
              $query = mysqli_query($db, "SELECT * FROM tbl_ajar
                                            WHERE hari='$today'
                                            AND jam_selesai > CURTIME()
                                            ORDER BY id DESC LIMIT $mulai, $batas")
                or die('Ada kesalahan pada query siswa: ' . mysqli_error($db));

              while ($data = mysqli_fetch_assoc($query)) {
                echo "  <tr>
                      <td width='10'>$no</td>
                      <td width='150'>$data[nama_guru]</td>
                      <td width='80'>$data[mapel]</td>
                      <td width='80'>$data[kelas]</td>
                      <td width='80'>$data[ruangan]</td>
                      <td width='80'>$data[hari]</td>
                      <td width='80'>$data[jam_mulai]</td>
                      <td width='80'>$data[jam_selesai]</td>";
              ?>
              <?php
                echo "
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