<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Collect and sanitize form data
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $sex = htmlspecialchars($_POST['sex']);
    $phone = htmlspecialchars($_POST['phone']);
    $password = htmlspecialchars($_POST['password1']);

    // Prepare the data to be saved (store as comma-separated values)
    $data = $firstname . "," . $lastname . "," . $sex . "," . $phone . "," . $password . "\n";

    // Open the file in append mode, so new registrations are added to the end
    $file = fopen("registrations.txt", "a");

    if ($file) {
        // Write the data to the file
        fwrite($file, $data);

        // Close the file
        fclose($file);

        // Provide feedback to the user
        echo "Registration successful!";
    } else {
        echo "Unable to register. Please try again.";
    }
}
?>
