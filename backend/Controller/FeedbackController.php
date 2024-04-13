<?php

include_once __DIR__ . "/../Service/FeedbackService.php";
include_once __DIR__ . "/../Middleware/MiddlewareInterface.php";

class FeedbackController implements MiddlewareInterface
{ 
    public function addFeedback($user_id, $description) 
    {
        $feedbackService = new FeedbackService();

        return json_encode($feedbackService->addFeedback($user_id, $description));
    }

    public function getFeedback()
    {
        $feedbackService = new FeedbackService();

        return json_encode($feedbackService->getFeedback());
    }
}