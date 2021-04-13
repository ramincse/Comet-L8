(function ($) {
    $(document).ready(function () {
        /**
         * Logout Button
         */
        $(document).on('click', '#logout_btn', function (e) {
            e.preventDefault();
            $('#logout_form').submit();
        });

        /**
         * Post CK Editor Load
         */
        CKEDITOR.replace('post_ek_editor');

        /**
         * Post Select option in Tags
         */
        $('.post_tag_select').select2();

        /**
         * Category Switcher
         */
        $(document).on('change', '.cat_check', function(){
            let checked = $(this).attr('checked');
            let status_id = $(this).attr('status_id');

            if (checked == 'checked' ){
                $.ajax({
                    url: '/category/status-inactive/' + status_id,
                    success: function(data){
                        swal('Category Inactivated Successfull!');
                    }
                });
            }else{
                $.ajax({
                    url: '/category/status-active/' + status_id,
                    success: function (data) {
                        swal('Category Activated Successfull!');
                    }
                });
            }
        });

        /**
         * Category Delete
         */
        $(document).on('click', '#cat_delete_btn', function(e){
                        
            let conf = confirm('Are you sure?');

            if (conf == true ){
                return true;
            }else{
                return false;
            }
        });

        /**
         * Category Edit
         */
        $(document).on('click', '.edit_cat', function(e){
            e.preventDefault();

            let edit_id = $(this).attr('edit_id');
            
            $.ajax({
                url: 'category/' + edit_id + '/edit',
                success: function(data){
                    $('#edit_category_modal input[name="edit_id"]').val(data.id);
                    $('#edit_category_modal input[name="name"]').val(data.name);
                    $('#edit_category_modal').modal('show');
                }
            });
        });

        /**
         * Tag Switcher
         */
        $(document).on('change', '.tag_check', function () {
            let checked = $(this).attr('checked');
            let status_id = $(this).attr('status_id');

            if (checked == 'checked') {
                $.ajax({
                    url: '/tag/status-inactive/' + status_id,
                    success: function (data) {
                        swal('Tag Inactivated Successfull!');
                    }
                });
            } else {
                $.ajax({
                    url: '/tag/status-active/' + status_id,
                    success: function (data) {
                        swal('Tag Activated Successfull!');
                    }
                });
            }
        });

        /**
         * Tag Delete
         */
        $(document).on('click', '#tag_delete_btn', function (e) {

            let conf = confirm('Are you sure?');

            if (conf == true) {
                return true;
            } else {
                return false;
            }
        });

        /**
         * Tag Edit
         */
        $(document).on('click', '.edit_tag', function (e) {
            e.preventDefault();

            let edit_id = $(this).attr('edit_id');

            $.ajax({
                url: 'tag/' + edit_id + '/edit',
                success: function (data) {
                    $('#edit_tag_modal input[name="edit_id"]').val(data.id);
                    $('#edit_tag_modal input[name="name"]').val(data.name);
                    $('#edit_tag_modal').modal('show');
                }
            });
        });

        /**
         * Select Blog Post Format
         */
        $(document).on('change', '#post_format', function (e) {
            e.preventDefault();

            let format = $(this).val();
            
            if (format == 'Image' ){
                $('.post-image').show();
            }else{
                $('.post-image').hide();
            }

            if (format == 'Gallery') {
                $('.post-gallery').show();
            } else {
                $('.post-gallery').hide();
            }

            if (format == 'Audio') {
                $('.post-audio').show();
            } else {
                $('.post-audio').hide();
            }

            if (format == 'Video') {
                $('.post-video').show();
            } else {
                $('.post-video').hide();
            }
        });

        /**
         * Blog Post Featured Image Load 
         */
        $(document).on('change', '#post_feat_image', function (e) {
            e.preventDefault();

            let file_url = URL.createObjectURL(e.target.files[0]);
            $('img#post_feat_image_load').attr('src', file_url);
        });

        /**
         * Blog Post Gallery Image Load
         */
        $(document).on('change', '#post_gall_image', function (e) {
            let img_gall = '';
            for (let i = 0; i < e.target.files.length; i++ ){
                let file_url = URL.createObjectURL(e.target.files[i]);

                img_gall += '<img class="shadow" style="width: 150px; height: 150px; border: 1px solid #ccc; border-radius: 4px; margin: 0 5px;" src="' + file_url +'" >';
            }

            $('.post-gallery-img').html(img_gall);
        });
        
        /**
         * Blog Post Status Update
         */
        $(document).on('change', '.post_switcher', function () {
            let checked = $(this).attr('checked');

            let post_id = $(this).attr('post_id');

            if (checked == 'checked' ){
                $.ajax({
                    url: '/post-status-update/' + post_id,
                    success: function (data) {
                        swal('Post Inactivated Successfull!');
                    }
                });
            }else{
                $.ajax({
                    url: '/post-status-update/' + post_id,
                    success: function (data) {
                        swal('Post Activated Successfull!');
                    }
                });
            }

        });

        /**
         * Admin Menu Manage
         */
        $('#sidebar-menu ul li ul li.ok').parent('ul').slideDown();
        $('#sidebar-menu ul li ul li.ok a').css('color', '#20e3ff');
        $('#sidebar-menu ul li ul li.ok').parent('ul').parent('li').children('a').css('background-color', '#19c1dc');
        $('#sidebar-menu ul li ul li.ok').parent('ul').parent('li').children('a').addClass('subdrop');

        /**
         * Role Update
         */
        $(document).on('click', '#edit_role', function(e){
            e.preventDefault();
            let edit_id = $(this).attr('edit_id');
            
            $.ajax({
                url: '/edit-role/' + edit_id,
                dataType: "json",
                success: function(data){
                    $('#edit_role_modal input[name="id"]').val(data.id);
                    $('#edit_role_modal input[name="name"]').val(data.name);
                    $('#edit_role_modal').modal('show');
                }
            }); 
        });

    });
})(jQuery)