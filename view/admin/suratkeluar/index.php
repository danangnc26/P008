			<div class="col-md-12">
				<div class="pull-right">
					<?php include "view/component/notif.php" ?>
				</div>
				<h3>Agenda Surat Keluar</h3>
				<hr class="two"></hr>
			</div>
			<div class="col-md-12">
				<button class="btn btn-default"><i class="fa fa-refresh"></i> Refresh Tabel</button>
				<br><br>
				<table id="data" class="table table-bordered table-striped">
	                    <thead>
	                      <tr>
	                      	<th>No. Agenda</th>
	                        <th>Tgl. Diterima</th>
	                        <th>No. Surat Masuk</th>
	                        <th>Sifat Surat</th>
	                        <th>Perihal</th>
	                        <th>Status</th>
	                        <th width="60">Aksi</th>
	                      </tr>
	                    </thead>
	                    <tbody>
	                    <?php
	                    if($data == null){

	                    }else{
	                    foreach ($data as $key => $value) {
	                    ?>
	                      <tr>
	                      	<td><?php echo $value['no_agenda'] ?></td>
	                        <td><?php echo Lib::dateInd($value['tanggal_diterima'], true) ?></td>
	                        <td><?php echo $value['no_surat_masuk'] ?></td>
	                        <td><?php echo $value['sifat_surat'] ?></td>
	                        <td><?php echo $value['perihal']; ?></td>
	                        <td>
	                        	<?php echo ($value['status'] == '1') ? '<div class="lbl success">Selesai</div>' : '<div class="lbl warning">Proses</div>' ?>
	                        </td>
	                        <td>
	                        	<a href="<?php echo app_base.'detail_suratkeluar&id_surat='.$value['id_surat_masuk'] ?>">
	                        		<button class="btn btn-primary" style="padding:0.2em 1em 0.2em 1em; font-size:1.1em">
		                        		<i class="fa fa-eye"></i> 
		                        		Detail
		                        	</button>
	                        	</a>
	                        </td>
	                      </tr>
	                      <?php
	                  		}}
	                      ?>
	                    </tbody>
	            </table>
			</div>
<script type="text/javascript">
      $(document).ready(function(){
        $("#data").dataTable({
        	"aoColumns": [
		      null,
		      null,
		      null,
		      null,
		      null,
		      null,
		      { "bSortable": false}
        	],
        	"order" : [0, "asc"],
        	// "lengthMenu": [[10,50,100,-1],[10,50,100,"All"]],
    	});
      });
</script>