<div class="row">
  <div class="col-md-12">
    <div class="page-header">
      <h4>
        <i class="glyphicon glyphicon-edit"></i>
        Input Data Jadwal Mengajar
      </h4>
    </div> <!-- /.page-header -->

    <div class="panel panel-default">
      <div class="panel-body">
        <form class="form-horizontal" method="POST" action="proses-simpan.php">
          <div class="form-group">
            <label class="col-sm-2 control-label">Nama Guru</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="nama_guru" autocomplete="off" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Mapel</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="mapel" autocomplete="off" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Kelas</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="kelas" autocomplete="off" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Ruangan</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="ruangan" autocomplete="off" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Hari</label>
            <div class="col-sm-3">
              <select class="form-control" name="hari" placeholder="Pilih Hari" required>
                <option value="">-- Pilih --</option>
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
                <option value="Sabtu">Sabtu</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Jam Mulai</label>
            <div class="col-sm-3">
              <input type="time" class="form-control" name="jam_mulai" autocomplete="off" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Jam Selesai</label>
            <div class="col-sm-3">
              <input type="time" class="form-control" name="jam_selesai" autocomplete="off" required>
            </div>
          </div>
          <hr />
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="submit" class="btn btn-info btn-submit" name="simpan" value="Simpan">
              <a href="index.php" class="btn btn-default btn-reset">Batal</a>
            </div>
          </div>
      </div>
      </form>
    </div> <!-- /.panel-body -->
  </div> <!-- /.panel -->
</div> <!-- /.col -->
</div> <!-- /.row -->