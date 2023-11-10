function loadImageList() {
  let xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById('ListImage').innerHTML = this.responseText;
    } else {
      document.getElementById('ListImage').innerHTML = 'ERREUR DE TRANSMISSION';
    }
  };
  xmlhttp.open('GET', 'GestionImages.php', true);
  xmlhttp.send();
}
function deleteImage(fileName) {
  var confirmation = confirm("Voulez-vous supprimer le fichier " + fileName + " ?");
  if (confirmation) {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        /*loadImageList();*/
      } else {
        alert("La suppression a échoué.");
      }
    };
    xmlhttp.open('POST', 'GestionImages.php', false);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.send('file=' + fileName);
    loadImageList();
  }
}

function uploadImage(formData) {
  let xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      // document.getElementById('resultMessage').innerHTML = this.responseText;
      document.getElementById('imageInput').value = "";
    } else {
      console.log("Erreur : " + this.responseText);
    }
  };
  xmlhttp.open('POST', 'GestionImages.php', false);
  xmlhttp.send(formData);
  loadImageList();
}

function uploadText(formData) {
  let xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      // document.getElementById('resultMessage').innerHTML = this.responseText;
    } else {
      console.log("Erreur : " + this.responseText);
    }
  };
  xmlhttp.open('POST', 'EnregistrementXML.php', false);
  xmlhttp.send(formData);
}

document.addEventListener("DOMContentLoaded", function () {
  loadImageList();

  document.addEventListener("click", function (event) {
    if (event.target.classList.contains("delete-button")) {
      var fileName = event.target.getAttribute("data-file");
      deleteImage(fileName);
    }
  });

  document.getElementById("uploadImage").addEventListener("click", function () {
    var formData = new FormData();
    formData.append("imageInput", document.getElementById("imageInput").files[0]);
    uploadImage(formData);
  });

  document.getElementById("uploadText").addEventListener("click", function () {
    var formData = new FormData();
    formData.append("description", document.getElementById("description").value);
    formData.append("descDetail", document.getElementById("descriptionDetail").value);
    formData.append("prixNuitMoy", document.getElementById("prixNuitMoy").value);
    formData.append("prixNuitHaut", document.getElementById("prixNuitHaut").value);
    formData.append("prixSemMoy", document.getElementById("prixSemMoy").value);
    formData.append("prixSemHaut", document.getElementById("prixSemHaut").value);
    formData.append("prixAnimaux", document.getElementById("prixAnimaux").value);
    formData.append("prixMenage", document.getElementById("prixMenage").value);
    formData.append("prixLocation", document.getElementById("prixLocation").value);
    formData.append("nombrePersonne", document.getElementById("nombrePersonne").value);
    formData.append("nombreChambre", document.getElementById("nombreChambre").value);
    formData.append("nombrePersonneMax", document.getElementById("nombrePersonneMax").value);
    uploadText(formData);
  });

  document.getElementById("uploadCalendar").addEventListener("click", function () {
    var formData = new FormData();
    formData.append("EventsCalendar", document.getElementById("EventsCalendar").value);
    uploadText(formData);
  });
});
function loadCalendar(){
  let xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200) {
      let rootNode = this.responseXML;

      myTab = rootNode.getElementsByTagName('CALENDAR');
      document.getElementById('EventsCalendar').innerHTML = myTab[0].innerHTML;
    }
  }
  xmlhttp.open('GET', './DonneesAffichees.xml', true);
  xmlhttp.send();
}
document.addEventListener("DOMContentLoaded", function () {
  let xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200) {
      let rootNode = this.responseXML;

      let myTab = rootNode.getElementsByTagName('DESCRIPTION');
      document.getElementById('description').innerHTML = myTab[0].innerHTML;

      myTab = rootNode.getElementsByTagName('DESCDETAIL');
      document.getElementById('descriptionDetail').innerHTML = myTab[0].innerHTML;

      myTab = rootNode.getElementsByTagName('PNM');
      document.getElementById('prixNuitMoy').value = myTab[0].innerHTML;

      myTab = rootNode.getElementsByTagName('PNH');
      document.getElementById('prixNuitHaut').value = myTab[0].innerHTML;

      myTab = rootNode.getElementsByTagName('PSM');
      document.getElementById('prixSemMoy').value = myTab[0].innerHTML;

      myTab = rootNode.getElementsByTagName('PSH');
      document.getElementById('prixSemHaut').value = myTab[0].innerHTML;

      myTab = rootNode.getElementsByTagName('PXA');
      document.getElementById('prixAnimaux').value = myTab[0].innerHTML;

      myTab = rootNode.getElementsByTagName('PXM');
      document.getElementById('prixMenage').value = myTab[0].innerHTML;

      myTab = rootNode.getElementsByTagName('PXL');
      document.getElementById('prixLocation').value = myTab[0].innerHTML;

      myTab = rootNode.getElementsByTagName('NBPERS');
      document.getElementById('nombrePersonne').value = myTab[0].innerHTML;

      myTab = rootNode.getElementsByTagName('NBCHAMB');
      document.getElementById('nombreChambre').value = myTab[0].innerHTML;

      myTab = rootNode.getElementsByTagName('NBPERSMAX');
      document.getElementById('nombrePersonneMax').value = myTab[0].innerHTML;

      loadCalendar();
    }
  }
  xmlhttp.open('GET', './DonneesAffichees.xml', true);
  xmlhttp.send();
});

