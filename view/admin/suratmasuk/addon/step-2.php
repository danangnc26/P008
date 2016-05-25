<script src="<?php echo base_url.'assets/plugin/scan/scanner.js' ?>" type="text/javascript"></script>
<script>
        //
        // Please read scanner.js developer's guide at: http://asprise.com/document-scan-upload-image-browser/ie-chrome-firefox-scanner-docs.html
        //
        /** Scan: output PDF original and JPG thumbnails */

        function nm_fl_scn(){
        	// var name_file = "Doc_" + makeid();	
        	return "SCAN_" + makeid();
        }
        var neme = nm_fl_scn();
        
        function scanToPDf() {
            asprise_scanner_js_scan(displayResponseOnPage,
                    {
                        "output_settings": [
                            {
                                "type": "save",
                                "format": "pdf",
                                // "pdf_text_line": "By ${USERNAME} on ${DATETIME}",
                                "save_path": "${TMP}\\tmp_${TMS}${EXT}"
                            }
                        ]
                    }
            );
        }

        var o3 = 1;
      	function displayResponseOnPage(successful, mesg, response) {
      	   no3 = (i++);
		   // document.getElementById('server_response').innerHTML = getSaveResponse(response);
		   var nm = getSaveResponse(response);
		   var nm2 = nm.split("\\");
		   var nm3 = nm2[nm2.length - 1];
		   var nf  = nm3.replace('"]', '');
		   console.log(nf);

		   var dz = "'.sc_lm_"+no3+"'";
		   // var dv
		   var tz = "<li class='sc_lm_"+no3+"'><a href='#'><i class='fa  fa-paperclip'></i>" +nf.replace("tmp_", "doc_");
           var tf = '<input type="hidden" name="file_scan[]" value="'+nf+'">';
           var nd = '</a> <i style="margin-left:20px; cursor:pointer" onclick="$('+dz+').remove()" class="fa fa-close"></i></li>';
           $('.thmb').append(tz+tf+nd);
		   $('ol.txt_lampiran').append(tz+nd);
		}
   //      /** Processes the scan result */
   //      function displayImagesOnPage(successful, mesg, response) {
   //          if(!successful) { // On error
   //              console.error('Failed: ' + mesg);
   //              return;
   //          }
   //          if(successful && mesg != null && mesg.toLowerCase().indexOf('user cancel') >= 0) { // User cancelled.
   //              console.info('User cancelled');
   //              return;
   //          }
   //          var scannedImages = getScannedImages(response, true, false); // returns an array of ScannedImage
   //          for(var i = 0; (scannedImages instanceof Array) && i < scannedImages.length; i++) {
   //              var scannedImage = scannedImages[i];
   //              processOriginal(scannedImage);
   //          }
   //          var thumbnails = getScannedImages(response, false, true); // returns an array of ScannedImage
   //          for(var i = 0; (thumbnails instanceof Array) && i < thumbnails.length; i++) {
   //              var thumbnail = thumbnails[i];
   //              processThumbnail(thumbnail);
   //          }
   //      }
   //      /** Images scanned so far. */
   //      var imagesScanned = [];
   //      /** Processes an original */
   //      function processOriginal(scannedImage) {
   //          imagesScanned.push(scannedImage);
   //      }
   //      /** Processes a thumbnail */
   //      function processThumbnail(scannedImage) {
   //          // var elementImg = createDomElementFromModel( {
   //          //     'name': 'img',
   //          //     'attributes': {
   //          //         'class': 'scanned',
   //          //         'src': scannedImage.src
   //          //     }
   //          // });
   //          // document.getElementById('images').appendChild(elementImg);
   //          var tz = '<a href="#"><li><i class="fa  fa-paperclip"></i> ' +neme+ '.pdf';
   //          var tf = '<input type="hidden" name="file_scan[]" value="'+neme+'.pdf">';
   //          var nd = '</li></a>';
   //          $('.thmb').append(tz+tf+nd);
			// $('ol.txt_lampiran').append(tz+nd);


   //      }

    </script>
   
    <style>
        img.scanned {
            height: 200px; /** Sets the display size */
            margin-right: 12px;
        }

        div#images {
            margin-top: 20px;
        }
    </style>


