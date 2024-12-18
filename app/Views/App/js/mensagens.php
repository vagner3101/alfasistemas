<script>
    document.addEventListener('DOMContentLoaded', function() {
        function showMessage(type, message) {
            let icon, title;
            switch (type) {
                case 'success':
                    icon = 'success';
                    title = 'Sucesso';
                    break;
                case 'error':
                    icon = 'error';
                    title = 'Erro';
                    break;
                case 'info':
                    icon = 'info';
                    title = 'Informação';
                    break;
                case 'warning':
                    icon = 'warning';
                    title = 'Atenção';
                    break;
                default:
                    icon = 'question';
                    title = 'Mensagem';
            }

            Swal.fire({
                icon: icon,
                title: title,
                text: message,
                confirmButtonText: 'OK',
                timer: type === 'success' ? 3000 : undefined,
                timerProgressBar: type === 'success'
            });
        }

        <?php if (session()->has('success')): ?>
            showMessage('success', <?= json_encode(session('success')) ?>);
        <?php endif; ?>

        <?php if (session()->has('error')): ?>
            showMessage('error', <?= json_encode(session('error')) ?>);
        <?php endif; ?>

        <?php if (session()->has('info')): ?>
            showMessage('info', <?= json_encode(session('info')) ?>);
        <?php endif; ?>

        <?php if (session()->has('warning')): ?>
            showMessage('warning', <?= json_encode(session('warning')) ?>);
        <?php endif; ?>
    });
</script>