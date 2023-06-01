document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('my-form').addEventListener('submit', function (event) {
        var newsTitle = document.getElementById('news_title').value;
        var userId = document.getElementById('user_id').value;
        var imageUrl = document.getElementById('image_url').value;
        var newsBody = document.getElementById('news_body').value;
        var tagName = document.getElementById('tag_name').value;

        var errors = [];

        // Validate news title
        if (newsTitle.trim() === '') {
            errors.push('Please enter a title');
        }

        // Validate journalist ID
        if (userId.trim() === '') {
            errors.push('Please enter a journalist ID');
        }

        // Validate image URL
        if (imageUrl.trim() === '') {
            errors.push('Please enter an image URL');
        } else if (!/^(http:\/\/|https:\/\/)/i.test(imageUrl)) {
            errors.push('Input must be in URL format');
        }


        // Validate article content
        if (newsBody.trim() === '') {
            errors.push('Please enter article content');
        }

        // Validate tag names
        if (tagName.trim() === '') {
            errors.push('Please enter article tags');
        }

        if (errors.length > 0) {
            event.preventDefault(); // Prevent form submission

            // Display error messages
            var errorContainer = document.getElementById('error-container');
            errorContainer.innerHTML = ''; // Clear previous error messages

            errors.forEach(function (error) {
                var errorElement = document.createElement('div');
                errorElement.classList.add('error');
                errorElement.textContent = error;
                errorContainer.appendChild(errorElement);
            });
        }
    });
});

