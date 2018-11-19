import "inputmask/dist/inputmask/dependencyLibs/inputmask.dependencyLib.js";
import Inputmask from "inputmask/dist/inputmask/inputmask";
import Jax from "../../components/jax/jax.js";

function initPhoneField() {
  document.querySelectorAll('[data-phone-field]:not([data-initialized])').forEach((input) => {
    input.dataset.initialized = "true";
    let inputmask = new Inputmask({
      mask: '+7 (999) 999-99-99',
      clearIncomplete: true,
      oncomplete: function () {
        if (this.dataset.leadUrl) {
          let jax = new Jax(this.dataset.leadUrl, 'POST');
          jax.send({
            phone: this.value
          });
        }
      }
    });
    inputmask.mask(input);
  });
}

document.addEventListener("DOMContentLoaded", initPhoneField);
document.addEventListener("DOMContentMutated", initPhoneField);