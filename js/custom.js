
$('#openLogin').click(function(){
    $('#loginForm').modal('show');
});

$('#closeLogin').click(function(){
    $('#loginForm').modal('hide');
});

// Dashboard models
// Product Form
$('#addProduct').click(function(){
    $('#productForm').modal('show');
});
$('#closeProduct').click(function(){
    $('#productForm').modal('hide');
});

// close update model in dashboard
$('#closeEditProducts').click(function(){
    $('#editProducts').modal('hide');
});

// close Delete model in dashboard
$('#closeDeleteProducts').click(function(){
    $('#deleteModel').modal('hide');
});

// open switch in settings page
$('#openSwitch').click(function(){
    $('#switchModel').modal('show');
});
// close switch model
$('#closeSwitch').click(function(){
    $('#switchModel').modal('hide');
});

