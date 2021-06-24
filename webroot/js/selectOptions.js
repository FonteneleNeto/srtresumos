$(document).ready(function() {
    $('#pracas-ids').select2(
        {
            placeholder: "Selecione praça(s)",
            allowClear: true
        }
    );
    $('#users-ids').select2(
        {
            placeholder: "Selecione usuário(s)",
            allowClear: true,
        }
    );
    $('#role').select2();
});
