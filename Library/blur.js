
 // JavaScript to add/remove the blur class when the modal is opened/closed
document.addEventListener('DOMContentLoaded', function() {
  var modal = new bootstrap.Modal(document.getElementById('expandimage'));
  var openModalBtn = document.querySelector('[data-bs-target="#expandimage"]');
  var pageContent = document.querySelector('.page-content');

  openModalBtn.addEventListener('click', function() {
    pageContent.classList.add('blur');
  });

  modal._element.addEventListener('hidden.bs.modal', function() {
    pageContent.classList.remove('blur');
  });
});


