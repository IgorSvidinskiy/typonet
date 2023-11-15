const select = document.createElement('select');
select.classList.add('dropdown');

const option1 = document.createElement('option');
option1.text = 'Очень длинный текст для проверки переноса слов в выпадающем списке';

const option2 = document.createElement('option'); 
option2.text = 'Еще один вариант';

select.appendChild(option1);
select.appendChild(option2);

document.addEventListener('DOMContentLoaded', () => { document.body.appendChild(select); })