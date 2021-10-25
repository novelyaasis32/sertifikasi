<!-- Main content -->
<div class="content-wrapper">
  <!-- Content area -->
  <div class="content" style="background-color: #EEC4C4">
    <?php
    echo $this->session->flashdata('msg');
    ?>
    <!-- Dashboard content -->
    <div class="row" style="background-color: #EEC4C4">
      <!-- Basic datatable -->
      <div class="panel panel-flat" >
        <div class="panel-heading">
          <h5 class="panel-title"></i> Arsip Surat</h5>
          <h7 class="panel-title"></i>   </h7>
          <h7 class="panel-title"></i> Berikut ini adalah surat-surat yang telah dibuat yang telah terbit dan diarsipkan</h7>
          <h7 class="panel-title"></i> Klik "Lihat" pada kolom aksi untuk menampilkan surat</h7>
          
          <!-- <hr style="margin:0px;"> -->
          <div class="heading-elements">
            <ul class="icons-list">
              <li><a data-action="collapse"></a></li>
            </ul>
          </div>

                <?php
                if ($user->row()->level == 'user') { ?>
                    <br>
                    <a href="users/sk/t" class="btn btn-primary"></i> Arsipkan Surat</a>
                <?php
                } ?>
        </div>

        <table class="table datatable-basic" width="100%">
          <thead>
            <tr>
              <th width="30px;">No.</th>
              <th>Nomor Surat</th>
              <th>Waktu Pengarsipan</th>
              <th>Pengirim</th>
              <th>Kategori</th>              
              <th>Keterangan</th>
              <th class="text-center" width="170"></th>
            </tr>
          </thead>
          <tbody>
              <?php
              $no = 1;
              foreach ($sk->result() as $baris) {
              ?>
                <tr <?php if($baris->peringatan == 1){echo 'style="background:yellow;"';} ?>>
                  <td><?php echo $no.'.'; ?></td>
                  <td><?php echo $baris->no_surat; ?></td>
                  <td><?php echo $baris->tgl_ns; ?></td>
                  <td><?php echo $baris->nama_lengkap; ?></td>
                  <td><?php echo $baris->perihal; ?></td>
                  
                  <td><?php
                      //   if ($baris->disposisi != '') {?>
                       <button type="button" class=surat><i class=Surat></i></button>
                     <?php
                      //   }?>
                  </td>
                  <td>
                    <a href="users/sk/d/<?php echo $baris->id_sk; ?>" class="btn btn-default btn-xs"><i class=lihat>Lihat>></i></a>
                   
                    <?php
                    if ($user->row()->level == 'user') { ?>
                    <a href="users/sk/e/<?php echo $baris->id_sk; ?>" class="btn btn-success btn-xs"><i class=Unduh>Unduh</i></a>
                    <a href="users/sk/h/<?php echo $baris->id_sk; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda yakin?')"><i class="icon-trash"></i></a>
                    <?php
                    } ?>
                  </td>
                </tr>
              <?php
              $no++;
              } ?>
          </tbody>
        </table>
      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->
