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

// Initialize level
$level = "";

// Split text into array to determine the current test and question
$answers = explode("*", $text);
$numAnswers = count($answers);

if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response  = "CON Welcome to The Heal Space \n Choose a Test you want to take \n \n";
    $response .= "1) Depression Test \n";
    $response .= "2) Anxiety Test \n";
    $response .= "3) PTSD(Post Traumatic Stress Disorder)\n";

} else if ($answers[0] == "1") {
    // Depression Test
    if ($numAnswers == 1) {
        $response = "CON Over the last 2 weeks, how often have you been \n";
        $response .= "bothered by any of the following problems?\n\n";
        $response .= "1. Little interest or pleasure in doing things\n";
        $response .= "0) Not at all \n";
        $response .= "1) Several days \n";
        $response .= "2) More than half the days\n";
        $response .= "3) Nearly every day\n";
    } else {
        // Accumulate result based on previous answers
        $result = array_sum(array_slice($answers, 1));

        if ($numAnswers == 2) {
            $response = "CON 2. Feeling down, depressed, or hopeless\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) Several days \n";
            $response .= "2) More than half the days\n";
            $response .= "3) Nearly every day\n";
        } else if ($numAnswers == 3) {
            $response = "CON 3. Trouble falling or staying asleep, or sleeping too much\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) Several days \n";
            $response .= "2) More than half the days\n";
            $response .= "3) Nearly every day\n";
        } else if ($numAnswers == 4) {
            $response = "CON 4. Feeling tired or having little energy\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) Several days \n";
            $response .= "2) More than half the days\n";
            $response .= "3) Nearly every day\n";
        } else if ($numAnswers == 5) {
            $response = "CON 5. Poor appetite or overeating\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) Several days \n";
            $response .= "2) More than half the days\n";
            $response .= "3) Nearly every day\n";
        } else if ($numAnswers == 6) {
            $response = "CON 6. Feeling bad about yourself — or that you are a failure or have let yourself or your family down\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) Several days \n";
            $response .= "2) More than half the days\n";
            $response .= "3) Nearly every day\n";
        } else if ($numAnswers == 7) {
            $response = "CON 7. Trouble concentrating on things, such as reading the newspaper or watching television\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) Several days \n";
            $response .= "2) More than half the days\n";
            $response .= "3) Nearly every day\n";
        } else if ($numAnswers == 8) {
            $response = "CON 8. Moving or speaking so slowly that other people could have noticed? Or the opposite — being so fidgety or restless that you have been moving around a lot more than usual\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) Several days \n";
            $response .= "2) More than half the days\n";
            $response .= "3) Nearly every day\n";
        } else if ($numAnswers == 9) {
            $response = "CON 9. Thoughts that you would be better off dead, or of hurting yourself\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) Several days \n";
            $response .= "2) More than half the days\n";
            $response .= "3) Nearly every day\n";
        } else if ($numAnswers == 10) {
            $response = "CON 10. If you've had any of these problems, how difficult have they made it for you to do your work, take care of things at home, or get along with other people?\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) Several days \n";
            $response .= "2) More than half the days\n";
            $response .= "3) Nearly every day\n";
        } else if ($numAnswers == 11) {
            // Calculate depression level
            if ($result < 5) {
                $level = "Minimal depression\n";
                $tips="1.Maintain a regular sleep schedule\n
                2.Engage in physical activities daily\n
                3.Eat a balanced diet rich in nutrients\n
                4.Stay connected with loved ones\n
                5.Practice mindfulness and relaxation techniques.";
            } else if ($result < 10) {
                $level = "Mild depression\n";
                $tips="1.Track your mood changes in a journal\n.
                2.Incorporate stress-reducing activities into your routine\n.
                3.Spend time in nature whenever possible\n.
                4.Engage in hobbies that you enjoy\n.
                5.Talk about your feelings with a trusted person\n.";
            } else if ($result < 15) {
                $level = "Moderate depression\n";
                $tips="1.Consider talking to a healthcare provider or therapist\n
                        2.Practice regular meditation or yoga\n
                        3.Set realistic goals for yourself each day\n
                        4.Join a support group for people with similar experiences\n
                        5.Focus on positive self-talk and affirmations\n";
            } else if ($result < 20) {
                        $level = "Moderately severe depression\n";
                        $tips ="1.Seek support from a mental health professional immediately.\n
                        2.Reach out to friends or family for support.\n
                        3.Engage in regular physical activity to improve mood.\n
                        4.Avoid alcohol and recreational drugs.\n
                        5.Establish a daily routine to add structure to your day.\n";
                    }
            else {
                $level = "Severe depression\n";
                $tips="1.Immediate professional help is highly recommended.\n
                2.Do not hesitate to call emergency services if needed.\n
                3.Stay connected with a support network.\n
                4.Practice deep breathing and relaxation techniques.\n
                5.Avoid isolation; stay in touch with loved ones.\n" ;
            }
            $response = "END Your total score is $result. You have $level. The following are self help tips\n \n $tips";
        }
    }
} else if ($answers[0] == "2") {
    // Anxiety Test (GAD-7)
    if ($numAnswers == 1) {
        $response = "CON Over the last 2 weeks, how often have you been \n";
        $response .= "bothered by the following problems?\n\n";
        $response .= "1. Feeling nervous, anxious, or on edge\n";
        $response .= "0) Not at all \n";
        $response .= "1) Several days \n";
        $response .= "2) More than half the days\n";
        $response .= "3) Nearly every day\n";
    } else {
        // Accumulate result based on previous answers
        $result = array_sum(array_slice($answers, 1));

        if ($numAnswers == 2) {
            $response = "CON 2. Not being able to stop or control worrying\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) Several days \n";
            $response .= "2) More than half the days\n";
            $response .= "3) Nearly every day\n";
        } else if ($numAnswers == 3) {
            $response = "CON 3. Worrying too much about different things\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) Several days \n";
            $response .= "2) More than half the days\n";
            $response .= "3) Nearly every day\n";
        } else if ($numAnswers == 4) {
            $response = "CON 4. Trouble relaxing\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) Several days \n";
            $response .= "2) More than half the days\n";
            $response .= "3) Nearly every day\n";
        } else if ($numAnswers == 5) {
            $response = "CON 5. Being so restless that it is hard to sit still\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) Several days \n";
            $response .= "2) More than half the days\n";
            $response .= "3) Nearly every day\n";
        } else if ($numAnswers == 6) {
            $response = "CON 6. Becoming easily annoyed or irritable\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) Several days \n";
            $response .= "2) More than half the days\n";
            $response .= "3) Nearly every day\n";
        } else if ($numAnswers == 7) {
            $response = "CON 7. Feeling afraid as if something awful might happen\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) Several days \n";
            $response .= "2) More than half the days\n";
            $response .= "3) Nearly every day\n";
        } else if ($numAnswers == 8) {
            $response = "CON If you've had any of these problems, how difficult have they made it for you to do your work, take care of things at home, or get along with other people?\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) Several days \n";
            $response .= "2) More than half the days\n";
            $response .= "3) Nearly every day\n";
        } else if ($numAnswers == 9) {
            // Calculate anxiety level
            if ($result < 5) {
                $level = "Minimal anxiety\n";
                $tips="1.Maintain a balanced diet and regular exercise.\n
                2.Practice mindfulness and meditation.\n
                3.Stay socially connected with friends and family.\n
                4.Engage in hobbies and activities you enjoy.\n
                5.Ensure you get enough sleep each night.\n";

            } else if ($result < 10) {
                $level = "Mild anxiety\n";
                $tips="1.Incorporate stress-relieving activities like yoga or walking.\n
                2.Talk to someone you trust about your feelings.\n
                3.Limit caffeine and alcohol intake.\n
                4.Practice deep breathing exercises.\n
                5.Set aside time for relaxation and self-care.\n";

            } else if ($result < 15) {
                $level = "Moderate anxiety\n";
                $tips="1.Consider speaking with a mental health professional.\n
                2.Keep a journal to track your thoughts and feelings.\n
                3.Develop a routine that includes relaxation techniques.\n
                4.Join a support group for anxiety.\n
                5.Focus on maintaining a healthy work-life balance.\n";

            } else {
                $level = "Severe anxiety\n";
                $tips="1.Seek support from a mental health professional immediately.\n
                2.Join a chat room or support group for more help.\n
                3.Practice regular physical activity to reduce stress.\n
                4.Explore relaxation techniques like progressive muscle relaxation.\n
                5.Avoid substances that can increase anxiety, such as caffeine.\n";

            }
            $response = "END Your total score is $result. You have $level. The following are self help tips \n\n $tips";
        }
    }
} else if ($answers[0] == "3") {
    // PTSD Test (PCL-5)
    if ($numAnswers == 1) {
        $response = "CON In the past month, how much were you bothered by: \n\n";
        $response .= "1. Repeated, disturbing memories, thoughts, or images of a stressful experience?\n";
        $response .= "0) Not at all \n";
        $response .= "1) A little bit \n";
        $response .= "2) Moderately \n";
        $response .= "3) Quite a bit \n";
        $response .= "4) Extremely \n";
    } else {
        // Accumulate result based on previous answers
        $result = array_sum(array_slice($answers, 1));

        if ($numAnswers == 2) {
            $response = "CON 2. Repeated, disturbing dreams of a stressful experience?\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) A little bit \n";
            $response .= "2) Moderately \n";
            $response .= "3) Quite a bit \n";
            $response .= "4) Extremely \n";
        } else if ($numAnswers == 3) {
            $response = "CON 3. Suddenly acting or feeling as if a stressful experience were happening again (as if you were actually back there)?\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) A little bit \n";
            $response .= "2) Moderately \n";
            $response .= "3) Quite a bit \n";
            $response .= "4) Extremely \n";
        } else if ($numAnswers == 4) {
            $response = "CON 4. Feeling very upset when something reminded you of a stressful experience?\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) A little bit \n";
            $response .= "2) Moderately \n";
            $response .= "3) Quite a bit \n";
            $response .= "4) Extremely \n";
        } else if ($numAnswers == 5) {
            $response = "CON 5. Having physical reactions (e.g., heart pounding, trouble breathing, sweating) when something reminded you of a stressful experience?\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) A little bit \n";
            $response .= "2) Moderately \n";
            $response .= "3) Quite a bit \n";
            $response .= "4) Extremely \n";
        } else if ($numAnswers == 6) {
            $response = "CON 6. Avoiding memories, thoughts, or feelings related to a stressful experience?\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) A little bit \n";
            $response .= "2) Moderately \n";
            $response .= "3) Quite a bit \n";
            $response .= "4) Extremely \n";
        } else if ($numAnswers == 7) {
            $response = "CON 7. Avoiding external reminders (e.g., people, places, conversations, activities, objects, or situations) that arouse memories, thoughts, or feelings about a stressful experience?\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) A little bit \n";
            $response .= "2) Moderately \n";
            $response .= "3) Quite a bit \n";
            $response .= "4) Extremely \n";
        } else if ($numAnswers == 8) {
            $response = "CON 8. Trouble remembering important parts of a stressful experience?\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) A little bit \n";
            $response .= "2) Moderately \n";
            $response .= "3) Quite a bit \n";
            $response .= "4) Extremely \n";
        } else if ($numAnswers == 9) {
            $response = "CON 9. Having strong negative beliefs about yourself, other people, or the world (e.g., having thoughts such as: I am bad, there is something seriously wrong with me, no one can be trusted, the world is completely dangerous)?\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) A little bit \n";
            $response .= "2) Moderately \n";
            $response .= "3) Quite a bit \n";
            $response .= "4) Extremely \n";
        } else if ($numAnswers == 10) {
            $response = "CON 10. Blaming yourself or someone else for the stressful experience or what happened after it?\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) A little bit \n";
            $response .= "2) Moderately \n";
            $response .= "3) Quite a bit \n";
            $response .= "4) Extremely \n";
        } else if ($numAnswers == 11) {
            $response = "CON 11. Having strong negative feelings such as fear, horror, anger, guilt, or shame?\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) A little bit \n";
            $response .= "2) Moderately \n";
            $response .= "3) Quite a bit \n";
            $response .= "4) Extremely \n";
        } else if ($numAnswers == 12) {
            $response = "CON 12. Loss of interest in activities that you used to enjoy?\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) A little bit \n";
            $response .= "2) Moderately \n";
            $response .= "3) Quite a bit \n";
            $response .= "4) Extremely \n";
        } else if ($numAnswers == 13) {
            $response = "CON 13. Feeling distant or cut off from other people?\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) A little bit \n";
            $response .= "2) Moderately \n";
            $response .= "3) Quite a bit \n";
            $response .= "4) Extremely \n";
        } else if ($numAnswers == 14) {
            $response = "CON 14. Trouble experiencing positive feelings (e.g., being unable to feel happiness or have loving feelings for people close to you)?\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) A little bit \n";
            $response .= "2) Moderately \n";
            $response .= "3) Quite a bit \n";
            $response .= "4) Extremely \n";
        } else if ($numAnswers == 15) {
            $response = "CON 15. Irritable behavior, angry outbursts, or acting aggressively?\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) A little bit \n";
            $response .= "2) Moderately \n";
            $response .= "3) Quite a bit \n";
            $response .= "4) Extremely \n";
        } else if ($numAnswers == 16) {
            $response = "CON 16. Taking too many risks or doing things that could cause you harm?\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) A little bit \n";
            $response .= "2) Moderately \n";
            $response .= "3) Quite a bit \n";
            $response .= "4) Extremely \n";
        } else if ($numAnswers == 17) {
            $response = "CON 17. Being “superalert” or watchful or on guard?\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) A little bit \n";
            $response .= "2) Moderately \n";
            $response .= "3) Quite a bit \n";
            $response .= "4) Extremely \n";
        } else if ($numAnswers == 18) {
            $response = "CON 18. Feeling jumpy or easily startled?\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) A little bit \n";
            $response .= "2) Moderately \n";
            $response .= "3) Quite a bit \n";
            $response .= "4) Extremely \n";
        } else if ($numAnswers == 19) {
            $response = "CON 19. Having difficulty concentrating?\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) A little bit \n";
            $response .= "2) Moderately \n";
            $response .= "3) Quite a bit \n";
            $response .= "4) Extremely \n";
        } else if ($numAnswers == 20) {
            $response = "CON 20. Trouble falling or staying asleep?\n\n";
            $response .= "0) Not at all \n";
            $response .= "1) A little bit \n";
            $response .= "2) Moderately \n";
            $response .= "3) Quite a bit \n";
            $response .= "4) Extremely \n";
        } else if ($numAnswers == 21) {
            // Calculate PTSD level
            if ($result < 20) {
                $level = "No or minimal PTSD\n";
                $tips = "1.Maintain a regular sleep schedule.\n
                2.Engage in physical activities daily.\n
                3.Eat a balanced diet rich in nutrients.\n
                4.Stay connected with loved ones.\n
                5.Practice mindfulness and relaxation techniques.";

            } else if ($result < 40) {
                $level = "Mild PTSD\n";
                $tips ="1.Track your mood changes in a journal.\n
                2.Incorporate stress-reducing activities into your routine.\n
                3.Spend time in nature whenever possible.\n
                4.Engage in hobbies that you enjoy.\n
                5.Talk about your feelings with a trusted person.";

            } else if ($result < 60) {
                $level = "Moderate PTSD\n";
                $tips = "1.Consider talking to a healthcare provider or therapist.\n
                2.Practice regular meditation or yoga.\n
                3.Set realistic goals for yourself each day.\n
                4.Join a support group for people with similar experiences.\n
                5.Focus on positive self-talk and affirmations.";

            } else {
                $level = "Severe PTSD\n";
                $tips = "1.Immediate professional help is highly recommended.\n
                2.Do not hesitate to call emergency services if needed.\n
                3.Stay connected with a support network.\n
                4.Practice deep breathing and relaxation techniques.\n
                5.Avoid isolation; stay in touch with loved ones.";

            }
            $response = "END Your total score is $result. You have $level. The following are self help Tips\n\n $tips";
        }
    }
}

// Echo the response back to the API
header('Content-type: text/plain');
echo $response;
?>
