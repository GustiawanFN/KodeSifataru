<div id="wrapper">
  <div id="main-content">
    <div class="container-fluid">
      <div class="block-header">
        <div class="row">
          <div class="col-lg-5 col-md-8 col-sm-12">
            <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Generate Kode Sifataru</h2>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
              <li class="breadcrumb-item">Generate</li>
              <li class="breadcrumb-item active">Kode Sifataru</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="row clearfix">
        <div class="col-lg-12">
          <div class="card">
            <div class="header">
              <h2></h2>
            </div>
            <div class="body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>


                      <th>ID</th>
                      <th>Kode Sifataru</th>
                      <th>Tahun</th>

                      <!-- <th>ProyekPrioritasNasionalId</th>
                      <th>CodeProyek</th>

                      <th>KegiatanPrioritasId</th>
                      <th>CodeKegiatan</th>

                      <th>ProgramPrioritasId</th>
                      <th>CodeProgram</th>

                      <th>PrioritasNasionalId</th>
                      <th>CodePrioritas</th> -->

                      <th>Action</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($kode as $key => $value) { ?>

                      <tr>
                        <td><?php echo $value->Id ?></td>
                        <td><?php echo $value->KodeSifataru ?></td>

                        <td><?php echo $value->Tahun ?></td>

                        <!-- <td><?php echo $value->ProyekPrioritasNasionalId ?></td>
                      <td><?php echo $value->CodeProyek ?></td>
                      
                      <td><?php echo $value->KegiatanPrioritasId ?></td>
                      <td><?php echo $value->CodeKegiatan ?></td>

                      <td><?php echo $value->ProgramPrioritasId ?></td>
                      <td><?php echo $value->CodeProgram ?></td>

                      <td><?php echo $value->PrioritasNasionalId ?></td>
                      <td><?php echo $value->CodePrioritas ?></td> -->

                        <td><a href='<?php echo base_url(); ?>index.php/generate/generate_kode/<?php echo $value->Id ?>' class='btn btn-primary'>Generate</a></td>


                      </tr>

                    <?php } ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>