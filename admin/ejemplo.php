<form id="faq-form">
    <p>
        <label>Title:</label>
        <input type="text" id="faqtitle" name="faqtitle" class="faq-title" />
    </p>
    <p>
        <label for="question">Question:</label>
        <textarea name="question" id="question"></textarea>
    </p>
    <p>
        <label for="answer">Answer:</label>
        <textarea name="answer" id="answer"></textarea>
    </p>
    <p>
        <input id="submit-faq" name="submit-faq" type="submit" value="Submit" />
    </p>
</form>



<style>
    .form-error{color: #D8000C;}
</style>
<link rel="stylesheet" href="assets/materialize/css/materialize.css" media="screen,projection" />
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- Bootstrap Js -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<!-- validador -->
<script src="assets/js/jquery.validate.js"></script>



<script>

        CKEDITOR.replace( 'question' );

       /* $("form").submit( function(e) {

            var messageLength = CKEDITOR.instances['question'].getData().replace(/<[^>]*>/gi, '').length;

            if( !messageLength ) {

                alert( 'Please enter a message' );

                e.preventDefault();

            }

        });*/

$(document).ready(function(){

    $("#faq-form").validate({
        ignore: [],
        rules:{
            faqtitle: "required",
            question: {
                required: function() {
                    var messageLength = CKEDITOR.instances['question'].getData().replace(/<[^>]*>/gi, '').length;

                    if( ! messageLength ) {

                        alert(messageLength+'aqui');

                        return messageLength === 0;



                        //alert( 'Please enter a message' );

                        //e.preventDefault();

                    }else{
                        alert(messageLength);
                    }

                },
                minlength: 10
            }

     },messages:{
            firstname:{
            required:"Enter first name"
        }

     }
   });

});
</script>
