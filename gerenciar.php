<?php
header ('Content-type: text/html; charset=UTF-8');

require 'connection.php';

$qStatus = "SELECT 
                s.idstatus,
                s.status_desc	
            FROM
                status s";


$rFiliais = $gaSql['link']->query($qFiliais);
$rDeptos = $gaSql['link']->query($qDeptos);
$rStatus = $gaSql['link']->query($qStatus);

?>
<html>
    <head>
        <title>Gerenciar Contatos dos Motoristas</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="./css/buttons.css"/>
        <link rel="stylesheet" type="text/css" href="./css/form.css"/>
        <link rel="stylesheet" type="text/css" href="./css/jquery.dataTables_themeroller.css"/>
        <link rel="stylesheet" type="text/css" href="./css/blitzer/jquery-ui-1.10.4.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="./css/jquery.tooltip.css"/>
        <script type="text/javascript" charset="utf-8" src="./js/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" charset="utf-8" src="./js/gerenciar.js"></script>
        <script type="text/javascript" charset="utf-8" src="./js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" charset="utf-8" src="./js/jquery.tooltip.js"></script>
        <script type="text/javascript" charset="utf-8" src="./js/jquery-ui-1.10.4.custom.min.js"></script>
        <script type="text/javascript" charset="utf-8" src="./js/jquery.maskedinput.js"></script>
</head>
    <body class="ex_highlight_row">
        <div id="dialog-form" >
            <p class="fieldTips">Todos os campos com <span id="ast" >*</span> são obrigatórios.</p> 
            <p class="validateTips" style="display: none"></p> 
            <form id="cad_form">
                <fieldset>
                    <input class="in_form" type="hidden" name="id" id="id"/>
                    <label class="lb_form" for="nome">Nome<span id="ast" >*</span></label>
                    <input type="text" name="nome" id="nome" value="" maxlength="150" class="in_form text ui-widget-content ui-corner-all">
                    <label class="lb_form" for="cel_tim">Celular Tim</label>
                    <input type="text" name="cel_tim" id="cel_tim" value="" maxlength="15" class="in_form text ui-widget-content ui-corner-all">                    
                    <label class="lb_form" for="email">Email<span id="ast" >*</span></label>
                    <input type="text" name="email" id="email" value="" maxlength="150" class="in_form text ui-widget-content ui-corner-all">
                    <label class="lb_form" for="status" id="lb_status">Status<span id="ast" >*</span></label>
                    <select name="status" id="status" class="select ui-widget-content ui-corner-all">
                        <?php while($arStatus = mysqli_fetch_array($rStatus)){
                            echo "<option value='{$arStatus['idstatus']}'>".utf8_encode($arStatus['status_desc'])."</option>";
                          } ?>
                    </select>
                </fieldset>
            </form>
        </div>
        
        <div id="dialog-confirm" title="Excluir contato">
         <p id="msg-conf"><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span></p>
        </div>
        
        <div id="dialog-msg" title="Mensagem">
         <p id="msg"><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span></p>
        </div>

        <div id="form_container">
            <div class="form_description">
                <div id="div_img">   
                    <h2>Gerenciar Contatos de Motoristas</h2>
                    <p>Permite listar, inserir, alterar e excluir contatos dos motoristas da Flecha de Prata que são exibidos na intranet.</p>
                    <button id="contatoNovo" name="contatoNovo">Novo Contato</button>
                </div>
            </div>
            <div id="demo" class="div-right">
                <table id="tb_func" class="display" cellpadding="0" cellspacing="0" border="0">
                   <thead>
                        <tr>
                            <th class="large-text">Nome</th>
                            <th class="med-text">Celular Tim</th>
                            <th class="large-text">E-mail</th>
                            <th class="short-text">Status</th>
                            <th class="actions">Ação</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="large-text">Nome</th>
                            <th class="med-text">Celular Tim</th>
                            <th class="large-text">E-mail</th>
                            <th class="short-text">Status</th>
                            <th class="actions">Ação</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </body>
</html>

