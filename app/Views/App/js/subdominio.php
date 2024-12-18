<script>
    function validateSubdominio(subdominio) {
        var regex = /^[a-z0-9-]+$/;
        if (!regex.test(subdominio)) {
            return 'O subdomínio pode conter apenas letras minúsculas, números e hífens.';
        }
        if (subdominio.length > 255) {
            return 'O subdomínio não pode ter mais de 255 caracteres.';
        }
        return null;
    }

    function checkSubdominioAvailability(subdominio) {
        $.ajax({
            url: '<?= base_url('app/empresa/checkSubdominio') ?>',
            method: 'GET',
            data: {
                subdominio: subdominio
            },
            dataType: 'json',
            success: function(response) {
                console.log("Resposta do servidor:", response);
                if (response.available) {
                    $('#subdominio-feedback').removeClass('invalid-feedback').addClass('valid-feedback').text(response.message).show();
                    $('#subdominio').removeClass('is-invalid').addClass('is-valid');
                } else {
                    $('#subdominio-feedback').removeClass('valid-feedback').addClass('invalid-feedback').text(response.message).show();
                    $('#subdominio').removeClass('is-valid').addClass('is-invalid');
                }
            },
            error: function(xhr, status, error) {
                $('#subdominio-feedback').removeClass('valid-feedback').addClass('invalid-feedback').text('Erro ao verificar o subdomínio. Por favor, tente novamente.').show();
                $('#subdominio').removeClass('is-valid').addClass('is-invalid');
            }
        });
    }

    $('#subdominio').on('input blur', function() {
        var subdominio = $(this).val().toLowerCase();
        var validationError = validateSubdominio(subdominio);

        if (validationError) {
            $('#subdominio-feedback').removeClass('valid-feedback').addClass('invalid-feedback').text(validationError).show();
            $('#subdominio').removeClass('is-valid').addClass('is-invalid');
        } else if (subdominio.length > 0) {
            checkSubdominioAvailability(subdominio);
        } else {
            $('#subdominio-feedback').hide();
            $('#subdominio').removeClass('is-valid is-invalid');
        }
    });

    // Adicione esta função se você quiser validar o formulário antes do envio
    $('form').on('submit', function(e) {
        var subdominio = $('#subdominio').val().toLowerCase();
        var validationError = validateSubdominio(subdominio);

        if (validationError) {
            e.preventDefault();
            $('#subdominio-feedback').removeClass('valid-feedback').addClass('invalid-feedback').text(validationError).show();
            $('#subdominio').removeClass('is-valid').addClass('is-invalid');
            return false;
        }
    });
</script>