<div class="row">
	<div class="col-md-4">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Status Server</h3>
			</div>
			<div class="card-body">
				<div id="status-server"></div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Send Message</h3>
			</div>
			<div class="card-body">
				<input type="hidden" id="token">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="62812345789" id="phone">
				</div>
				<div class="form-group">
					<textarea class="form-control" id="message" rows="6"></textarea>
				</div>
				<div class="form-group">
					<button class="btn btn-success btn-block" id="send-message">Send Message</button>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Documentation</h3>
			</div>
			<div class="card-body">
				<a href="http://localhost:8888/api-docs/" target="_blank" class="btn btn-block btn-primary">Open Documentation</a>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	
	var settings = {
	  "url": "http://localhost:8888/api/PetikJombang/DeltaWhatsApp/generate-token",
	  "method": "POST",
	  "timeout": 0,
	};

	$.ajax(settings).done(function (response) {
		localStorage['tokens'] = response.full;
		$("#token").val(response.full)
	});
	let qrcode
	function getSession() {
		var settings = {
		  "url": "http://localhost:8888/api/"+localStorage['tokens']+"/start-session",
		  "method": "POST",
		  "timeout": 0,
		};

		$.ajax(settings).done(function (response) {
			if (response.status == "QRCODE") {
				qrcode = "<img src='"+response.qrcode+"' class='img-thumbnail'/>"
			}else if (response.status == "CONNECTED") {
				clearInterval(refresh)
				qrcode = "<center><img src='<?=base_url('assets/logo.png') ?>' class='img-thumbnail'/></center>"
			}else{
				qrcode = "<center><img src='https://gifdb.com/images/high/buffering-animated-text-icon-loading-u1h739who8u5mtw3.gif' class='img-thumbnail'/></center>"
			}
			$("#status-server").html("<p class='text-center'>"+response.status+"</p>"+qrcode)
		});
	}
	getSession();
	var refresh = setInterval(function() {
		getSession();
	},10000)

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
	$("#send-message").click(function() {
		var phone = $("#phone").val()
		var message = $("#message").val()
		if (phone == "") {
			toastr.error("Nomor telepon tidak boleh kkosong")
		}else if (message == "") {
			toastr.error("Pesan tidak boleh kkosong")
		}else{
			sendMessage(phone,message)
			$("#phone").val("")
			$("#message").val("")
			$("#phone").focus()
		}
	})
</script>