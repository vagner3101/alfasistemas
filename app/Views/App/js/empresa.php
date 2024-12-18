<script>
    $(document).ready(function() {

        // Máscaras
        $('#cep').mask('00000-000');
        $('#whatsapp').mask('(00) 00000-0000');
        $('#email').mask("A", {
            translation: {
                "A": {
                    pattern: /[\w@\-.+]/,
                    recursive: true
                }
            }
        });
        $('#website').mask("A", {
            translation: {
                "A": {
                    pattern: /[\w\-.]/,
                    recursive: true
                }
            }
        });
        $('#dominio').mask("A", {
            translation: {
                "A": {
                    pattern: /[\w\-.]/,
                    recursive: true
                }
            }
        });

        // Função para alternar entre CPF e CNPJ
        function toggleCpfCnpj() {
            var tipoPessoa = $('input[name="tipo_empresa"]:checked').val();
            var $cpfCnpjLabel = $('label[for="cpf_cnpj"]');
            var $cpfCnpjInput = $('#cpf_cnpj');

            if (tipoPessoa === 'PF') {
                $cpfCnpjLabel.text('CPF');
                $cpfCnpjInput.mask('000.000.000-00');
            } else {
                $cpfCnpjLabel.text('CNPJ');
                $cpfCnpjInput.mask('00.000.000/0000-00');
            }
        }

        // Chamar a função inicialmente e sempre que o tipo de empresa mudar
        toggleCpfCnpj();
        $('input[name="tipo_empresa"]').change(toggleCpfCnpj);

        // Consulta CEP
        $('#cep').blur(function() {
            var cep = $(this).val().replace(/\D/g, '');
            if (cep.length === 8) {
                $.ajax({
                    url: 'https://viacep.com.br/ws/' + cep + '/json/',
                    dataType: 'json',
                    success: function(data) {
                        if (!data.erro) {
                            $('#rua').val(data.logradouro);
                            $('#bairro').val(data.bairro);
                            $('#cidade').val(data.localidade);
                            $('#estado').val(data.uf);
                        } else {
                            // CEP não encontrado
                            Swal.fire({
                                icon: 'error',
                                title: 'CEP não encontrado',
                                text: 'O CEP informado não foi encontrado. Por favor, verifique e tente novamente.',
                                confirmButtonText: 'OK'
                            });
                            // Limpa os campos de endereço
                            $('#rua, #bairro, #cidade, #estado').val('');
                        }
                    },
                    error: function() {
                        // Erro na consulta
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro na consulta',
                            text: 'Houve um erro ao consultar o CEP. Por favor, tente novamente mais tarde.',
                            confirmButtonText: 'OK'
                        });
                        // Limpa os campos de endereço
                        $('#rua, #bairro, #cidade, #estado').val('');
                    }
                });
            } else if (cep.length > 0) {
                // CEP inválido
                Swal.fire({
                    icon: 'warning',
                    title: 'CEP inválido',
                    text: 'Por favor, insira um CEP válido com 8 dígitos.',
                    confirmButtonText: 'OK'
                });
                // Limpa os campos de endereço
                $('#rua, #bairro, #cidade, #estado').val('');
            }
        });


        // Validação de email
        $('#email').blur(function() {
            var email = $(this).val();
            var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!regex.test(email)) {
                alert('Por favor, insira um endereço de e-mail válido.');
            }
        });



        // Validação de domínio
        $('#dominio').blur(function() {
            var dominio = $(this).val();
            var regex = /^[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9]\.[a-zA-Z]{2,}$/;
            if (dominio && !regex.test(dominio)) {
                alert('Por favor, insira um domínio válido.');
            }
        });
    });
</script>