document.addEventListener("DOMContentLoaded", () => {
    fetch('novels.json')
        .then(response => response.json())
        .then(data => {
            const container = document.getElementById('novel-container');
            data.forEach(novel => {
                const card = document.createElement('div');
                card.className = 'card';

                const img = document.createElement('img');
                img.src = novel.image;
                img.alt = novel.title;

                const title = document.createElement('h3');
                title.textContent = novel.title;

                const time = document.createElement('p');
                time.textContent = novel.time;

                const link = document.createElement('a');
                link.href = "read.html?novel_link="+novel.link;
                link.textContent = 'قراءة المزيد';

                card.appendChild(img);
                card.appendChild(title);
                card.appendChild(time);
                card.appendChild(link);

                container.appendChild(card);
            });
        })
        .catch(error => console.error('Error fetching the novels:', error));
});