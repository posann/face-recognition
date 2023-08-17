<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Data User Regisered</h3>
			</div>
			<div class="card-body">
				<table id="example2" class="table table-bordered table-striped">
                	<thead>
                		<tr>
                			<th>No</th>
                    		<th>Name</th>
                    		<th>Position</th>
                    		<th>Images</th>
                  		</tr>
                  	</thead>
                  	<tbody>
                  		<?php $no=0; foreach ($data as $key) { $no++;
                  			$img = '<img width="145" src="'.base_url('client/'.$key->images).'" alt="'.$key->name.'">';
                  			echo "<tr><td>".$no."</td><td>".$key->name."</td><td>".$key->jabatan."</td><td>".$img."</td></tr>";
                  		} ?>
                  	</tbody>
              	</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
</script>