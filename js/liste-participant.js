// Fonction pour récupérer les participants depuis le serveur et les afficher dans la liste
function liste() {
    fetch('listing.php')
        .then(response => response.json())
        .then(participants => {
            const participantsList = document.getElementById('participants-list');

            participantsList.innerHTML = '';

            participants.forEach(participant => {
                const participantItem = document.createElement('div');
                participantItem.textContent = `${participant.nom} ${participant.prenom} (${participant.telephone}, ${participant.email})`;
                participantsList.appendChild(participantItem);
            });
        })
        .catch(error => {
            console.error('Une erreur s\'est produite lors de la récupération des participants :', error);
        });
}

// Appeler la fonction au chargement de la page
window.addEventListener('load', liste);
