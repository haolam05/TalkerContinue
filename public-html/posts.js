var jsPostsContent = document.getElementById("formPostsContent");
var jsPostsSubmit = document.getElementById("formPostsSubmit");
var jsPostsRegexPatternContent = /^[^<>]{1,}$/;

jsPostsSubmit.disabled = true;
jsPostsSubmit.classList.remove("btn-success");
jsPostsSubmit.classList.add("btn-danger");

function jsPostsSubmitEnable() {
	if (jsPostsRegexPatternContent.test(jsPostsContent.value)) {
		jsPostsSubmit.disabled = false;
		jsPostsSubmit.classList.remove("btn-danger");
		jsPostsSubmit.classList.add("btn-success");
	} else {
		jsPostsSubmit.disabled = true;
		jsPostsSubmit.classList.remove("btn-success");
		jsPostsSubmit.classList.add("btn-danger");
	}
}

function jsPostsValidateTextArea(elementId) {
	jsPostsSubmitEnable();
	var element = document.getElementById(elementId);

	if(!jsPostsRegexPatternContent.test(element.value)) {
		if (!document.getElementById(elementId + "InvalidFeedback")) {
			element.classList.add("is-invalid");
			var newElement = document.createElement("div");
			newElement.setAttribute("id", elementId + "InvalidFeedback");
			newElement.classList.add("invalid-feedback");
			var newElementContent = document.createTextNode(jsShowInputFeedback(elementId));
			newElement.appendChild(newElementContent);
			element.parentNode.insertBefore(newElement, element.nextSibling);
		}
	} else {
		if (document.getElementById(elementId + "InvalidFeedback")) {
			document.getElementById(elementId + "InvalidFeedback").parentElement.removeChild(document.getElementById(elementId + "InvalidFeedback"));
		}
		element.classList.remove("is-invalid");
		element.classList.add("is-valid");
  }
}
