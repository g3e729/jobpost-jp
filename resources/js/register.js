import FormValidation from './components/form-validation';
import PasswordReveal from './components/password-reveal';

new FormValidation({selector: '.needs-validation'});
new PasswordReveal({selectors: '.js-password-group'});
