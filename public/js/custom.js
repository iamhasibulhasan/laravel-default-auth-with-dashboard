(function ($){


    $(document).ready(function (){



        /*Show Single User View*/
        $(document).on('click', 'a#view', function(e){
            e.preventDefault();
            let id = $(this).attr('view-id');
            let name = $(this).attr('view-name');
            $.ajax({
                url :   '/show/'.concat(id),
                success :   function (data){
                    $('#single_user').html(data);
                    // alert(data.name);
                    document.getElementById('user-view').innerHTML=name.concat(' Profile');
                }

            });

            $('#single-view').modal('show');
        });

        /*Auth Edit Profile Modal View*/

        $(document).on('click', 'a#profile-edit-btn', function(e){
            e.preventDefault();
            $('#profile-edit-modal').modal('show');
        });

        /*Auth Profile Update*/

        $(document).on('submit', 'form#auth-edit', function (e){
            e.preventDefault();
            let id = $('#auth-edit input[name = "id"]').val();
                $.ajax({
                    url :   '/update/'.concat(id),
                    method  : 'POST',
                    data    : new FormData(this),
                    contentType: false,
                    processData: false,
                    success : function (data){
                        location.reload()
                    }
                });


        });


        /*Auth Password Change*/

        $(document).on('submit', 'form#change-pass', function (e){
            e.preventDefault();
            let id = $('#change-pass input[name = "id"]').val();

            $.ajax({
                url :   '/updatepass/'.concat(id),
                method  : 'POST',
                data    : new FormData(this),
                contentType: false,
                processData: false,
                success : function (data){
                    if (data == 'success'){
                        $('.msg').html(customMsg( 'Password Updated Successful!', data ));
                    }else if(data == 'warning'){
                        $('.msg').html(customMsg( 'Password Not Match!', data ));
                    }else{
                        $('.msg').html(customMsg( 'Invalid Password !', data ));
                    }
                }
            });


        });


    });


})(jQuery)
