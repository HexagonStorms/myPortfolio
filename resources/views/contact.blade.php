@extends('master') @section('title') Josues Portfolio @endsection @section('content')
<div class="row justify-content-center mt-3">
    <div class="col-lg-6">
        <h2>Contact me</h2>
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" type="text" name="name" class="form-control" placeholder="Your name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" class="form-control" placeholder="name@example.com">
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" placeholder="note here" name="message" class="form-control"></textarea>
        </div>
        <button id="sendEmail" class="btn btn-primary">Send</button>
        <p id="notification"></p>
    </div>
</div>
@endsection @section('bottomscript')
<script>
    $( document ).ready(function() {
        $("#sendEmail").on("click", function() {
            var name = $("#name").val();
            var email = $("#email").val();
            var message = $("#message").val();

            var data = {
                name: name,
                email: email,
                message: message
            };

            console.log(data);

            $.ajax({
                method: 'POST',
                url: '/send-email',
                data: data
            })
            .done(function(response) {
                console.log(response);
                if (response) {
                    $("#name").val("");
                    $("#email").val("");
                    $("#message").val("");
                    $("#notification").html("Message sent!");

                } else {
                    $("#notification").html("Sorry, something went wrong. Please try again later.");
                }
            });
        });
    });
</script>
@endsection
