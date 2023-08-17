<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-body">
				<img src="<?=base_url('client/'.$data->images) ?>" class="img-thumbnail">
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Face Detector</h3>
			</div>
			<div class="card-body">
				<audio id="audio" autoplay>
					<source src="<?=base_url('text-speach/notif.mp3') ?>" type="audio/mp3">
				</audio>
				<div id="load-result"></div>				
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function createAudio(text) {
		var settings = {
		  "url": "http://localhost:3000/",
		  "method": "POST",
		  "timeout": 0,
		  "headers": {
		    "Content-Type": "application/x-www-form-urlencoded"
		  },
		  "data": {
		    "text": text
		  }
		};

		$.ajax(settings).done(function (response) {
		  console.log(response);
		});
	}
	function playAudio() {
		var settings = {
		  "url": "http://localhost:3000/play",
		  "method": "GET",
		  "timeout": 0,
		};

		$.ajax(settings).done(function (response) {
		  console.log(response);
		});
	}
	function sendMessage(phone,message) {
		var settings = {
		  "url": "http://localhost:8888/api/"+localStorage['tokens']+"/send-message",
		  "method": "POST",
		  "timeout": 0,
		  "headers": {
		    "Content-Type": "application/json"
		  },
		  "data": JSON.stringify({
		    "phone": phone,
		    "isGroup": false,
		    "message": message
		  }),
		};

		$.ajax(settings).done(function (response) {
			if (response.status == "success") {
				toastr.success("Pesan berhasil dikirim")
			}else{
				toastr.error("Pesan gagal dikirim")
			}
		});
	}
	$('#load-result').html("Loading....<br>Sedang memvalidasi Wajah");
	function cekImages(id) {
		var settings = {
			"url": "<?=base_url('api/validasi/?images='.$data->images."&id=") ?>"+id,
			"method": "GET",
			"timeout": 0,
		};

		$.ajax(settings).done(function (response) {
			if (response.code == 200) {
				$('#load-result').html("Data wajah ditemukan<br>"+response.data);
				var text = "Yang terhormat, bapak atau ibu "+response.data+", Selamat datang di petik jombang";
				createAudio(text)
				playAudio()
			}else{
				//$('#load-result').html(response.message);
			}
		});
	}
	
	for (var i = 14; i <= 20; i++) {
		cekImages(i)
		
	}
	
	

</script>