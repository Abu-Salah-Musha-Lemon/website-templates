// Load only the partials that are present in this project.
async function loadPartial(targetId, filePath) {
  const target = document.getElementById(targetId);
  if (!target) return;

  try {
    const response = await fetch(filePath);
    if (!response.ok) throw new Error(`Could not load ${filePath}`);
    target.innerHTML = await response.text();
  } catch (error) {
    console.error(error);
  }
}

loadPartial("navigation", "./include/nav.html");
loadPartial("footer", "./include/footer.html");
