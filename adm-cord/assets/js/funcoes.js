let selectCurso = document.getElementById('curso_id');


selectCurso.onchange = function () {
    let selectDisci = document.getElementById('disci_id');
    let valor = selectCurso.value;

    fetch("./edital/select_disci.php?curso_id=" + valor)
        .then(response => {
            return response.text();
        })
        .then(texto => {
            selectDisci.innerHTML = texto;
        });
}

const fileInput = document.getElementById("pdf");
const fileLabel = document.querySelector(".file");
const characterLimit = 20; // Limite de caracteres a ser exibido

fileInput.addEventListener("change", function() {
  if (fileInput.files.length > 0) {
    const fileName = fileInput.files[0].name;
    if (fileName.length > characterLimit) {
      fileLabel.textContent = fileName.substring(0, characterLimit) + "...";
    } else {
      fileLabel.textContent = fileName;
    }
  } else {
    fileLabel.textContent = "Selecione o PDF";
  }
});