<?php

include_once __DIR__ . "/../Repository/FeedbackRepository.php";

class FeedbackService
{
    public function addFeedback($user_id, $description)
    {  
        $feedbackRepository = new FeedbackRepository();

        return $feedbackRepository->addFeedback($user_id, $description);
    }

    public function getFeedback()
    {
        $feedbackRepository = new FeedbackRepository();
        return $feedbackRepository->getFeedback();
    }
}