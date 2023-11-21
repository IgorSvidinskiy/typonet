// Обернем в функцию
function init() {

    // Проверка на существование body
    if(!document.body) {
      console.log('DOM не загружен!');
      return;
    }
  
    // Добавление логотипа
    const logo = document.createElement('img');
    logo.src = 'imgs/logo/1000012685(1)-transformed-u_vlc6LNW-transformed.png';
    logo.width = '110';
    logo.height = '50';
    logo.style.zIndex = '10';
    logo.style.marginLeft = '2.5%';
    logo.style.marginTop = '-4px';
  
    document.body.insertBefore(logo, document.body.firstChild);  
  }
  
  // Вызов функции после загрузки DOM
  document.addEventListener('DOMContentLoaded', init);