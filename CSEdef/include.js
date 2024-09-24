fetch('./include/head.html')
  .then(response => response.text())
  .then(content => {
    document.getElementById('head').innerHTML = content;
  })


fetch('./include/nav.html')
  .then(response => response.text())
  .then(content => {
    document.getElementById('navigation').innerHTML = content;
  })


fetch('./include/footer.html')
  .then(response => response.text())
  .then(content => {
    document.getElementById('footer').innerHTML = content;
  })


// Update the path based on the correct location of script.html
fetch('./include/script.html')
    .then(response => {
        if (!response.ok) throw new Error('Network response was not ok');
        return response.text();
    })
    .then(content => {
        document.getElementById('script').innerHTML = content;
    })
    .catch(error => console.error('Error fetching script:', error));
