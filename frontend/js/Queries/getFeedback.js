window.onload = function() {
    const url = "http://newhorizons/backend/Controller/FeedbackController/getFeedback"

    var xhr = new XMLHttpRequest();

    xhr.open("GET", url, true);

    xhr.onload = function() {
        if (this.status == 200) {
            if (JSON.parse(this.responseText)) {
                const feedback = JSON.parse(this.responseText);

                feedback.forEach(element => {
                    
                const feedbackBlock = document.querySelector('.block-feedback');

                const feedbackItem = document.createElement("div");
                feedbackItem.classList.add("container-feedback");
                feedbackItem.innerHTML = `
                    <div class="container-feedback">
                        <p>${element['user_id']['full_name']}</p>
                        <div class="feedback">
                            <p>${element['description']}
                            </p>
                        </div>
                    </div>
                `;

                feedbackBlock.appendChild(feedbackItem);
                });
            }
        }
    }
    xhr.send();
}
