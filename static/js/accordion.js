const unsetActive = (elements) => {
  elements.forEach((element) => {
    if (element.classList.contains('active')) {
      element.classList.remove('active');
    }
  });
};

document.addEventListener('DOMContentLoaded', () => {
  const accordElements = document.querySelectorAll('[data-accord-element]');
  const accordLinks = document.querySelectorAll('[data-accord-link]');

  if (accordElements.length > 0 && accordLinks.length > 0) {
    accordLinks.forEach((link) => {
      link.addEventListener('click', (e) => {
        unsetActive(accordElements);
        e.target.closest('[data-accord-element]').classList.add('active');
      });
    });
  }
});