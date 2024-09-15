
fetch('nav.html')
  .then(response => response.text())
  .then(content => {
    document.getElementById('navigation').innerHTML = content;
  });
fetch('footer.html')
  .then(response => response.text())
  .then(content => {
    document.getElementById('footer').innerHTML = content;
  });