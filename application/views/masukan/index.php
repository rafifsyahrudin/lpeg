<!-- ==============================================
Konten (isi)
=============================================== -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Masukan Data
    </h1>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <!-- Pesan Singkat -->
        <?= $this->session->flashdata('pesan') ?>
      </div>
    </div>

    <div id="container_laporan" class="row box box-primary" style="padding: 1.5rem;">
      <form id="card_laporan" class="col-md-12">
        <div class="panel panel-default">
          <div class="box-header box-solid with-border bg-gray">
            <h3 class="box-title">Laporan</h3>
          </div>
          <div class="form-horizontal">
            <input type="hidden" name="nip" value="<?= $this->session->user; ?>">
            <div class="box-body">
              <div class="form-group">
                <label for="kegiatan" class="col-sm-2 control-label">Kegiatan</label>
                <div class="col-sm-10">
                  <input name="kegiatan" type="text" class="form-control" id="kegiatan" placeholder="Masukan Kegiatan.." required>
                  <?= form_error('kegiatan', '<small class="text-danger">', '</small>') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="tanggal" class="col-sm-2 control-label">Tanggal</label>
                <div class="col-sm-2">
                  <input name="tanggal" type="date" class="form-control" id="tanggal" required>
                  <?= form_error('tanggal', '<small class="text-danger">', '</small>') ?>
                </div>
                <label for="jammulai" class="col-sm-2 control-label">Jam Mulai</label>
                <div class="col-sm-2">
                  <input name="jam_mulai" type="time" class="form-control" id="jammulai" required>
                  <?= form_error('jam_mulai', '<small class="text-danger">', '</small>') ?>
                </div>

                <label for="jamselesai" class="col-sm-2 control-label">Jam Selesai</label>
                <div class="col-sm-2">
                  <input name="jam_selesai" type="time" class="form-control" id="jamselesai" required>
                  <?= form_error('jam_selesai', '<small class="text-danger">', '</small>') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="satuankegiatan" class="col-sm-2 control-label">Satuan Kegiatan</label>
                <div class="col-sm-4">
                  <input name="satuan_kegiatan" type="text" class="form-control" id="satuankegiatan" placeholder="Masukan Satuan Kegiatan.." required>
                  <?= form_error('satuan_kegiatan', '<small class="text-danger">', '</small>') ?>
                </div>

                <label for="jumlahsatuan" class="col-sm-2 control-label">Jumlah Satuan</label>
                <div class="col-sm-4">
                  <input name="jumlah_satuan" type="number" class="form-control" id="jumlahsatuan" placeholder="Masukan Jumlah Satuan.." required>
                  <?= form_error('jumlah_satuan', '<small class="text-danger">', '</small>') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="tempat" class="col-sm-2 control-label">Tempat Kegiatan</label>
                <div class="col-sm-10">
                  <input name="tempat_kegiatan" type="text" class="form-control" id="tempat" placeholder="Tempat Kegiatan.." required>
                  <?= form_error('tempat_kegiatan', '<small class="text-danger">', '</small>') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="penyelenggara" class="col-sm-2 control-label">Penyelenggara</label>
                <div class="col-sm-10">
                  <input name="penyelenggara" type="text" class="form-control" id="penyelenggara" placeholder="Penyelenggara Kegiatan.." required>
                  <?= form_error('penyelenggara', '<small class="text-danger">', '</small>') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="keterangan" class="col-sm-2 control-label">Keterangan</label>
                <div class="col-sm-10">
                  <textarea name="keterangan" class="form-control" rows="3" id="keterangan" placeholder="Keterangan.." required></textarea>
                  <?= form_error('keterangan', '<small class="text-danger">', '</small>') ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-6">
            <button id="btn_tambah_laporan" type="button" class="btn btn-primary" onclick="tambahLaporanLainnya()">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Laporan Lainnya
            </button>
          </div>
          <div class="col-md-6" style="display: flex;">
            <button id="btn_tambah_laporan" type="button" class="btn btn-success" onclick="simpanLaporan()" style="margin-left: auto;">
              <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Simpan
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script>
    function tambahLaporanLainnya() {
      const cardLaporan = document.querySelectorAll("#card_laporan")[0]
      const containerLaporan = document.querySelector("#container_laporan")
      containerLaporan.insertBefore(cardLaporan.cloneNode(true), containerLaporan.lastElementChild)
    }

    function simpanLaporan() {
      const listLaporan = $("form#card_laporan").toArray().map(function(v) {
        return $(v).serializeArray().reduce((acc, cur) => {
          acc[cur.name] = cur.value
          return acc
        }, {})
      })

      console.log(listLaporan)

      $.ajax({
        url: 'buat_laporan_bulanan',
        method: 'POST',
        data: listLaporan,
        success: function() {
          console.log("ok")
        }
      })
    }
  </script>
</div>