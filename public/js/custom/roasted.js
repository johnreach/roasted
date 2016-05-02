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
$('body').on('submit','#loginForm', function(e) {
    //var url = $("#loginForm").action;
    //alert(url);
    console.log("submited");
    $.ajax({
           type: "POST",
           url: "login",
           cache: false,
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
                    return false;
                }
                
           }
         });
        
    e.preventDefault(); // avoid to execute the actual submit of the form.
});


$('#registerWizard').on('actionclicked.fu.wizard', function (evt, d) {

    if(d.step == 1) {
     
        $.ajax({
           type: "POST",
           url: "register",
           cache: false,
           data: $("#registerForm").serialize(), // serializes the form's elements.
           success: function(data)
           {
                console.log(data);
                
                if(IsJsonString(data)) {
                    
                    data = JSON.parse(data);
                    
                    if(data.registerSuccess) {
                        console.log(data);
                        $('#registerWizard').wizard('selectedItem', {
			                step: 2
		                });
                        
                        $('#uploadField').load(data.route);
                    }
                    
                } else {
                    
                    console.log('register failed');
                    $("#registerField").html(data);
                }
                
           }
         });
        
    } else if(d.step == 2) {

        $('#uploadForm').submit();
        $('#loginModal').modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
        location.reload();
    }
  
    evt.preventDefault();

});

$('#registerModal').on('hide.bs.modal', function () {
    if($('#registerWizard').wizard('selectedItem').step == 2) {
        location.reload();
    }
});



$('#loginFailed').tooltip({placement: 'top',trigger: 'manual'}).tooltip('show');
$('#loginFailed').on('click',function(){$(this).tooltip('destroy');});