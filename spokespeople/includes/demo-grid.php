<?php
error_reporting(2);
$servername = "vdb1b.pair.com";
$username = "working_39";
$password = "rUnnER#69";
$dbname = "working_examples";

// Webm filename mapping for actors with non-standard naming
$webmMap = [
    'Anthony' => 'Anthony.webm',
    'Ben' => 'Ben.webm',
    'Brenton' => 'Brenton.webm',
    'Caden' => 'Caden.webm',
    'Chance' => 'Chance.webm',
    'Chelsey' => 'Chelsey600x900.webm',
    'Daniel' => 'Daniel.webm',
    'Daryl' => 'Daryl.webm',
    'Dave' => 'Dave.webm',
    'Derek' => 'Derek.webm',
    'Dustin' => 'Dustin.webm',
    'Eirik' => 'Eirik.webm',
    'Emi' => 'Emi_1.webm',
    'Frits' => 'Frits.webm',
    'Ilene' => 'ilene600x900.webm',
    'James' => '600x900James.webm',
    'Jed' => 'Jed.webm',
    'Jillian' => 'Jillian600x900.webm',
    'Joe' => 'Joe.webm',
    'Jonny' => 'Jonny.webm',
    'Josh' => 'Josh600x900.webm',
    'Julio' => 'Julio.webm',
    'Kari' => 'Kari600x900.webm',
    'Lonzo' => 'Lonzo.webm',
    'Quinn' => 'Quinn.webm',
    'Regi' => 'Regi.webm',
    'Shanda' => 'Shanda600x900.webm',
    'Tiffany' => 'TIffany_1.webm',
    'Tori' => 'Tori.webm',
    'Walt' => 'Walt.webm',
    'Zeke' => 'Zeke.webm',
    'Angelica' => 'Angelica_2.webm',
    'Denise' => 'Denise_1.webm',
];

$webmBase = "https://talkingheads.com/wp-content/uploads/2025/07/";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$db = mysqli_select_db($conn, $dbname);
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM `spokespeople` WHERE `carousel` = '$carousel' ORDER BY `ordering`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="actor-grid">';

    while ($row = $result->fetch_assoc()) {
        $name = $row["name"];
        // Check for mapped webm filename, otherwise use standard {Name}_1.webm pattern
        if (isset($webmMap[$name])) {
            $webm = $webmBase . $webmMap[$name];
        } else {
            $webm = $webmBase . $name . "_1.webm";
        }
        // Fallback poster image
        $poster = "https://www.websitetalkingheads.com/spokespeople/posters/" . $name . ".jpg";

        echo '<div class="actor-card" data-toggle="modal" data-target=".modal-spokesperson" data-video="' . htmlspecialchars($name) . '" data-alt="' . htmlspecialchars($name) . ' - Video Spokesperson">';
        echo '<div class="actor-card-thumbnail">';
        echo '<video autoplay loop muted playsinline poster="' . $poster . '">';
        echo '<source src="' . $webm . '" type="video/webm">';
        echo '</video>';
        echo '<div class="actor-card-play"></div>';
        echo '</div>';
        echo '<div class="actor-card-info">';
        echo '<h3 class="actor-card-name">' . htmlspecialchars($name) . '</h3>';
        echo '</div>';
        echo '</div>';

        // Schema.org markup
        echo '<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "VideoObject",
    "name": "' . htmlspecialchars($name) . '",
    "description": "' . htmlspecialchars($name) . ' - Introduction Video Spokesperson",
    "thumbnailUrl": "' . $img . '",
    "uploadDate": "2018-11-31T08:00:00+08:00",
    "duration": "PT1M54S",
    "publisher": {
        "@type": "Organization",
        "name": "Website Talking Heads",
        "logo": {
            "@type": "ImageObject",
            "url": "https://www.websitetalkingheads.com/images/Talking_Heads_Banner_Logo.png",
            "width": 247,
            "height": 100
        }
    },
    "contentUrl": "https://www.websitetalkingheads.com/videos/' . htmlspecialchars($name) . '.mp4",
    "embedUrl": "https://www.websitetalkingheads.com/ivideo/videos/' . htmlspecialchars($name) . '"
}
</script>';
    }

    echo '</div>';
} else {
    echo '<p class="text-center text-muted">No spokespeople found.</p>';
}

mysqli_close($conn);
?>
