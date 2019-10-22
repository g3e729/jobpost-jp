export default function formValidation(form = '.needs-validation') {
  const el = document.querySelector('form');
  const actions = el.querySelectorAll('[data-action]');

  el.addEventListener('submit', function(event) {
    actions.forEach(el => {
      if (el.dataset.action === 'change') {
        el.setCustomValidity(el.value === "" ? el.dataset.text : "");
      } else if (el.dataset.action === 'input') {
        if (el.dataset.condition) {
          const condition = this.querySelector(`[name="${el.dataset.condition}"]`);

          el.setCustomValidity(el.value != condition.value ? el.dataset.text : "");
        } else {
          el.setCustomValidity(el.value === "" ? el.dataset.text : "");
        }
      }
    });

    if (el.checkValidity() === false) {
      event.preventDefault();
      event.stopPropagation();
    } else {
      $(this).unbind('submit').submit();
    }

    el.classList.add('was-validated');
  }, false);
  
  const inputCount = [...actions].reduce((a, b) => { return b.dataset.action === 'input' ? a+1 : a }, 0);
  if (inputCount) {
    el.addEventListener('input', function() {
      actions.forEach(el => {
        if (el.dataset.condition) {
          const condition = this.querySelector(`[name="${el.dataset.condition}"]`);

          el.setCustomValidity(el.value != condition.value ? el.dataset.text : "");
        } else {
          el.setCustomValidity(el.value === "" ? el.dataset.text : "");
        }
      });
    }, false);
  }

  const changeCount = [...actions].reduce((a, b) => { return b.dataset.action === 'change' ? a+1 : a }, 0);
  if (changeCount) {
    el.addEventListener('change', function() {
      actions.forEach(el => {
        el.setCustomValidity(el.value === "" ? el.dataset.text : "");
      });
    }, false);
  }
}