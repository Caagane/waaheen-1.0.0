
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
