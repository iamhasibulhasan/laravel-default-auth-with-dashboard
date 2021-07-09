(function ($){
    $(document).ready(function (){


        /*Logout Control*/
        $('.logout-cls').click(function (e){
            e.preventDefault();
            $('#logout_form').submit();
        });

        /*Add new role modal view*/
        $('#add_btn_role').click(function (e){
            e.preventDefault();



            $('#add_modal_role').modal('show');
        });

        /**
         * All Roles Show With Ajax
         */
        /*Add new role modal view*/
        function allRoles(){
            $.ajax({
                url:'allroles',
                success: function (data){
                    $('#allroles_body').html(data);
                }
            });
        }
        allRoles();


        /**
         * Role Update
         */

        $(document).on('click', '#role_status_btn', function (e){
            e.preventDefault();
             let id = $(this).attr('status_id');

            $.ajax({
                url:    'role-update/'+id,
                success : function (data){
                    allRoles();

                    if (data.status == 'Published'){
                        swal({
                            title:'Published',
                            text:'Role published',
                            icon: 'success'
                        });
                    }else{
                        swal({
                            title:'Unpublished',
                            text:'Role unpublished',
                            icon: 'error'
                        });
                    }

                }
            });
        });

        /**
         * Role Data Update
         */
        $(document).on('click', '#role_modal_btn', function (e){
            e.preventDefault();
            let id = $(this).attr('edit_id');


            $.ajax({
                url:'role-data-edit/'+id,
                success: function (data){
                    $('#edit_modal_role input[name ="name"]').val(data.name);
                    $('#edit_modal_role input[name ="update_id"]').val(data.id);
                    $('#box').html(data.permission);
                }
            });

            $('#edit_modal_role').modal('show');


        });

        /**
         * Role Data Update
         */

        $(document).on('submit', '#role_update_modal', function (e){
            e.preventDefault();
            let name = $('#edit_modal_role input[name ="name"]').val();

                $.ajax({
                    url:    'role-data-update',
                    method  :   'POST',
                    data: new FormData(this),
                    contentType :false,
                    processData: false,
                    success:function (data){
                        allRoles();
                        $('#edit_modal_role').modal('hide');

                        let msg = setInterval(function (){
                            swal({
                                title:'Updated',
                                text:'Role updated successful',
                                icon: 'success'
                            });

                            clearInterval(msg);
                        }, 1500);

                    }

                });


        });

        /**
         * Role Delete
         */

        $(document).on('click', '#role_delete_btn', function (e){
            e.preventDefault();
            let id = $(this).attr('delete_id');



            swal({
                title:'Delete',
                text:'Are you sure?',
                buttons: ['Cancel','Delete'],
                dangerMode:true
            }).then((d) => {
                if (d){


                    $.ajax({
                        url: 'role-delete/'+ id ,
                        success:function (data){
                            if (data){
                                allRoles();
                                swal({
                                    title:'Deleted',
                                    text:'Data deleted successful !',
                                    icon:'success'
                                });
                            }
                        }
                    });


                }else{
                    swal({
                        title:'Cancle',
                        text:'Data Safe',
                        icon:'error'
                    });
                }
            });



        });

        /**
         * User Control Here
         */

        //Add new user modal view
        $(document).on('click', '#add_user_btn', function (e){
            e.preventDefault();

            $('#add_user_modal').modal('show');
        });


        //Add new user
        $(document).on('submit', '#add_user_form', function (e){
           e.preventDefault();
           $.ajax({
               url:'/user-store',
               method: 'POST',
               data: new FormData(this),
               contentType: false,
               processData:    false,
               success: function (data){


                   if(data){
                       $('#add_user_modal').modal('hide');
                       allUsers();
                       swal('Success', 'User added successful !', 'success');
                   }


               }
           });
        });


        //Show All user data
        allUsers();
        function allUsers(){
            $.ajax({
                url:'all-users',
                success:function (data){
                    $('#allUserTable').html(data);
                }
            });
        }

        //Edit User modal
        $(document).on('click','#user_edit_btn', function (e){
            e.preventDefault();
            let id = $(this).attr('edit_id');
            $.ajax({
                url:'user_edit/' + id,
                success:function (data){
                    // alert(data);
                    $('#edit_user_form input[name = "fname"]').val(data.name);
                    $('#edit_user_form input[name = "id"]').val(data.id);
                    $('#edit_user_form input[name = "email"]').val(data.email);
                    $('#edit_user_form input[name = "cell"]').val(data.cell);
                    $('#edit_user_form input[name = "uname"]').val(data.uname);
                    $('#edit_user_form .user_gender').html(data.gender);
                    $('#edit_user_form #user_edu').html(data.edu);
                    $('#user_edit_modal').modal('show');
                }
            });
        });


        //Update User Data
        $(document).on('submit', '#edit_user_form', function (e){
            e.preventDefault();
            let id = $('#edit_user_form input[name = "id"]').val();
            // alert(id);
            $.ajax({
                url: 'user-update',
                method:'POST',
                data: new FormData(this),
                contentType:false,
                processData:false,
                success: function (data){
                    // alert(data);
                    if (data){
                        $('#user_edit_modal').modal('hide');
                        allUsers();
                        swal('Success', 'User updated successful !', 'success');
                    }
                }
            });
        });


    });
})(jQuery)
