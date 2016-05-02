/*
var wizard = $(".wizard").wizard();
wizard.on('finished', function (e, data) {
    $("#form-in-wizard").submit();
    console.log("submitted!");
});
*/

// this is the id of the form
function IsJsonString(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}
$("#loginForm").submit(function(e) {
    //var url = $("#loginForm").action;
    //alert(url);
    console.log("submited");
    $.ajax({
           type: "POST",
           url: "login",
           data: $("#loginForm").serialize(), // serializes the form's elements.
           success: function(data)
           {
                console.log(data);
       
                if(IsJsonString(data)) {
                    
                    data = JSON.parse(data);
                    
                    if(data.loginSuccess) {
                        
                        $('#loginModal').modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        location.reload();
                    }
                    
                } else {
                    
                    console.log('login failed');
                    $("#loginField").html(data);
                }
                
           }
         });
        
    e.preventDefault(); // avoid to execute the actual submit of the form.
});

$('#registerWizard').on('actionclicked.fu.wizard', function (evt, data) {
 
    if(data.step == 1) {
        console.log('registerPlease');
        $.ajax({
           type: "POST",
           url: "register",
           data: $("#registerForm").serialize(), // serializes the form's elements.
           success: function(data)
           {
                console.log(data);
       
                if(IsJsonString(data)) {
                    
                    data = JSON.parse(data);
                    
                    if(data.registerSuccess) {
                        
                        $('#registerModal').modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        location.reload();
                    }
                    
                } else {
                    
                    console.log('register failed');
                    $("#registerField").html(data);
                }
                
           }
         });
        evt.preventDefault();
    }
    
});


$('#loginFailed').tooltip({placement: 'left',trigger: 'manual'}).tooltip('show');
$('#loginFailed').on('click',function(){$(this).tooltip('destroy');});