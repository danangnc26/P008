			<script type="text/javascript">
			checked=false;
			function checkedAll (srt1) {var aa= document.getElementById('srt1'); if (checked == false)
			{
				checked = true
			}
			else
			{
				checked = false
			}for (var i =0; i < aa.elements.length; i++){ aa.elements[i].checked = checked;}
			}
			</script>
			<div class="col-md-12">
				<div class="pull-right">
					<?php include "view/component/notif.php" ?>
				</div>
				<h3>Agenda Surat Masuk</h3>
				<hr class="two"></hr>
			</div>
			<div class="col-md-12">
				<form id ="srt1" action="<?php echo app_base.'delete_suratmasuk' ?>" method="post">
	            <!-- <button class="btn btn-primary"><i class="icon ion-android-create"></i>Ubah Data</button> -->
				<button onclick="return confirm('Hapus data yang dipilih?')" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus Data</button>
				<button class="btn btn-default"><i class="fa fa-refresh"></i> Refresh Tabel</button>
				<br><br>
				<table id="data" class="table table-bordered table-striped">
	                    <thead>
	                      <tr>
	                      	<th align="center"><input type="checkbox" name="checkall" id="parcheck" onclick="checkedAll(srt1);"></th>
	                      	<th>No. Agenda</th>
	                        <th>Tgl. Diterima</th>
	                        <th>No. Surat Masuk</th>
	                        <th>Sifat Surat</th>
	                        <th>Perihal</th>
	                        <th>Status</th>
	                      </tr>
	                    </thead>
	                    <tbody>
	                    <?php
	                    if($data == null){

	                    }else{
	                    foreach ($data as $key => $value) {
	                    ?>
	                      <tr>
	                      	<td><input type="checkbox" name="chk[]" id="chk" value="<?php echo $value['id_surat_masuk']?>"></td>
	                      	<td><?php echo $value['no_agenda'] ?></td>
	                        <td><?php echo Lib::dateInd($value['tanggal_diterima'], true) ?></td>
	                        <td><?php echo $value['no_surat_masuk'] ?></td>
	                        <td><?php echo $value['sifat_surat'] ?></td>
	                        <td><?php echo $value['perihal']; ?></td>
	                        <td>
	                        	<?php echo ($value['status'] == '1') ? '<div class="lbl success">Selesai</div>' : '<div class="lbl warning">Proses</div>' ?>
	                        </td>
	                      </tr>
	                      <?php
	                  		}}
	                      ?>
	                    </tbody>
	            </table>
	            </form>
			</div>
<script type="text/javascript">
      $(document).ready(function(){
        $("#data").dataTable({
        	"aoColumns": [
		      { "bSortable": false, "width" : "2%", "align" : "center" },
		      null,
		      null,
		      null,
		      null,
		      null,
		      null
        	],
        	"order" : [1, "asc"],
        	// "lengthMenu": [[10,50,100,-1],[10,50,100,"All"]],
    	});
      });
</script>
<!-- "sPaginationType": "full_numbers",
                    "bProcessing": false,
                    "aoColumns": [{"width":"25%"},{"bSortable":false},{"width":"25%"},{"bSortable":false,"width":"8%"}],
                    "order": [[0,"asc"]],
                    "lengthMenu": [[10,50,100,-1],[10,50,100,"All"]],
                    "sAjaxSource": "http:\/\/simpsdkp.dev\/admin\/kapal_pengawas\/semua_kapal\/api",
                    "bServerSide": true,
        
                    "fnDrawCallback": function ( oSettings ) {
					cst_tooltip();
					$(".ubah-kapal-pengawas, .posisi-kapal-pengawas").magnificPopup({
					  type: "ajax"
					});
				}, -->