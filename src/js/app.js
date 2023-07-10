import example from './modules/example';
// ...

import '../scss/styles.scss';
import navigation from './modules/navigation';
import accordion from './modules/accordion';
import faq from './modules/faq';

document.addEventListener('DOMContentLoaded', () => {
  example();
  navigation();
  accordion();
  faq();

  // ...
});