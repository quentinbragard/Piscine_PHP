function todo()
{
    i++;
    var task = window.prompt("Veuillez entrer le libelle de votre prochaine tache", "nouvelle tache");
    var newDiv = document.createElement("div");
    id = "task"+i;
    rem = 'remove('+'"' + id+'"' + ')';
    newDiv.setAttribute("id", id);
    newDiv.setAttribute("onclick", rem);
  // et lui donne un peu de contenu
  var newContent = document.createTextNode(task);
  // ajoute le nœud texte au nouveau div créé
  newDiv.appendChild(newContent);
  
  // ajoute le nouvel élément créé et son contenu dans le DOM
  var currentDiv = document.getElementById("ft_list");
  currentDiv.prepend(newDiv);  
}

function remove(elementId) {
    var answer = window.confirm("Etes-vous sur de vouloir supprimer cette tache?");
    console.log(answer);
    // Removes an element from the document
    if (answer)
        document.getElementById(elementId).remove();
}
