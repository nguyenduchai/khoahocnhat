// assets/js/watermark.js

(function () {
  const userEmail = window.userEmail || 'user@example.com';

  const createWatermark = () => {
    const wm = document.createElement('div');
    wm.innerText = userEmail;
    wm.style.position = 'fixed';
    wm.style.color = 'rgba(0,0,0,0.1)';
    wm.style.fontSize = '16px';
    wm.style.fontWeight = 'bold';
    wm.style.pointerEvents = 'none';
    wm.style.zIndex = 9999;
    wm.style.transform = 'rotate(-20deg)';
    document.body.appendChild(wm);
    return wm;
  };

  const wm = createWatermark();

  const moveWatermark = () => {
    const x = Math.random() * window.innerWidth;
    const y = Math.random() * window.innerHeight;
    wm.style.left = `${x}px`;
    wm.style.top = `${y}px`;
  };

  setInterval(moveWatermark, 2000);
})();
