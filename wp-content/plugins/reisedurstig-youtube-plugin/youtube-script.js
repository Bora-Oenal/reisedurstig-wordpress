// YouTube API-Schlüssel
// const API_KEY = 'API_KEY';
// YouTube Kanal-ID
const CHANNEL_ID = 'CHANNEL_ID';
// Anzahl der anzuzeigenden Videos
const MAX_RESULTS = 4;

// API-Anfrage zur Abfrage der Videos
const apiUrl = `https://www.googleapis.com/youtube/v3/search?key=${API_KEY}&channelId=${CHANNEL_ID}&order=date&part=snippet&type=video&maxResults=${MAX_RESULTS}`;

// Funktion zum Laden der Videos
async function loadVideos() {
    const response = await fetch(apiUrl);
    const data = await response.json();
    
    const videoContainer = document.getElementById('video-container');
    
    data.items.forEach((item, index) => {
        const videoCard = document.createElement('div');
        if (index === 0) {
            videoCard.className = 'video-card large';
        } else {
            videoCard.className = 'video-card small card video-card box-height';
        }
    
        const videoThumbnail = document.createElement('img');
        videoThumbnail.src = item.snippet.thumbnails.medium.url;
    
        const videoLink = document.createElement('a');
        videoLink.href = `https://www.youtube.com/watch?v=${item.id.videoId}`;
        videoLink.target = '_blank';
        videoLink.appendChild(videoThumbnail);
        videoLink.classList.add('a-img');
    
        videoCard.appendChild(videoLink);
    
        // Überschrift verlinken
        const videoTitle = document.createElement(index === 0 ? 'h2' : 'h3');
        const videoTitleLink = document.createElement('a'); // Neues Link-Element für die Überschrift
        videoTitleLink.href = `https://www.youtube.com/watch?v=${item.id.videoId}`;
        videoTitleLink.target = '_blank';
        videoTitleLink.textContent = item.snippet.title;
        videoTitle.appendChild(videoTitleLink);
    
        if (index === 0) {
            videoTitle.classList.add('youtube-title-h2');
        } else {
            videoTitle.classList.add('youtube-title-h3');
        }
    
        videoCard.appendChild(videoTitle);
    
        videoContainer.appendChild(videoCard);
    });
    
}


loadVideos();
