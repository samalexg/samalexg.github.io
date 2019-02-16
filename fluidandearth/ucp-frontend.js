/*
 * UnderConstructionPage PRO
 * (c) Web factory Ltd, 2015 - 2017
 */

 var ucp_frontend = (function($) {

    function ucp_setup_forms(){
      $('form.ucp-module').on('submit',function(e){
       var form_id = this.id;
       var ucp_processor = $(this).data('processor');
       var fields = {};
       var form_type = $(this).data('module-type');
       var form_sendto = $(this).data('processor');

       if(form_type == 'contact'){
        var form_admin_email = $(this).data('admin-email');
        var form_email_subject = $(this).data('email-subject');
        var form_email_body = $(this).data('email-body');
       }


       if($(this).find('.input_terms').length>0){
          if($(this).find('.input_terms:checked').length>0){
            //checked
          } else {
            alert('You need to check the box "'+$(this).parent().find('label').html()+'"');
            return false;
          }
       }

       if(ucp_processor == 'mailchimp' || ucp_processor == 'zapier' || ucp_processor == 'local' || ucp_processor == 'autoresponder' ){
          e.preventDefault();

          $(this).find('input[type="text"],input[type="email"],input[type="tel"],textarea').each(function(){
            fields[$(this).attr('name')] = $(this).val();
          });

          $.ajax({
            url: ucp_frontend_variables.ucp_ajax_url,
            method: 'POST',
            crossDomain: true,
            dataType: 'json',
            data: {
              action:'ucp_submit_form',
              form_type:form_type,
              form_sendto:form_sendto,
              form_admin_email:form_admin_email,
              form_email_subject:form_email_subject,
              form_email_body:form_email_body,
              fields:fields
            }
          }).success(function(response) {
            if(response.data == 'success' || response.data == 'captcha'){
              alert($('#'+form_id).attr('data-msg-'+response.data));
            } else {
              alert($('#'+form_id).attr('data-msg-error') + ':' + response.data);
            }
          }).error(function(type) {

          });
       }

      });
    }

    return { // public interface
      initialize_ucp_forms: function () {
        ucp_setup_forms();
      }
    };

})( jQuery );

jQuery(document).ready(function(e) {
  ucp_frontend.initialize_ucp_forms();
});
