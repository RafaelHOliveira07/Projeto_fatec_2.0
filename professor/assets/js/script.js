// Toggle navbar mobile

const btnMobile = document.getElementById('btn-mobile');

function toggleMenu(event) {
    if(event.type === 'touchstart') event.preventDefault();
    const nav = document.getElementById('nav');
    nav.classList.toggle('active');
    const active = nav.classList.contains('active');
    event.currentTarget.setAttribute('aria-expanded', active);
    if(active) {
        event.currentTarget.setAttribute('aria-label', 'Fechar Menu');
    } else {
        event.currentTarget.setAttribute('aria-label', 'Abrir Menu');
    }
}

btnMobile.addEventListener('click', toggleMenu);
btnMobile.addEventListener('touchstart', toggleMenu);

// Reveal

window.addEventListener('scroll', reveal);

function reveal(){
  var reveals = document.querySelectorAll('.reveal');

  for(var i = 0; i < reveals.length; i++){

    var windowheight = window.innerHeight;
    var revealtop = reveals[i].getBoundingClientRect().top;
    var revealpoint = 5;

    if(revealtop < windowheight - revealpoint){
      reveals[i].classList.add('active');
    }
    else{
      reveals[i].classList.remove('active');
    }
  }
}

// Pesquisa CEP

function limpa_formulário_cep() {
  document.getElementById('endereco').value = ("");
  document.getElementById('cidade').value = ("");
}
function meu_callback(conteudo) {
  if (!("erro" in conteudo)) {
      //Atualiza os campos com os valores.
      document.getElementById('endereco').value = (conteudo.logradouro);
      document.getElementById('bairro').value = (conteudo.bairro);
      document.getElementById('cidade').value = (conteudo.localidade);
      document.getElementById('estado').value = (conteudo.uf);
  }
  else {
      limpa_formulário_cep();
      alert("CEP não encontrado.");
  }
}
function pesquisacep(valor) {
  //Nova variável "cep" somente com dígitos.
  var cep = valor.replace(/\D/g, '');
  //Verifica se campo cep possui valor informado.
  if (cep != "") {
      //Expressão regular para validar o CEP.
      var validacep = /^[0-9]{8}$/;
      //Valida o formato do CEP.
      if (validacep.test(cep)) {
          //Preenche os campos com "..." enquanto consulta webservice.
          document.getElementById('endereco').value = "...";
          document.getElementById('bairro').value = "...";
          document.getElementById('cidade').value = "...";
          document.getElementById('estado').value = "...";
          //Cria um elemento javascript.
          var script = document.createElement('script');
          //Sincroniza com o callback.
          script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';
          //Insere script no documento e carrega o conteúdo.
          document.body.appendChild(script);
      }
      else {
          limpa_formulário_cep();
          alert("Formato de CEP inválido.");
      }
  }
  else {
      limpa_formulário_cep();
  }

}

// Máscaras

const telefone = (event) => {
  let input = event.target
  input.value = telMask(input.value)
}

const telMask = (value) => {
  if (!value) return ""
  value = value.replace(/\D/g, '')
  value = value.replace(/(\d{2})(\d)/, "($1) $2")
  value = value.replace(/(\d)(\d{4})$/, "$1-$2")
  return value
}

const cepreplace = (event) => {
  let input = event.target
  input.value = cepMask(input.value)
}

const cepMask = (value) => {
  if (!value) return ""
  value = value.replace(/\D/g, '')
  value = value.replace(/(\d{5})(\d)/, '$1-$2')
  return value
}

const cpfreplace = (event) => {
  let input = event.target
  input.value = cpfMask(input.value)
}

const cpfMask = (value) => {
  if (!value) return ""
  value = value.replace(/\D/g, '')
  value = value.replace(/(\d{3})(\d)/, "$1.$2")
  value = value.replace(/(\d{3})(\d)/, "$1.$2")
  value = value.replace(/(\d{3})(\d)/, "$1-$2")
  return value
}

const cep = document.getElementById('cep');

cep.addEventListener('input', function () {
  if (cep.value === '') {
      document.getElementById('endereco').value = '';
      document.getElementById('nCasa').value = '';
      document.getElementById('bairro').value = '';
      document.getElementById('cidade').value = '';
      document.getElementById('estado').value = '';
  }
});

// Trocar nome arquivo

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
    fileLabel.textContent = "Selecione";
  }
});

const fileInput2 = document.getElementById("pdf2");
const fileLabel2 = document.querySelector(".file2");
const characterLimit2 = 20; // Limite de caracteres a ser exibido

fileInput2.addEventListener("change", function() {
  if (fileInput2.files.length > 0) {
    const fileName2 = fileInput2.files[0].name;
    if (fileName2.length > characterLimit2) {
      fileLabel2.textContent = fileName2.substring(0, characterLimit2) + "...";
    } else {
      fileLabel2.textContent = fileName2;
    }
  } else {
    fileLabel2.textContent = "Selecione";
  }
});

const fileInput3 = document.getElementById("pdf3");
const fileLabel3 = document.querySelector(".file3");
const characterLimit3 = 20; // Limite de caracteres a ser exibido

fileInput3.addEventListener("change", function() {
  if (fileInput3.files.length > 0) {
    if (fileInput3.files.length === 1) {
      const fileName3 = fileInput3.files[0].name;
      if (fileName3.length > characterLimit3) {
        fileLabel3.textContent = fileName3.substring(0, characterLimit3) + "...";
      } else {
        fileLabel3.textContent = fileName3;
      }
    } else {
      fileLabel3.textContent = fileInput3.files.length + " arquivo(s) selecionado(s)";
    }
  } else {
    fileLabel3.textContent = "Selecione";
  }
});

const fileInputImg = document.getElementById("img-perfil");
const fileLabelImg = document.querySelector(".img-perfil");
const characterLimitImg = 20; // Limite de caracteres a ser exibido

fileInputImg.addEventListener("change", function() {
  if (fileInputImg.files.length > 0) {
    const fileNameImg = fileInputImg.files[0].name;
    if (fileNameImg.length > characterLimitImg) {
      fileLabelImg.textContent = fileNameImg.substring(0, characterLimitImg) + "...";
    } else {
      fileLabelImg.textContent = fileNameImg;
    }
  } else {
    fileLabelImg.textContent = "Alterar foto de perfil";
  }
});

// Confirir senha

function confereSenha() {
  const senha = document.querySelector('input[name=senha]');
  const confirma = document.querySelector('input[name=confirmaSenha]');

  if (confirma.value === senha.value) {
    confirma.setCustomValidity('');
  } else {
    confirma.setCustomValidity('As senhas não conferem'); 
  }
}

// filtro senha

function senhaFiltro() {
  var senha = document.getElementById("senha").value;
  var requisitos = document.getElementById("requisitos").getElementsByTagName("li");

  if (senha.length >= 8) {
    requisitos[0].style.color = "green";
} else {
    requisitos[0].style.color = "red";
}

if (/[A-Z]/.test(senha)) {
    requisitos[1].style.color = "green";
} else {
    requisitos[1].style.color = "red";
}

if (/[a-z]/.test(senha)) {
    requisitos[2].style.color = "green";
} else {
    requisitos[2].style.color = "red";
}

if (/[0-9]/.test(senha)) {
    requisitos[3].style.color = "green";
} else {
    requisitos[3].style.color = "red";
}

if (/[.,!@#$%¨&*()_+=]/.test(senha)) {
    requisitos[4].style.color = "green";
} else {
    requisitos[4].style.color = "red";
}
}