<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/app.js" defer></script>
    <title>Youtube remake</title>
</head>
<body>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/dQw4w9WgXcQ?si=twI61ZGDECBr4ums" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    <form action="" method="GET">
    <div>
        <input placeholder="Enter Username" type="text" name="name" value = "" required>
    </div>
    <div>
        <input placeholder="Enter Email" type="email" name="email" value= "" required>
    </div>
    <div>
        <textarea name="commentaar" cols="30" rows="10" required></textarea>
    </div>
    <input type="submit"value ="Verzenden">
</form>    
</body>
</html>

<?php
include("config.php");
include("reactions.php");

$reactions = Reactions::getReactions();
$totalReactions = count($reactions);
if (!empty($reactions)) {
    echo "<h2> $totalReactions reactions </h2>";
    foreach ($reactions as $reaction) {
        $formattedDate = explode(' ', $reaction['date_added'])[0]; // dit zorgt dat de tijd niet wordt laten zien bij de datum
        echo "<strong>" . htmlspecialchars($reaction['name']) . "</strong>, "; // de naam en email zijn dikgedrukt.
        echo "<strong>" . htmlspecialchars($reaction['email']) . "</strong>";
        echo "<span style='margin-left: 20px;'>" . htmlspecialchars($formattedDate) . "</span><br>"; // dit laat de datum zien
        echo htmlspecialchars($reaction['message']) . "<br>";
        echo '<img src="assets/img/like.png" alt="like button" class="like-button"  data-id="'.$reaction['id'] . '">'; // dit laat de like afbeeldig zien
        echo '<img src="assets/img/dislike.png" alt="dislike button" class="dislike-button"  data-id="'.$reaction['id'] . '">'. "<br><br>";
    }
} else {
    echo "Nog geen reacties geplaatst.";
}

$getReactions = Reactions::getReactions();

if(!empty($_GET)){ // dit zorgt dat je comment in de database wordt opgeslagen.
    $postArray = [
        'name' => $_GET["name"],
        'email' => $_GET["email"],
        'message' => $_GET["commentaar"]
    ];

    $setReaction = Reactions::setReaction($postArray);

    if(isset($setReaction['error']) && $setReaction['error'] != ''){
        prettyDump($setReaction['error']);
    }
}
?>

