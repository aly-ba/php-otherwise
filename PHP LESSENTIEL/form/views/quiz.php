<?php

$quizIsSubmitted = isset( $_POST['quiz-submitted'] );
if ( $quizIsSubmitted ){
    $answer = $_POST['answer'];
    $output = showQuizResponse( $answer );
    //inspect the $_POST superglobal array
    //$output .= "<pre>";
    //$output .= print_r($_POST, true);
    //$output .= "</pre>";
} else {
    $output = include_once "views/quiz-form.php";
}

return $output;

function showQuizResponse( $answer ){
    $response = "<p>You clicked $answer";
    if ( $answer === "yes" ){
        $response .= " - I know exactly how you feel!";
    }  
    $response .= "</p>";
    $response .= "<p>
                  <a href='index.php?page=quiz'>Try quiz again?</a>
            </p>";
    return $response;
}

