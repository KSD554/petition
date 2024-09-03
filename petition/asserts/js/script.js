document.addEventListener("DOMContentLoaded", () => {
    const progressBar = document.getElementById("progress-bar");
    const signaturesCountElem = document.getElementById("signatures-count");
    const remainingCountElem = document.getElementById("remaining-count");

    function updateProgress(currentCount, goal) {
        const remaining = goal - currentCount;
        const progressWidth = (currentCount / goal) * 100;

        progressBar.style.width = progressWidth + "%";
        progressBar.textContent = `${currentCount} signatures`;
        signaturesCountElem.textContent = `${currentCount} personnes ont signé`;
        remainingCountElem.textContent = `Il reste ${remaining} signatures pour atteindre l'objectif.`;
    }

    function fetchSignaturesCount() {
        fetch('get_signature.php')
            .then(response => response.json())
            .then(data => {
                if (data.count !== undefined && data.goal !== undefined) {
                    updateProgress(data.count, data.goal);
                }
            })
            .catch(error => console.error('Erreur:', error));
    }

    setInterval(fetchSignaturesCount, 5000); // Actualiser toutes les 5 secondes
});
