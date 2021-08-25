// this is $feedback_text for 3 inputs of Basics form
function jsShowInputFeedback(elementId) {
    switch (elementId) {
        case "formSettingsBasicsFirstName":
            var feedbackMessage = "First name must be between 3 and 15 characters long and can contain only letters."
            break;

        case "formSettingsBasicsLastName":
            var feedbackMessage = "Last name must be between 3 and 15 characters long and can contain only letters."
            break;

        case "formSettingsBasicsNickName":
            var feedbackMessage = "Nickname must be between 3 and 15 characters long and can contain only letters."
            break;
            
        case "formMessagingRecipient":
            var feedbackMessage = "Choose the email address of the recipient."
            break;

        case "formMessagingContent":
            var feedbackMessage = "Message can not be empty and can not contain '<' or '>' characters."
            break;    

        case "formGroupName":
            var feedbackMessage = "Group name can not be empty and can not contain '<' or '>' characters."
            break;            
    }

    return feedbackMessage;
}