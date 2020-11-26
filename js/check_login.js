function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test($email);
}
$(document).ready(function(){
   //Kiểm tra email trong form
   $("#user_email").keyup(function(){
      var valEmail = $("#user_email");
      if($("#user_email").hasClass('valid') == true)
      {
         if(valEmail.val().length > 0)
         {
            $("#user_email_error").remove();
            if(validateEmail(valEmail.val()) == false)
            {
               if($("#user_email_error").hasClass("error") == false)
               {
               valEmail.after('<label id="user_email_error" class="error" for="user_email">Địa chỉ email không đúng định dạng.</label>');
               valEmail.addClass('error');
               }
            }
            else
            {
               $("#user_email_error").remove();
               valEmail.removeClass('error');
            }
         }
         else
         {
               $("#user_email_error").remove();
               valEmail.after('<label id="user_email_error" class="error" for="user_email">Vui lòng nhập địa chỉ email.</label>');
               valEmail.addClass('error');
         }
      }
   });
   $("#user_email").blur(function(){
      var valEmail = $("#user_email");
      if(valEmail.val().length > 0)
      {
         if(validateEmail(valEmail.val()) == false)
         {
            if($("#user_email_error").hasClass("error") == false)
            {
            valEmail.after('<label id="user_email_error" class="error" for="user_email">Địa chỉ email không đúng định dạng.</label>');
            valEmail.addClass('error');
            }
         }
         else
         {
            $("#user_email_error").remove();
            valEmail.removeClass('error');
         }
         valEmail.addClass('valid');
      }
   });
   //Kiểm tra password trong form
   $("#user_password_first").keyup(function(){
      var valPass = $("#user_password_first");
      if($("#user_password_first").hasClass('valid') == true)
      {
         if(valPass.val().length > 0)
         {
            $("#user_password_first_error").remove();
            if(valPass.val().length < 4)
            {
               if($("#user_password_first_error").hasClass("error") == false)
               {
               valPass.after('<label id="user_password_first_error" class="error" for="user_password_first" style="display: inline-block;">Mật khẩu phải từ 4-20 ký tự</label>');
               valPass.addClass('error');
               }
            }
            else
            {
               $("#user_password_first_error").remove();
               valPass.removeClass('error');
            }
         }
         else
         {
               $("#user_password_first_error").remove();
               valPass.after('<label id="user_password_first_error" class="error" for="user_password_first" style="display: inline-block;">Vui lòng nhập mật khẩu.</label>');
               valPass.addClass('error');
         }
      }
   });
   $("#user_password_first").blur(function(){
      var valPass = $("#user_password_first");
      if(valPass.val().length > 0)
      {
         if(valPass.val().length < 4)
         {
            if($("#user_password_first_error").hasClass("error") == false)
            {
            valPass.after('<label id="user_password_first_error" class="error" for="user_password_first" style="display: inline-block;">Mật khẩu phải từ 4-20 ký tự</label>');
            valPass.addClass('error');
            }
         }
         else
         {
            $("#user_password_first_error").remove();
            valPass.removeClass('error');
         }
         valPass.addClass('valid');
      }
   });
});
function checkvali()
{
   var returnform = true;
   var ccemail = $("#user_email");
   var ccpass  = $("#user_password_first");
   if(ccpass.val() == '')
   {
      $("#user_password_first_error").remove();
      ccpass.after('<label id="user_password_first_error" class="error" for="user_password_first" style="display: inline-block;">Vui lòng nhập mật khẩu.</label>');
      ccpass.addClass('error');
      ccpass.focus();
      ccpass.addClass('valid');
      returnform = false;
   }
   else
   {
      ccpass.addClass('valid');
      $("#user_password_first_error").remove();
      if(ccpass.val().length < 4)
      {
         if($("#user_password_first_error").hasClass("error") == false)
         {
         ccpass.after('<label id="user_password_first_error" class="error" for="user_password_first" style="display: inline-block;">Mật khẩu phải từ 4-20 ký tự</label>');
         ccpass.addClass('error');
         ccpass.focus();
         returnform = false;
         }
      }
      else
      {
         $("#user_password_first_error").remove();
         ccpass.removeClass('error');
      }
   }
   if(ccemail.val() == '')
   {
      $("#user_email_error").remove();
      ccemail.after('<label id="user_email_error" class="error" for="user_email">Vui lòng nhập địa chỉ email.</label>');
      ccemail.addClass('error');
      $("#user_email").focus();
      ccemail.addClass('valid');
      returnform = false;
   }
   else
   {
      ccemail.addClass('valid');
      $("#user_email_error").remove();
      if(ccemail.val().length > 0)
      {
         if(validateEmail(ccemail.val()) == false)
         {
            if($("#user_email_error").hasClass("error") == false)
            {
            ccemail.after('<label id="user_email_error" class="error" for="user_email">Địa chỉ email không đúng định dạng.</label>');
            ccemail.focus();
            ccemail.addClass('error');
            }
            returnform = false;
         }
         else
         {
            $("#user_email_error").remove();
            ccemail.removeClass('error');
         }
         ccemail.addClass('valid');
      }
   }
   return returnform; 
}