<?php
/*
 * Template Name: Apply Page
 */






get_header();?>



<!-- Add the following code to template.php -->

<!-- HTML content -->
<form id="apply-form" action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>" method="post" enctype="multipart/form-data">
    <label>First Name</label>
    <input type="text" name="firstName"><br>
    <label>Last Name</label>
    <input type="text" name="lastName"><br>
    <label>Email</label>
    <input type="text" name="email"><br>
    <label>CV Upload</label>
    <input type="file" name="cv" id="app-cv" tabindex="-1" accept=".wps,.odt,.wpc,.doc,.docx,.rtf,.pdf,.zip,.htm,.html,.asc,.csv,.eml,.msg,.ppt,.ps,.wri,.xls,.xml"><br>
    <input type="hidden" name="action" value="add_cv">
    <input type="submit" value="Submit">
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
jQuery(document).ready(function($) {
    $('#apply-form').submit(function(e) {
        e.preventDefault();
        
        var form = $(this);
        var formData = new FormData(form[0]);
        
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status === 'success') {
                    alert('Application was successfully uploaded');
                } else {
                    alert('An error occurred during form submission. Please try again.');
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
                alert('An error occurred during form submission. Please try again.');
            }
        });
    });
});
</script>

<?php get_footer();
?>
