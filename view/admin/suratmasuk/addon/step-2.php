<script src="<?php echo base_url.'assets/plugin/scan/scanner.js' ?>" type="text/javascript"></script>
<script>
        //
        // Please read scanner.js developer's guide at: http://asprise.com/document-scan-upload-image-browser/ie-chrome-firefox-scanner-docs.html
        //
        /** Scan: output PDF original and JPG thumbnails */
        var name_file = "Doc_" + makeid();
        function scanToPdfWithThumbnails() {
            asprise_scanner_js_scan(displayImagesOnPage,
                    {
                        "output_settings": [
                            {
                                "type": "save",
                                "format": "pdf",
                                // "pdf_text_line": "By ${USERNAME} on ${DATETIME}",
                                "save_path": "${TMP}\\"+name_file+"${EXT}"
                            },
                            {
                                "type": "return-base64-thumbnail",
                                "format": "jpg",
                                "thumbnail_height": 200
                            }
                        ]
                    }
            );
        }
        /** Processes the scan result */
        function displayImagesOnPage(successful, mesg, response) {
            if(!successful) { // On error
                console.error('Failed: ' + mesg);
                return;
            }
            if(successful && mesg != null && mesg.toLowerCase().indexOf('user cancel') >= 0) { // User cancelled.
                console.info('User cancelled');
                return;
            }
            var scannedImages = getScannedImages(response, true, false); // returns an array of ScannedImage
            for(var i = 0; (scannedImages instanceof Array) && i < scannedImages.length; i++) {
                var scannedImage = scannedImages[i];
                processOriginal(scannedImage);
            }
            var thumbnails = getScannedImages(response, false, true); // returns an array of ScannedImage
            for(var i = 0; (thumbnails instanceof Array) && i < thumbnails.length; i++) {
                var thumbnail = thumbnails[i];
                processThumbnail(thumbnail);
            }
        }
        /** Images scanned so far. */
        var imagesScanned = [];
        /** Processes an original */
        function processOriginal(scannedImage) {
            imagesScanned.push(scannedImage);
        }
        /** Processes a thumbnail */
        function processThumbnail(scannedImage) {
            // var elementImg = createDomElementFromModel( {
            //     'name': 'img',
            //     'attributes': {
            //         'class': 'scanned',
            //         'src': scannedImage.src
            //     }
            // });
            // document.getElementById('images').appendChild(elementImg);
            $('.thmb').append(name_file+'.pdf');
        }
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
						<td>
							Isi Ringkas
						</td>
						<td>:</td>
						<td id="text-isi_ringkas">
							
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
			<h4>Upload Dokumen</h4>
			<input type="file" />
			<h4>Scan Dokumen</h4>
				<button class="btn btn-default" type="button" onclick="scanToPdfWithThumbnails($('#text-no_agenda').text());"><i class="fa fa-search"></i> Scan Dokumen</button>
				<!-- <button class="btn btn-default" type="button" onclick="$('#scan-res').show()"><i class="fa fa-eye"></i> Tampilkan Hasil Scan</button> -->
				<br><br>
				<div class="row">
					<!-- <div class="col-md-3" style="">
						<i class="fa fa-file-pdf-o" style="font-size:5em"></i>
						<br>
						<small>Dokumen_001.pdf</small>
					</div> -->
					<div class="col-md-3" style="">
						 <div class="thmb"></div>
						 <!-- <div id="images"></div> -->
					</div>
					<div id="server_response"></div>
				</div>
				<!-- <div id="scan-res" style="display:none"> -->
							<!-- <div id="images"></div> -->
							<!-- demo content -->
							<!-- <div id="content-1" class="thumb">
								<ul class="img-cont">
									<li><a href="#"><img style="border:1px solid #000" width="80" src="assets/img/scan.jpg" /></a></li>
									<li><a href="#"><img style="border:1px solid #000" width="80" src="assets/img/scan.jpg" /></a></li>
									<li><a href="#"><img style="border:1px solid #000" width="80" src="assets/img/scan.jpg" /></a></li>
									<li><a href="#"><img style="border:1px solid #000" width="80" src="assets/img/scan.jpg" /></a></li>
									<li><a href="#"><img style="border:1px solid #000" width="80" src="assets/img/scan.jpg" /></a></li>
									<li><a href="#"><img style="border:1px solid #000" width="80" src="assets/img/scan.jpg" /></a></li>
									<li><a href="#"><img style="border:1px solid #000" width="80" src="assets/img/scan.jpg" /></a></li>
									<li><a href="#"><img style="border:1px solid #000" width="80" src="assets/img/scan.jpg" /></a></li>
									<li><a href="#"><img style="border:1px solid #000" width="80" src="assets/img/scan.jpg" /></a></li>
									
								</ul>
							</div> -->
				<!-- </div> -->

		</div>
