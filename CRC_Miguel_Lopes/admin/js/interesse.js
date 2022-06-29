

//Modal - Pontos de Interesse
var modal = document.getElementById("ModalNora");

//Inserir imagem dentro do modal
var imagem = document.getElementById("imgNora");
var modalImg = document.getElementById("img01");
var legendaText = document.getElementById("legenda");
imagem.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  legendaText.innerHTML = this.alt;
}

// fechar
var span = document.getElementsByClassName("fechar")[0];

// Fechar a imagem
span.onclick = function() { 
  modal.style.display = "none";
}

var modalC = document.getElementById("ModalCapela");


var imgC = document.getElementById("imgCapela");
var modalImgC = document.getElementById("imgC");
var legendaTextC = document.getElementById("legendaC");
imgC.onclick = function(){
  modalC.style.display = "block";
  modalImgC.src = this.src;
  legendaTextC.innerHTML = this.alt;
}

// fechar
var spanC = document.getElementsByClassName("fecharC")[0];

// Fechar a imagem
spanC.onclick = function() { 
  modalC.style.display = "none";
}
