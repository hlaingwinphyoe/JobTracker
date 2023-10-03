import './bootstrap';

import 'flowbite'

// vue components
import './components/index';

// bootstrap
import * as bootstrap from 'bootstrap';

document.querySelectorAll('.button').forEach(button => button.innerHTML = '<div><span>' + button.textContent.trim().split('').join('</span><span>') + '</span></div>');