// near Companies in local areal
function localCompanies(){
    $.ajax({
        type: 'POST',
        url: 'functions/users.php',
        data: {
            localCompanies: 1
        },
        success:function(data){
            $('#localCompanies').html(data);
        }
    });
}

$(document).ready(function () {
    localCompanies();
});