<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Registro de Chamadas</title>

<!-- RAWLINE - Fonte oficial MG -->
<link href="https://fonts.cdnfonts.com/css/rawline" rel="stylesheet">

<!-- Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">


<style>
/* =================== GLOBAL ================= */
*{margin:0;padding:0;box-sizing:border-box;font-family:'Rawline',sans-serif}

body{
    background:#F4F5F8;
    color:#16325C;
}

/* =================== HEADER GOV ================= */
.gov-header{
    background:white;
    border-bottom:6px solid #C63232;
    padding:20px 40px;
}

.gov-header img{
    height:68px;
}

/* =================== PAGE ================= */
.page{
    width:100%;
    max-width:1100px;
    margin:40px auto;
}

/* =================== TÍTULO ================= */
h1{
    font-size:32px;
    color:#16325C;
    display:flex;
    align-items:center;
    gap:10px;
}

h1 .material-icons-outlined{
    font-size:38px;
}

.sub{
    font-size:16px;
    margin:10px 0 30px;
    color:#555;
}

/* =================== CARD ================= */
.card{
    background:white;
    padding:30px;
    border-radius:10px;
    margin-bottom:28px;
    box-shadow:0 2px 10px rgba(0,0,0,.06);
}

/* ==== LEGEND transformado em TITLE ==== */
fieldset{border:none}
legend{
    font-size:20px;
    font-weight:700;
    display:flex;
    align-items:center;
    gap:8px;
    color:#16325C;
    margin-bottom:20px;
}

legend .material-icons-outlined{
    font-size:26px;
}

/* =================== INPUTS ================= */
label{
    font-weight:600;
    font-size:15px;
    margin-bottom:4px;
    display:block;
}

input,textarea,select{
    width:100%;
    border:1px solid #D0D2D6;
    background:#FFF;
    border-radius:8px;
    padding:11px;
    font-size:15px;
    color:#16325C;
    outline:none;
}

textarea{resize:vertical}

/* =================== ROW ================= */
.row{
    display:flex;
    gap:18px;
    margin-bottom:18px;
}

.w-100{flex:100%}
.w-75{flex:75%}
.w-50{flex:50%}
.w-33{flex:33%}
.w-25{flex:25%}
.w-12{flex:12%}

/* =================== RADIO ================= */
.radio-box{
    display:flex;
    gap:16px;
    align-items:center;
}

.radio-box input{
    width:auto;
    accent-color:#16325C;
}

