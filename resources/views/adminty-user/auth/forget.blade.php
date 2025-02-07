<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FORGET PASSWORD | USER PANEL | {{App\Models\Setting::siteName()}} </title>

	<!-- Global stylesheets -->
    <link rel="shortcut icon" type="image/png" href="{{asset('front/image/favicon.png')}}">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->
    <link href="{{asset('user_asset/assets/css/toastr.css')}}" rel="stylesheet" type="text/css">

	<!-- Core JS files -->
	<script src="{{asset('user_asset/global_assets/js/main/jquery.min.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{asset('user_asset/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

	<script src="{{asset('user_asset/assets/js/app.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/demo_pages/login.js')}}"></script>
	<!-- /theme JS files -->

</head>

<body class="bg-slate-800">

	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Login card -->
				<form class="login-form" id="verficationForm" method="POST" action="{{route('user.verification')}}">
                    @csrf
					<div class="card mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
								<i class="icon-people icon-2x text-warning-400 border-warning-400 border-3 rounded-round p-3 mb-3 mt-1"></i>
								<h5 class="mb-0">Answer the questions, {{App\Models\Setting::siteName()}}</h5>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="text" name="name" class="form-control" placeholder="Username">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>
							<div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="text" class="form-control" value="{{old('birth_place')}}" placeholder="Your Birth Place" name="birth_place" required>
                                <div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>
							<div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="text" class="form-control" value="{{old('favourite_place')}}" placeholder="Your Favourite Place" name="favourite_place" required>
                                <div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>
							<div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="text" class="form-control" value="{{old('favourite_uncle')}}" placeholder="Your Favourite Person" name="favourite_uncle" required>
                                <div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>
							<p id="errors" style="color:red;"></p>
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">Verify <i class="icon-circle-right2 ml-2"></i></button>
							</div>
						</div>
					</div>
				</form>
				<!-- /login card -->
				
				<!-- Login card -->
				<form class="login-form" id="resetPassword" method="POST" action="{{route('user.resetPassword')}}" style="display:none;">
                    @csrf
					<div class="card mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
								<i class="icon-people icon-2x text-warning-400 border-warning-400 border-3 rounded-round p-3 mb-3 mt-1"></i>
								<h5 class="mb-0">Reset Password, {{App\Models\Setting::siteName()}}</h5>
							</div>
							<input type="hidden" name="id" id="user_id">
                            <div class="form-group form-group-feedback form-group-feedback-left">
								<input type="password" name="password" class="form-control" placeholder="Password">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">Rest Password <i class="icon-circle-right2 ml-2"></i></button>
							</div>
						</div>
					</div>
				</form>
				<!-- /login card -->

			</div>
			<!-- /content area -->

		</div>
		<!-- /main content --> 

	</div>
	<!-- /page content -->
    <script src="{{asset('user_asset/assets/js/toastr.js')}}"></script>
	@toastr_render
	
    <script>
        $(document).on('submit', '#verficationForm', function (event) {
            $('#errors').html("Please Wait!!");
            $('.btn').attr("disabled",true);
            event.preventDefault();
            $.ajax({
                url: '{{url("user/verification")}}',
                type: 'POST',
                data: $('#verficationForm').serialize(),
            })
                .done(function (response) {
                    $('.btn').attr("disabled",false);
                    if(response.status == true)
                    {
						$('#verficationForm').hide();
						$('#resetPassword').show();
						$('#user_id').val(response.user_id);
                    }else{
                        $('#errors').html(response.message);
                    }
                })
                .fail(function (response) {
                })
                .always(function () {
                    console.log("complete");
                });
        });
    </script>
</body>
</html>
