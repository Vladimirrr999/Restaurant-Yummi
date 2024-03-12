<!DOCTYPE html>
<html lang="en">
    @include('admin.fixed.adminHead')

<body class="bg-gradient-primary">

<div class="container">
    <div id="successMessage" class="alert alert-success" style="display: none;"></div>
    <div id="errorMessage" class="alert alert-danger" style="display: none;"></div>

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-2">Change your password</h1>
                                    <p class="mb-4">Enter your current password then enter new one!</p>
                                </div>
                                <form id="changePasswordForm" class="user" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="currPass" name="currPass" placeholder="Enter current password...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="newPass" name="newPass" placeholder="Enter new password...">
                                    </div>
                                    <button type="button" id="changePasswordBtn" class="btn btn-primary btn-user btn-block">Change Password</button>
                                </form>

                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@include('admin.fixed.adminScripts')
</body>
</html>
<script>
    $(document).ready(function() {
        $('#changePasswordBtn').click(function() {
            var formData = $('#changePasswordForm').serialize();
            $.ajax({
                type: 'POST',
                url: '/newPassword',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        $('#successMessage').text(response.success);
                        $('#errorMessage').hide();
                        $('#successMessage').show();
                        window.location.href = '/dashboard';
                    } else {
                        var errorsHtml = '<ul>';
                        $.each(response.errors, function(index, error) {
                            errorsHtml += '<li>' + error + '</li>';
                        });
                        errorsHtml += '</ul>';
                        $('#errorMessage').html(errorsHtml).show();
                        $('#successMessage').hide();
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error changing password:', error);
                }
            });
        });
    });
</script>

