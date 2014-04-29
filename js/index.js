$(document).ready( function () { 
          
    $('#tb_func').dataTable({  
        "bJQueryUI": true,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "datasource_user.php",
        "sPaginationType": "full_numbers",
        "aoColumns": [
            {"mData": "motorista_nome",
            "sClass": "center"},
            {"mData": "motorista_cel",
            "sClass": "center"},
            {"mData": "motorista_email",
            "sClass": "center"}
            
      
        ],
        "aLengthMenu": [
            [25, 25, 75, 100, 125, 150, 175, 200, -1],
            [25, 25, 75, 100, 125, 150, 175, 200, "TODOS"]
        ],
        "iDisplayLength": 25,
        "oLanguage": {
                "sProcessing":   "Processando...",
                "sLengthMenu":   "Mostrar _MENU_ registros",
                "sZeroRecords":  "Não foram encontrados resultados",
                "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                "sInfoFiltered": "(filtrado de _MAX_ registros no total)",
                "sInfoPostFix":  "",
                "sSearch":       "Buscar:",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "Primeiro",
                    "sPrevious": "Anterior",
                    "sNext":     "Seguinte",
                    "sLast":     "Último"
                }
            }
    });                               
} );