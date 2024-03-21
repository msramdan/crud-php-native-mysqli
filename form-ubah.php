<div class="row">
  <div class="col-md-12">
    <div class="page-header">
      <h4>
        <i class="glyphicon glyphicon-edit"></i>
        Ubah Data Jadwal Mengajar
      </h4>
    </div> <!-- /.page-header -->
    <?php
    if (isset($_GET['id'])) {
      $id   = $_GET['id'];
      $query = mysqli_query($db, "SELECT * FROM tbl_ajar WHERE id='$id'") or die('Query Error : ' . mysqli_error($db));
      while ($data  = mysqli_fetch_assoc($query)) {
        $nama_guru          = $data['nama_guru'];
        $mapel  = $data['mapel'];
        $kelas = $data['kelas'];
        $ruangan         = $data['ruangan'];
        $hari        = $data['hari'];
        $jam_mulai    = $data['jam_mulai'];
        $jam_selesai    = $data['jam_selesai'];
      }
    }
    ?>
    <div class="panel panel-default">
      <div class="panel-body">
        <form class="form-horizontal" method="POST" action="proses-ubah.php">

          <div class="form-group">
            <label class="col-sm-2 control-label">Nama Guru</label>
            <div class="col-sm-3">
              <input type="hidden" readonly class="form-control" name="id" value="<?php echo $id; ?>" required>
              <input type="text" class="form-control" name="nama_guru" value="<?php echo $nama_guru; ?>" autocomplete="off" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Mapel</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="mapel" value="<?php echo $mapel; ?>" autocomplete="off" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Kelas</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="kelas" value="<?php echo $kelas; ?>" autocomplete="off" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Ruangan</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="ruangan" value="<?php echo $ruangan; ?>" autocomplete="off" required>
            </div>
          </div>


          <div class="form-group">
            <label class="col-sm-2 control-label">Hari</label>
            <div class="col-sm-3">
              <select class="form-control" name="hari" placeholder="Pilih Hari" required>
                <option value="">-- Pilih --</option>
                <option value="Senin" <?php echo ($hari == 'Senin') ? 'selected' : ''; ?>>Senin</option>
                <option value="Selasa" <?php echo ($hari == 'Selasa') ? 'selected' : ''; ?>>Selasa</option>
                <option value="Rabu" <?php echo ($hari == 'Rabu') ? 'selected' : ''; ?>>Rabu</option>
                <option value="Kamis" <?php echo ($hari == 'Kamis') ? 'selected' : ''; ?>>Kamis</option>
                <option value="Jumat" <?php echo ($hari == 'Jumat') ? 'selected' : ''; ?>>Jumat</option>
                <option value="Sabtu" <?php echo ($hari == 'Sabtu') ? 'selected' : ''; ?>>Sabtu</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Jam Mulai</label>
            <div class="col-sm-3">
              <input type="time" class="form-control" name="jam_mulai" value="<?php echo $jam_mulai; ?>" autocomplete="off" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Jam Selesai</label>
            <div class="col-sm-3">
              <input type="time" class="form-control" name="jam_selesai" value="<?php echo $jam_selesai; ?>" autocomplete="off" required>
            </div>
          </div>
          <hr />
          <hr />
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="submit" class="btn btn-info btn-submit" name="simpan" value="Simpan">
              <a href="index.php" class="btn btn-default btn-reset">Batal</a>
            </div>
          </div>
        </form>
      </div> <!-- /.panel-body -->
    </div> <!-- /.panel -->
  </div> <!-- /.col -->
</div> <!-- /.row -->