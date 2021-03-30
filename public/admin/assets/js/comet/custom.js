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



    });
})(jQuery)