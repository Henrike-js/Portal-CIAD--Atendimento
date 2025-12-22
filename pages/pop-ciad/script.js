async function loadFiles(category) {
  const list = document.getElementById("file-list")
  list.innerHTML = "<li>Carregando...</li>"

  try {
    const res = await fetch(`listar.php?categoria=${category}`)

    const text = await res.text()

    // DEBUG CRÍTICO
    if (!text.trim().startsWith('[') && !text.trim().startsWith('{')) {
      console.error("Resposta inválida:", text)
      list.innerHTML = "<li>Resposta inválida do servidor</li>"
      return
    }

    const data = JSON.parse(text)
    list.innerHTML = ""

    if (data.erro) {
      list.innerHTML = `<li>Erro: ${data.erro}</li>`
      return
    }

    if (data.length === 0) {
      list.innerHTML = "<li>Nenhum arquivo encontrado</li>"
      return
    }

    data.forEach(file => {
      const li = document.createElement("li")
      const a = document.createElement("a")

      a.href = `PDFS/${category}/${file}`
      a.target = "_blank"
      a.textContent = file

      li.appendChild(a)
      list.appendChild(li)
    })

  } catch (e) {
    console.error(e)
    list.innerHTML = "<li>Erro ao conectar com o servidor</li>"
  }
}

