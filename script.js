document.getElementById('buscar').addEventListener('change', () => {
    const query = document.getElementById('buscar').value;
    fetch(`search.php?q=${query}`)
        .then(response => response.json())
        .then(data => {
            const resultsDiv = document.getElementById('results');
            resultsDiv.innerHTML = '';
            data.articles.forEach(article => {
                const articleDiv = document.createElement('div');
                articleDiv.className = 'grid-item';
                articleDiv.innerHTML = `
                    <a href="article.php?id=${article.id}" style="text-decoration: none; color: inherit;">
                        <img src="${article.image_url}" alt="${article.title}" style="width:100%; height:auto;">
                        <h3>${article.title}</h3>
                        <p>Vendedor: ${article.seller}</p> <!-- Asumiendo que 'seller' es el campo del vendedor -->
                        <p>Precio: ${article.price}</p> <!-- Asumiendo que 'price' es el campo del precio -->
                    </a>
                `;
                resultsDiv.appendChild(articleDiv);
            });
        })
        .catch(error => console.error('Error:', error));
});


data.articles.forEach(article => {
    const articleDiv = document.createElement('div');
    articleDiv.className = 'grid-item';
    articleDiv.innerHTML = `
        <a href="article.php?id=${article.id}">
            <img src="${article.image_url}" alt="${article.title}" style="width:100%; height:auto;">
            <h3>${article.title}</h3>
            <p>${article.content}</p>
        </a>
    `;
    resultsDiv.appendChild(articleDiv);
});

