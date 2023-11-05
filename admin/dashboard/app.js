function sortTable(columnIndex, dataType) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.querySelector("table");
    switching = true;
    dir = 'asc';

    while (switching) {
      switching = false;
      rows = table.rows;

      for (i = 1; i < (rows.length - 1); i++) {
        shouldSwitch = false;
        x = rows[i].getElementsByTagName("TD")[columnIndex];
        y = rows[i + 1].getElementsByTagName("TD")[columnIndex];

        if (dir === "asc") {
          if (compareValues(getCellValue(x, dataType), getCellValue(y, dataType)) > 0) {
            shouldSwitch = true;
            break;
          }
        } else if (dir === "desc") {
          if (compareValues(getCellValue(x, dataType), getCellValue(y, dataType)) < 0) {
            shouldSwitch = true;
            break;
          }
        }
      }

      if (shouldSwitch) {
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        switchcount++;
      } else {
        if (switchcount === 0 && dir === "asc") {
          dir = "desc";
          switching = true;
        }
      }
    }

    resetHeaderClasses();
    var th = table.getElementsByTagName("TH")[columnIndex];
    th.classList.add(dir);
  }

  function getCellValue(cell, dataType) {
    var value = cell.textContent || cell.innerText;

    if (dataType === 'numeric') {
      return parseFloat(value.replace(/[^\d.-]/g, ''));
    } else {
      return value.toLowerCase();
    }
  }

  function compareValues(value1, value2) {
    if (value1 < value2) {
      return -1;
    } else if (value1 > value2) {
      return 1;
    } else {
      return 0;
    }
  }

  function resetHeaderClasses() {
    var headers = document.querySelectorAll(".sortable-header");

    for (var i = 0; i < headers.length; i++) {
      headers[i].classList.remove("asc");
      headers[i].classList.remove("desc");
    }
  }



  function toggleMenu(rowId) {
    event.preventDefault();
    var menu = document.getElementById("menutab-" + rowId);
    menu.classList.toggle("show");
}

function modifier(rowId) {
  // Redirection vers le formulaire de modification avec l'ID de la ligne
  window.location.href = 'modifier_ligne.php?id=' + rowId;
}

function supprimerCouteau(rowId) {
  if (confirm("Êtes-vous sûr de vouloir supprimer cette ligne ?")) {
      // Appel à un fichier PHP pour supprimer la ligne de la base de données
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              // Traitement après la suppression réussie
              alert("Ligne supprimée avec succès !");
              // Actualiser la page ou faire d'autres opérations nécessaires
              location.reload();
          }
      };
      xmlhttp.open("GET", "supprimer_ligne.php?id=" + rowId, true);
      xmlhttp.send();
  }
}

function supprimerPhoto(rowId) {
  if (confirm("Êtes-vous sûr de vouloir supprimer cette ligne ?")) {
      // Appel à un fichier PHP pour supprimer la ligne de la base de données
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              // Traitement après la suppression réussie
              alert("Ligne supprimée avec succès !");
              // Actualiser la page ou faire d'autres opérations nécessaires
              location.reload();
          }
      };
      xmlhttp.open("GET", "supprimer_ligne2.php?id=" + rowId, true);
      xmlhttp.send();
  }
}


function voir(rowId) {
    alert("Voir la ligne avec l'ID : " + rowId);
}

// Fonction pour fermer les menus ouverts lorsqu'on clique en dehors
window.addEventListener('click', function(event) {
    if (!event.target.matches('.action-icone')) {
        var menus = document.getElementsByClassName('menu-tab');
        for (var i = 0; i < menus.length; i++) {
            var menu = menus[i];
            if (menu.classList.contains('show')) {
                menu.classList.remove('show');
            }
        }
    }
});

  
  