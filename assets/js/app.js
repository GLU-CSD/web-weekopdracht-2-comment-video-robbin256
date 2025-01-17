//dit roept de functie aan om de like afbeelding te laten veranderen als je erop klikt
document.querySelectorAll(".like-button").forEach(function(afbeelding) {
    afbeelding.addEventListener("click", veranderLike);
});

function veranderLike(event) {
    var afbeelding = event.target; // Dit is de geklikte afbeelding die je hebt geklikt
    if (afbeelding.src.endsWith("assets/img/like.png")) {
        afbeelding.src = "assets/img/like_clicked.png"; // Verander naar like_clicked
    } else {
        afbeelding.src = "assets/img/like.png"; // Verander terug naar like
    }
}

//dit roept de functie aan om de dislike afbeelding te laten veranderen als je erop klikt.
document.querySelectorAll(".dislike-button").forEach(function(afbeelding){
    afbeelding.addEventListener("click", veranderDislike)
});

function veranderDislike() {
    var afbeelding = event.target;
    if (afbeelding.src.endsWith("assets/img/dislike.png")) {
        afbeelding.src = "assets/img/dislike_clicked.png"; // Verander naar dislike_clicekd
    } else {
        afbeelding.src = "assets/img/dislike.png"; // Verander terug naar dislike
    }
}