<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<input type="hidden" id="code" value="<?=uniqid() ?>">
				<div id="my_camera"></div>
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
		Webcam.snap( function(data_uri) {
			var code = $("#code").val()
			var settings = {
				"url": "<?=base_url('api/saverecord') ?>",
				"method": "POST",
				"timeout": 0,
				"headers": {
					"Content-Type": "application/x-www-form-urlencoded"
			  	},
				"data": {
			    	"code": code,
			    	"images": data_uri,
			  	}
			};

			$.ajax(settings).done(function (response) {
				if (response.code == 203) {
					toastr.error(response.message)
				}else{
					toastr.success(response.message)
					setTimeout(function() {
						window.location.href="./result/"+code
					},1500)
				}
			});
		});
	},3000)
	console.log(url_gambar)
</script>