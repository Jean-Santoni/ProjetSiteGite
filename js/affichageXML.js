document.addEventListener("DOMContentLoaded", function () {
  let xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200) {
      let rootNode = this.responseXML;

      let myTab = rootNode.getElementsByTagName('DESCRIPTION');
      document.getElementById('DESC').innerHTML = myTab[0].innerHTML.replace(/\n/g, '<br/>');

      myTab = rootNode.getElementsByTagName('DESCDETAIL');
      document.getElementById('introText').innerHTML = myTab[0].innerHTML.replace(/\n/g, '<br/>');

      myTab = rootNode.getElementsByTagName('PNM');
      document.getElementById('nuitMSaison').innerHTML = myTab[0].innerHTML + ' €';

      myTab = rootNode.getElementsByTagName('PNH');
      document.getElementById('nuitHSaison').innerHTML = myTab[0].innerHTML + ' €';

      myTab = rootNode.getElementsByTagName('PSM');
      document.getElementById('semMSaison').innerHTML = myTab[0].innerHTML + ' €';

      myTab = rootNode.getElementsByTagName('PSH');
      document.getElementById('semHSaison').innerHTML = myTab[0].innerHTML + ' €';

      myTab = rootNode.getElementsByTagName('PXA');
      document.getElementById('prixAnimaux').innerHTML = myTab[0].innerHTML + ' €';

      myTab = rootNode.getElementsByTagName('PXM');
      document.getElementById('prixMenage').innerHTML = myTab[0].innerHTML + ' €';

      myTab = rootNode.getElementsByTagName('PXL');
      document.getElementById('prixLinge').innerHTML = myTab[0].innerHTML + ' €';

      myTab = rootNode.getElementsByTagName('NBPERS');
      document.getElementById('nbPers').innerHTML = myTab[0].innerHTML;

      myTab = rootNode.getElementsByTagName('NBCHAMB');
      document.getElementById('nbChambres').innerHTML = myTab[0].innerHTML;

      myTab = rootNode.getElementsByTagName('NBPERSMAX');
      document.getElementById('nbMaxPers').innerHTML = myTab[0].innerHTML;

    }
  }
  xmlhttp.open('GET', './DonneesAffichees.xml', true);
  xmlhttp.send();
});
