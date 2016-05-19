			<div class="col-md-12">
				<div class="pull-right">
					<?php include "view/component/notif.php" ?>
				</div>
				<h3>Agenda Disposisi Surat Masuk</h3>
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
	                        <th>Pengirim</th>
	                        <th>Sifat Surat</th>
	                        <th>Perihal</th>
	                        <th>Status</th>
	                        <th width="70">Aksi</th>
	                      </tr>
	                    </thead>
	                    <tbody>
	                    <?php
	                    if($data == null){

	                    }else{
	                    foreach ($data as $key => $value) {
	                    ?>
	                      <tr>
	                      	<td data-label="No. Agenda"><?php echo $value['no_agenda'] ?></td>
	                        <td data-label="Tgl. Diterima"><?php echo Lib::dateInd($value['tanggal_diterima'], true) ?></td>
	                        <td data-label="No. Surat Masuk"><?php echo $value['no_surat_masuk'] ?></td>
	                        <td data-label="Pengirim"><?php echo $value['nama_pengirim'] ?></td>
	                        <td data-label="Sifat Surat"><?php echo $value['sifat_surat'] ?></td>
	                        <td data-label="Perihal"><?php echo $value['perihal']; ?></td>
	                        <td>
	                        	<?php echo ($value['status'] == '1') ? '<div class="lbl success">Selesai</div>' : '<div class="lbl warning">Menunggu</div>' ?>
	                        </td>
	                        <td>
	                        	<a href="<?php echo app_base.'disposisi&id_surat_masuk='.$value['id_surat_masuk'] ?>">
	                        		<?php
	                        		if($value['status'] == '1'){
	                        		?>
	                        		<button class="btn btn-primary" style="padding:0.2em 1em 0.2em 1em; font-size:1.1em">
	                        			<i class="fa fa-send"></i> 
	                        			Revisi
	                        		</button>
	                        		<?php
	                        		}else{
	                        		?>
	                        		<button class="btn btn-primary" style="padding:0.2em 1em 0.2em 1em; font-size:1.1em">
	                        			<i class="fa fa-send"></i> 
	                        			Disposisi
	                        		</button>
	                        		<?php
	                        		}
	                        		?>
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
		      null,
		      { "bSortable": false}
        	],
        	"order" : [0, "asc"],
    	});
      });
</script>