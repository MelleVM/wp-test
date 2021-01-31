const portfolioPostsBtn = document.getElementById('portfolio-posts-btn')
const portfolioPostsContainer = document.getElementById('portfolio-posts-container')

if(portfolioPostsBtn) {
    // Using ajax method
    portfolioPostsBtn.addEventListener("click", () => {
        $.ajax({
            url: `${WP_DATA.rest_url}wp/v2/projects?`,
            type: "GET",
            contentType: "application/json",
            dataType: 'json',
            success: function(result) {
                createHTML(result)
            }
        })
    })


    // Using fetch method

    //   portfolioPostsBtn.addEventListener('click', (e) => {
    //     e.preventDefault();

    //     fetch(`${WP_DATA.rest_url}wp/v2/posts`).then(response => {
    //       return response.json();
    //     }).then(response => {
    //       createHTML(response)
    //     });
    //   });
}

function createHTML(data) {
    data.map(d => {
        portfolioPostsContainer.innerHTML += `<h1>${d.title.rendered}</h1>`
    })
}

console.log(WP_DATA.rest_url)