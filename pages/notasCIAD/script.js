// Elementos principais
const editor = document.getElementById("editor");
const contador = document.getElementById("contador");

/* ===============================
   INSERIR TEXTO DOS SCRIPTS
================================ */
function inserirTexto(texto) {
  editor.value += texto;
  editor.focus();
  atualizarContador();
}

/* ===============================
   LIMPAR RASCUNHO
================================ */
function limpar() {
  if (editor.value.trim() === "") {
    alert("O rascunho já está vazio.");
    return;
  }

  const confirmar = confirm("Deseja realmente limpar todo o rascunho?");
  if (!confirmar) return;

  editor.value = "";
  atualizarContador();
  editor.focus();
}

/* ===============================
   COPIAR TEXTO
================================ */
function copiar() {
  if (editor.value.trim() === "") {
    alert("Não há texto para copiar.");
    return;
  }

  editor.select();
  editor.setSelectionRange(0, 99999); // Compatibilidade mobile
  document.execCommand("copy");

  alert("Texto copiado com sucesso!");
}

/* ===============================
   CONTADOR
================================ */
function atualizarContador() {
  const texto = editor.value;
  const caracteres = texto.length;

  const palavras = texto.trim()
    ? texto.trim().split(/\s+/).length
    : 0;

  contador.textContent =
    `${caracteres} caracteres • ${palavras} palavras`;
}

/* ===============================
   INICIALIZAÇÃO
================================ */
atualizarContador();