<div class="col-md-6">
			<table id="form" width="100%">
					<tr>
						<td width="30%">
							No. Agenda
						</td>
						<td width="2%">:</td>
						<td id="text-no_agenda">
							
						</td>
					</tr>
					<tr>
						<td>
							No. Surat Masuk
						</td>
						<td>:</td>
						<td id="text-no_surat_masuk">
							
						</td>
					</tr>
					<tr>
						<td>
							Nama / Bag. Pengirim
						</td>
						<td>:</td>
						<td id="text-nama_pengirim">
							
						</td>
					</tr>
					<tr>
						<td>
							Perihal
						</td>
						<td>:</td>
						<td id="text-perihal">
							
						</td>
					</tr>
					<tr>
						<td>
							Sifat Surat
						</td>
						<td>:</td>
						<td id="text-sifat_surat">
							
						</td>
					</tr>
					<tr>
						<td>
							Tanggal Diterima
						</td>
						<td>:</td>
						<td id="text-tanggal_diterima">
							
						</td>
					</tr>
					<tr>
						<td style="vertical-align:top">
							Isi Ringkas
						</td>
						<td style="vertical-align:top">:</td>
						<td style="vertical-align:top" id="text-isi_ringkas">
							
						</td>
					</tr>
					<tr>
						<td colspan="2"></td>
						<td>
							
						</td>
					</tr>
				</table>
		</div>
		<div class="col-md-6">
			<h4>Lampiran Surat Masuk</h4>
			<div class="row">
				<div class="col-md-4">
					<label style="font-weight:normal">
						<input type="radio" name="lampiran_surat_masuk" value="upload"> Upload Dokumen
					</label>
				</div>
				<div class="col-md-3">
					<label style="font-weight:normal">
						<input type="radio" name="lampiran_surat_masuk" value="scan"> Scan Dokumen
					</label>
				</div>
			</div>

			<div style="display:none" class="cont_upload">
				<h5><b>Upload Dokumen</b></h5>
				<button type="button" class="btn btn-primary tambah_lampiran"><i class="fa fa-plus"></i> Tambahkan Lampiran</button>
				<!-- <input class="upload_lampiran" type="file" name="tmp_file[]" multiple /> --><br>
				<small>Silahkan upload dokumen dengan ekstensi .pdf</small>
				<br><br>
				<div class="file_lampiran col-md-8"></div>
			</div>
			<div style="display:none" class="cont_scan">
				<h5><b>Scan Dokumen</b></h5>
				<button class="btn btn-primary" type="button" onclick="scanToPDf();"><i class="fa fa-search"></i> Scan Dokumen</button>
				<!-- <button class="btn btn-default" type="button" onclick="$('#scan-res').show()"><i class="fa fa-eye"></i> Tampilkan Hasil Scan</button> -->
				<br><br>
				<div class="row">
					<!-- <div class="col-md-3" style="">
						<i class="fa fa-file-pdf-o" style="font-size:5em"></i>
						<br>
						<small>Dokumen_001.pdf</small>
					</div> -->
					<div class="col-md-8" style="">
						 <ol class="thmb"></ol>
						 <!-- <div id="images"></div> -->
					</div>
					<div id="server_response"></div>
				</div>
			</div>

		</div>
		<script type="text/javascript">
			$('input[name=lampiran_surat_masuk]').change(function(){
				if($('input[name=lampiran_surat_masuk]:checked').val() == 'upload'){
					$('.cont_upload').show();
					$('.cont_scan').hide();
				}
				if($('input[name=lampiran_surat_masuk]:checked').val() == 'scan'){
					$('.cont_upload').hide();
					$('.cont_scan').show();
				}
			});
			
			var i = 1;
			var no;
			$('.tambah_lampiran').click(function(){
				no = (i++);
				var cls_rmv = "'dv_lm_"+no+"'";
				var cv = "'.dv_lm_"+no+"'";
				$('.file_lampiran').append($("<div style='border-bottom:1px solid #ddd; margin-top:10px' class='dv_lm_"+no+"'>").append($('<button style="padding:0.2em;" onclick="$('+cv+').remove()" type="button" class="btn btn-danger pull-right tst"><i class="fa fa-close"></i></button>'), $("<input/>", {
				name: 'file_upload[]',
				type: 'file',
				id: 'file_upload_'+no,
				class : 'file_u_'+no,
				onchange : 'gt_fl('+no+')'
				}), $("<br/>")));
			});

			$('input.file_u_1').change(function(){
				alert('asdf');
				// var fl = $('.file_u').val().split("\\");
				// // console.log($('.upload_lampiran')[0].files);
				// var tx = '<li>' +fl[2]+ '</li>';
				// $('ol.txt_lampiran').append(tx);
			});

			function gt_fl(no)
			{
				var fl = $('.file_u_'+no).val().split("\\");
				// console.log($('.upload_lampiran')[0].files);
				var tx = '<a href="#"><li><i class="fa  fa-paperclip"></i> ' +fl[2]+ '</li></a>';
				$('ol.txt_lampiran').append(tx);
			}

		</script>