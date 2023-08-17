<style type="text/css">
	 
</style>
<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-body">
				<div class="loading">
					<span class="loader"></span>
					<p class="text-loading"></p>
				</div>
				<div id="my_camera"></div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card">
			<div class="card-body">
				<img class="img-thumbnail img-responsive" id="gambar">
				<input type="hidden" id="url_images">
				<div class="form-group row mt-3">
					<input type="text" id="name" placeholder="Nama Lengkap" class="form-control" autocomplete="off">
				</div>
				<div class="form-group row mt-3">
					<input type="text" id="jabatan" placeholder="Jabatan" class="form-control" autocomplete="off">
				</div>
				<div class="form-group row mt-3">
					<button class="btn btn-default btn-block" id="simpan"><i class="fas fa-save"></i> &nbsp;Simpan </button>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	Webcam.set({
	   width: 620,
	   height: 440,
	   image_format: 'png',
	   jpeg_quality: 100
	});
	var count = 1;
	let url_gambar = "";
	Webcam.attach('#my_camera');
	setTimeout(function() {
		$(".loading").show()
		var persen = setInterval(function() {
			count++
			$(".text-loading").html(count+"%")
			if (count >= 100) {
				$("#my_camera").hide()
				$("#gambar").show()
				clearInterval(persen);
				$(".loading").hide()
				Webcam.unfreeze()
				Webcam.snap( function(data_uri) {
					$("#gambar").attr("src",data_uri)
					$("#url_images").val(data_uri)
				});
				
				$("#simpan").click(function() {
					var url_gambar = $("#url_images").val()
					var name = $("#name").val()
					var jabatan = $("#jabatan").val()
					if (name == "") {
						toastr.error('Nama Lengkap tidak boleh kosong')
					}else if (jabatan == "") {
						toastr.error('Jabatan tidak boleh kosong')
					}else{
						var settings = {
							"url": "<?=base_url('api/saveuser') ?>",
							"method": "POST",
							"timeout": 0,
							"headers": {
								"Content-Type": "application/x-www-form-urlencoded"
						  	},
							"data": {
						    	"name": name,
						    	"images": url_gambar,
						    	"jabatan": jabatan
						  	}
						};

						$.ajax(settings).done(function (response) {
							if (response.code == 203) {
								toastr.error(response.message)
							}else{
								toastr.success(response.message)
								setTimeout(function() {
									window.location.href="./add"
								},1500)
							}
						});
					}
				})
			}
		},50)
	},3000)
	console.log(url_gambar)
</script>