const portfolioPostsBtn = document.getElementById('portfolio-posts-btn')
const portfolioPostsContainer = document.getElementById('portfolio-posts-container')

if(portfolioPostsBtn) {
    portfolioPostsBtn.addEventListener("click", () => {
        $.ajax({
            url: `${WP_DATA.rest_url}wp/v2/posts`,
            type: "GET",
            contentType: "application/json",
            dataType: 'json',
            success: function(result) {
                createHTML(result)
            }
        })
    })
}

function createHTML(data) {
    data.map(d => {
        portfolioPostsContainer.innerHTML += `<h1>${d.title.rendered}</h1>`
    })
}

console.log(WP_DATA.rest_url)