import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

function switch_modal(id,is_show){
  if(is_show){
    document.getElementById(id).classList.remove('hidden');
  } else {
    document.getElementById(id).classList.add('hidden');
  }
}