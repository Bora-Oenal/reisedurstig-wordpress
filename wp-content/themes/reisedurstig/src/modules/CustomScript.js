class ScrollProgressBar {
    constructor() {
      this.progressBar = document.getElementById('progress-bar');
      this.updateProgressBar();
      window.addEventListener('scroll', this.updateProgressBar.bind(this));
    }
  
    updateProgressBar() {
      const scrollPercentage = (window.scrollY / (document.documentElement.scrollHeight - window.innerHeight)) * 100;
      this.progressBar.style.width = `${scrollPercentage}%`;
    }
  }
  
  const progressBarInstance = new ScrollProgressBar();
  
  export default ScrollProgressBar