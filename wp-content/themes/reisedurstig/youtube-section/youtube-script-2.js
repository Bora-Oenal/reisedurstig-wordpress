// YouTube API-Schlüssel
// const API_KEY = 'AIzaSyDlDm80fMKSf2xyU49qGbXM4YWBe6qivHU';
// YouTube Kanal-ID
// const CHANNEL_ID = 'UCtpKNaYEVALJr_iT1l5xzVw';

// Funktion zum Laden der Videos
async function loadVideos() {
    const videoContainer = document.getElementById('video-container');
    const apiKey = videoContainer.getAttribute('data-api-key');
    const channelId = videoContainer.getAttribute('data-channel-id');
    console.log('API-Schlüssel:', apiKey);
    const apiUrl = `https://www.googleapis.com/youtube/v3/search?key=${apiKey}&channelId=${channelId}&order=date&part=snippet&type=video&maxResults=${MAX_RESULTS}`;

    try {
        const response = await fetch(apiUrl);
        const data = await response.json();
        
        data.items.forEach((item, index) => {
            const videoCard = document.createElement('div');
            videoCard.className = index === 0 ? 'video-card large' : 'video-card small';

            const videoTitle = document.createElement(index === 0 ? 'h2' : 'h3');
            videoTitle.textContent = item.snippet.title;

            const videoThumbnail = document.createElement('img');
            videoThumbnail.src = item.snippet.thumbnails.medium.url;

            const videoLink = document.createElement('a');
            videoLink.href = `https://www.youtube.com/watch?v=${item.id.videoId}`;
            videoLink.target = '_blank';
            videoLink.appendChild(videoThumbnail);
            videoLink.classList.add('a-img');

            videoCard.appendChild(videoTitle);
            videoCard.appendChild(videoLink);

            videoContainer.appendChild(videoCard);
        });
    } catch (error) {
        console.error('Fehler beim Laden der Videos:', error);
    }
}

loadVideos();
