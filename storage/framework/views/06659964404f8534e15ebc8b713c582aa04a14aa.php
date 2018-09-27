<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
				<div id="output"></div>
                    <form method="POST" action="<?php echo e(route('home')); ?>">
                        <?php echo csrf_field(); ?>
	
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="">

                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Category</label>
	                       <div>
                           <select data-placeholder="Choose a Country" class="chosen-select" multiple style="width:350px;" tabindex="4">
								<option value="Engineering">Engineering</option>
								<option value="Carpentry">Carpentry</option>
								<option value="Plumbing">Plumbing</option>
								<option value="Electical">Electrical</option>
								<option value="Mechanical">Mechanical</option>
								<option value="HVAC">HVAC</option>
							  </select>
							  </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-primary btn-submit">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">


	$(document).ready(function() {
	    $(".btn-submit").click(function(e){
	    	e.preventDefault();


	    	var _token = $("input[name='_token']").val();
	    	var first_name = $("input[name='first_name']").val();
	    	var last_name = $("input[name='last_name']").val();
	    	var email = $("input[name='email']").val();
	    	var address = $("textarea[name='address']").val();


	        $.ajax({
	            url: "/upload",
	            type:'POST',
	            data: {_token:_token, first_name:first_name, last_name:last_name, email:email, address:address},
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	alert(data.success);
	                }else{
	                	printErrorMsg(data.error);
	                }
	            }
	        });


	    }); 


	    function printErrorMsg (msg) {
			$(".print-error-msg").find("ul").html('');
			$(".print-error-msg").css('display','block');
			$.each( msg, function( key, value ) {
				$(".print-error-msg").find("ul").append('<li>'+value+'</li>');
			});
		}
	});

$('.chosen-select').chosen();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>