/* =================== BOTAO ================= */
button[type="submit"]{
    background:#16325C;
    border:0;
    padding:14px 28px;
    color:white;
    font-size:16px;
    border-radius:8px;
    margin-top:20px;
    cursor:pointer;
}
button:hover{background:#0D2345}
</style>
</head>

<body>

<header class="gov-header">
    <img src="sisp-logo.png" alt="SISP - Sistema Integrado de Segurança Pública">
</header>




<div class="page">

<h1><span class="material-icons-outlined">call</span> Registro de Chamadas</h1>
<p class="sub">Preencha os dados abaixo para registrar uma nova ocorrência no sistema.</p>


<form action="salvar_formulario.php" method="post">


<!-- ======================= TELEATENDENTE ===================== -->
<div class="card">
<fieldset>
<legend>
<span class="material-icons-outlined">support_agent</span>
Dados do Teleatendente
</legend>


<div class="row">
    <div class="w-33">
        <label>Matrícula</label>
        <input name="matricula">
    </div>

    <div class="w-50">
        <label>Nome</label>
        <input name="nome_teleatendente">
    </div>

    <div class="w-25">
        <label>Data</label>
        <input type="date" name="data_atendimento" id="data">
    </div>

    <div class="w-25">
        <label>Hora</label>
        <input type="time" name="hora_atendimento" id="hora_at">
    </div>
</div>


<div class="row">
    <div class="w-33">
        <label>Iniciativa</label>
        <div class="radio-box">
            <input type="radio" name="iniciativa" value="Sim">Sim
            <input type="radio" name="iniciativa" value="Não">Não
        </div>
    </div>

    <div class="w-33">
        <label>Iniciativa da Viatura</label>
        <div class="radio-box">
            <input type="radio" name="iniciativa_viatura" value="Sim">Sim
            <input type="radio" name="iniciativa_viatura" value="Não">Não
        </div>
    </div>

    <div class="w-33">
        <label>Iniciativa do Servidor</label>
        <div class="radio-box">
            <input type="radio" name="iniciativa_servidor" value="Sim">Sim
            <input type="radio" name="iniciativa_servidor" value="Não">Não
        </div>
    </div>
</div>

</fieldset>
</div>





<!-- ======================= LOCAL ===================== -->
<div class="card">
<fieldset>
<legend>
<span class="material-icons-outlined">place</span>
Local da Chamada
</legend>


<div class="row">
    <div class="w-50">
        <label>Destino da Ocorrência*</label>
        <div class="radio-box">
            <input type="radio" name="destino_servico" value="190">190
            <input type="radio" name="destino_servico" value="197">197
            <input type="radio" name="destino_servico" value="193">193
        </div>
    </div>
</div>

<div class="row">
    <div class="w-75">
        <label>Logradouro</label>
        <input name="logradouro_chamada">
    </div>
    <div class="w-12">
        <label>Número</label>
        <input name="numero_chamada" type="number" pattern="\d*" title="Digite apenas números">
    </div>
    <div class="w-12">
        <label>Complemento</label>
        <input name="complemento_chamada">
    </div>
</div>

<div class="row">
    <div class="w-33"><label>Bairro</label><input name="bairro_chamada"></div>
    <div class="w-33"><label>Município</label><input name="municipio_chamada"></div>
    <div class="w-33"><label>Telefone<input name="telefone_chamada" type="tel" maxlength="15"  title="Digite apenas números"> </div>
</div>

</fieldset>
</div>





<!-- ======================= SOLICITANTE ===================== -->
<div class="card">
<fieldset>
<legend>
<span class="material-icons-outlined">person</span>
Nome do Solicitante
</legend>


<div class="w-100"><label>Nome do Solicitante</label><input name="nome_solicitante"></div>

<div class="row">
    <div class="w-50"><label>Endereço</label><input name="endereco_solicitante"></div>
    <div class="w-25"><label>Número</label><input name="numero_solicitante" type="number"pattern="\d*" title="Digite apenas números"> </div>
    <div class="w-25"><label>Complemento</label><input name="complemento_solicitante"></div>
</div>

<div class="row">
    <div class="w-33"><label>Bairro</label><input name="bairro_solicitante"></div>
    <div class="w-33"><label>Município</label><input name="municipio_solicitante"></div>
    <div class="w-33"><label>Telefone</label><input name="telefone_solicitante" type="tel" maxlength="15"  title="Digite apenas números" ></div>
</div>

<div class="w-100">
    <label>Descrição Natureza Inicial</label>
    <textarea rows="4" name="descricao_natureza"></textarea>
</div>

<div class="row">
    <div class="w-33"><label>Código Natureza</label><input name="codigo_natureza"></div>
</div>


<button type="submit">Salvar Ocorrência</button>

</fieldset>
</div>


</form>
</div>




<script>
// hora e data topo
const data=document.getElementById('data')
const hora_at=document.getElementById('hora_at')
const now=new Date()
data.value=now.toISOString().substring(0,10)
hora_at.value=now.toTimeString().substring(0,5)
</script>

<script>
// Permite digitar apenas números nos campos de telefone / numero de ederenços
document.querySelectorAll('input[name="telefone_chamada"], input[name="telefone_solicitante"],input[name="numero_chamada"], input[name="numero_solicitante"')
.forEach(function(campo){

    const aviso = campo.nextElementSibling; // span logo abaixo

    campo.addEventListener('input', function(){
        this.value = this.value.replace(/[^0-9]/g, ''); // remove tudo que não é número

        
 });

});
</script>


<script>
// Máscara de telefone (99) 99999-9999
function mascaraTelefone(valor) {
    return valor
        .replace(/\D/g, '')                 // Remove tudo que não é número
        .replace(/^(\d{2})(\d)/, '($1) $2') // Adiciona parênteses no DDD
        .replace(/(\d{5})(\d)/, '$1-$2')    // Adiciona hífen
        .substring(0, 15);                  // Limita ao tamanho da máscara
}

document.querySelectorAll('input[name="telefone_chamada"], input[name="telefone_solicitante"]')
.forEach(function(campo){
    campo.addEventListener('input', function(){
        this.value = mascaraTelefone(this.value);
    });
});
</script>
</body>
</html>

