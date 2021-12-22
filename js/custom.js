// Login 
$('#showLoginModel').click(function(){
    document.getElementById('loginModel').style.display='block';
});
$('#hideLoginModel').click(function(){
    document.getElementById('loginModel').style.display='none';
});



$('.userBtn').click(function(){
    if (document.querySelector('.profileLinks').style.display = 'none'){
        document.querySelector('.profileLinks').style.display = 'block';
        document.querySelector('.userBtn').style.display = 'none';
        document.querySelector('.userBtn1').style.display = 'block';
    }
});
$('.userBtn1').click(function(){
    if (document.querySelector('.profileLinks').style.display = 'block'){
        document.querySelector('.profileLinks').style.display = 'none';
        document.querySelector('.userBtn').style.display = 'block';
        document.querySelector('.userBtn1').style.display = 'none';
    }
});
$('.userBtn2').click(function(){
    if (document.querySelector('.profileLinks').style.display = 'block'){
        document.querySelector('.profileLinks').style.display = 'none';
        document.querySelector('.userBtn').style.display = 'block';
        document.querySelector('.userBtn1').style.display = 'none';
    }
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

