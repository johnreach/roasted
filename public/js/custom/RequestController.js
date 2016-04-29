/*
var wizard = $(".wizard").wizard();
wizard.on('finished', function (e, data) {
    $("#form-in-wizard").submit();
    console.log("submitted!");
});
*/

// this is the id of the form
/*
$("#loginForm").submit(function(e) {
    //var url = $("#loginForm").action;
    //alert(url);
    $.ajax({
           type: "POST",
           url: "login",
           data: $("#loginForm").serialize(), // serializes the form's elements.
           success: function(data)
           {
               $("#loginField").html(data); // show response
           }
         });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});
*/
$('#registerWizard').on('actionclicked.fu.wizard', function (evt, data) {
 
    if(data.step == 1) {
        console.log('registerPlease');
        $('form#registerForm').submit();
        evt.preventDefault();
    }
    
});


$('#loginFailed').tooltip({placement: 'left',trigger: 'manual'}).tooltip('show');
$('#loginFailed').on('click',function(){$(this).tooltip('destroy');});