<?php
// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

// Initialize result if it's not set
if (!isset($result)) {
    $result = 0;
}

if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response  = "CON Welcome to The Heal Space \n Choose a Test you want to take \n \n";
    $response .= "1) Depression Test \n";
    $response .= "2) Anxiety Test \n";
    $response .= "3) PTSD(Post Traumatic Stress Disorder)\n";

} else if ($text == "1") {
    // Business logic for first level response
    $response = "CON Over the last 2 weeks, how often have you been \n";
    $response .= "bothered by any of the following problems?\n\n";
    $response .= "1. Little interest or pleasure in doing things\n";
    $response .= "0) Not at all \n";
    $response .= "1) Several days \n";
    $response .= "2) More than half the days\n";
    $response .= "3) Nearly every day\n";

} else {
    // Split text into array to determine the current question and results
    $answers = explode("*", $text);
    $numAnswers = count($answers);

    // Accumulate result based on previous answers
    $result = array_sum(array_slice($answers, 1));

    if ($numAnswers == 2) {
        // Question 2
        $response = "CON 2. Feeling down, depressed, or hopeless\n\n";
        $response .= "0) Not at all \n";
        $response .= "1) Several days \n";
        $response .= "2) More than half the days\n";
        $response .= "3) Nearly every day\n";
    } else if ($numAnswers == 3) {
        // Question 3
        $response = "CON 3. Trouble falling or staying asleep, or sleeping too much\n\n";
        $response .= "0) Not at all \n";
        $response .= "1) Several days \n";
        $response .= "2) More than half the days\n";
        $response .= "3) Nearly every day\n";
    } else if ($numAnswers == 4) {
        // Question 4
        $response = "CON 4. Feeling tired or having little energy\n\n";
        $response .= "0) Not at all \n";
        $response .= "1) Several days \n";
        $response .= "2) More than half the days\n";
        $response .= "3) Nearly every day\n";
    } else if ($numAnswers == 5) {
        // Question 5
        $response = "CON 5. Poor appetite or overeating\n\n";
        $response .= "0) Not at all \n";
        $response .= "1) Several days \n";
        $response .= "2) More than half the days\n";
        $response .= "3) Nearly every day\n";
    } else if ($numAnswers == 6) {
        // Question 6
        $response = "CON 6. Feeling bad about yourself — or that you are a failure or have let yourself or your family down\n\n";
        $response .= "0) Not at all \n";
        $response .= "1) Several days \n";
        $response .= "2) More than half the days\n";
        $response .= "3) Nearly every day\n";
    } else if ($numAnswers == 7) {
        // Question 7
        $response = "CON 7. Trouble concentrating on things, such as reading the newspaper or watching television\n\n";
        $response .= "0) Not at all \n";
        $response .= "1) Several days \n";
        $response .= "2) More than half the days\n";
        $response .= "3) Nearly every day\n";
    } else if ($numAnswers == 8) {
        // Question 8
        $response = "CON 8. Moving or speaking so slowly that other people could have noticed? Or the opposite — being so fidgety or restless that you have been moving around a lot more than usual\n\n";
        $response .= "0) Not at all \n";
        $response .= "1) Several days \n";
        $response .= "2) More than half the days\n";
        $response .= "3) Nearly every day\n";
    } else if ($numAnswers == 9) {
        // Question 9
        $response = "CON 9. Thoughts that you would be better off dead, or of hurting yourself\n\n";
        $response .= "0) Not at all \n";
        $response .= "1) Several days \n";
        $response .= "2) More than half the days\n";
        $response .= "3) Nearly every day\n";
    } else if ($numAnswers == 10) {
        // Question 10
        $response = "CON 10. If you've had any of these problems, how difficult have they made it for you to do your work, take care of things at home, or get along with other people?\n\n";
        $response .= "0) Not difficult at all \n";
        $response .= "1) Somewhat difficult \n";
        $response .= "2) Very difficult \n";
        $response .= "3) Extremely difficult\n";
    } else if ($numAnswers == 11) {
        // All questions answered, show the result
        $response = "END Your total score is $result\n";
    }
}

// Echo the response back to the API
header('Content-type: text/plain');
echo $response;
?>
