(() => {
  "use strict";

  const REPOSITORY_URL = "https://github.com/Abu-Salah-Musha-Lemon/website-templates";
  const state = {
    projects: [],
    category: "All",
    query: "",
    sort: "name"
  };

  const elements = {
    total: document.getElementById("total-count"),
    filters: document.getElementById("category-filters"),
    search: document.getElementById("search-input"),
    sort: document.getElementById("sort-select"),
    summary: document.getElementById("result-summary"),
    grid: document.getElementById("project-grid"),
    empty: document.getElementById("empty-state"),
    error: document.getElementById("load-error"),
    clear: document.getElementById("clear-filters")
  };

  function createElement(tag, className, text) {
    const node = document.createElement(tag);
    if (className) node.className = className;
    if (text !== undefined) node.textContent = text;
    return node;
  }

  function makeExternalLink(label, href, className) {
    const link = createElement("a", className, label);
    link.href = href;
    link.target = "_blank";
    link.rel = "noopener noreferrer";
    return link;
  }

  function sourceUrl(folder) {
    const safePath = folder.split("/").map(encodeURIComponent).join("/");
    return `${REPOSITORY_URL}/tree/main/${safePath}`;
  }

  function renderFilters() {
    const categories = ["All", ...new Set(state.projects.map(project => project.category))];
    elements.filters.replaceChildren();

    categories.forEach(category => {
      const button = createElement(
        "button",
        `filter-button${state.category === category ? " is-active" : ""}`,
        category === "All" ? "All projects" : category
      );
      button.type = "button";
      button.dataset.category = category;
      button.setAttribute("aria-pressed", String(state.category === category));
      button.addEventListener("click", () => {
        state.category = category;
        renderFilters();
        renderProjects();
      });
      elements.filters.append(button);
    });
  }

  function renderCard(project) {
    const card = createElement("article", "project-card");

    const top = createElement("div", "card-topline");
    top.append(
      createElement("span", "category-label", project.category),
      createElement("span", "group-label", project.group || "")
    );

    const title = createElement("h3", "", project.title);
    const description = createElement("p", "project-description", project.description);

    const technologies = createElement("div", "technology-list");
    (project.technologies || []).forEach(technology => {
      technologies.append(createElement("span", "tech-tag", technology));
    });

    const bottom = createElement("div", "card-bottom");
    const actions = createElement("div", "card-actions");

    if (project.preview) {
      actions.append(makeExternalLink("Live preview ↗", `./${project.preview}`, "card-link primary"));
    } else {
      bottom.append(createElement("span", "server-note", "LOCAL SERVER REQUIRED"));
    }
    actions.append(makeExternalLink("Source code ↗", sourceUrl(project.folder), "card-link"));

    bottom.append(actions);
    card.append(top, title, description, technologies, bottom);
    return card;
  }

  function filteredProjects() {
    const query = state.query.trim().toLowerCase();

    return state.projects
      .filter(project => state.category === "All" || project.category === state.category)
      .filter(project => {
        if (!query) return true;
        const searchable = [
          project.title,
          project.description,
          project.category,
          project.group,
          ...(project.technologies || [])
        ].join(" ").toLowerCase();
        return searchable.includes(query);
      })
      .sort((a, b) => {
        if (state.sort === "category") {
          const categoryCompare = a.category.localeCompare(b.category);
          return categoryCompare || a.title.localeCompare(b.title);
        }
        return a.title.localeCompare(b.title);
      });
  }

  function renderProjects() {
    const visibleProjects = filteredProjects();
    elements.grid.replaceChildren();
    visibleProjects.forEach(project => elements.grid.append(renderCard(project)));

    const count = visibleProjects.length;
    elements.summary.textContent = `Showing ${count} of ${state.projects.length} projects`;
    elements.empty.hidden = count !== 0;
    elements.grid.hidden = count === 0;
  }

  async function initialize() {
    try {
      const response = await fetch("./data.json", { cache: "no-store" });
      if (!response.ok) throw new Error(`Catalog request failed: ${response.status}`);

      const projects = await response.json();
      if (!Array.isArray(projects)) throw new Error("The project catalog must be a JSON array.");

      state.projects = projects;
      elements.total.textContent = String(projects.length);
      renderFilters();
      renderProjects();
    } catch (error) {
      console.error("Unable to load project catalog:", error);
      elements.summary.textContent = "Project catalog unavailable";
      elements.grid.hidden = true;
      elements.error.hidden = false;
    }
  }

  elements.search.addEventListener("input", event => {
    state.query = event.target.value;
    renderProjects();
  });

  elements.sort.addEventListener("change", event => {
    state.sort = event.target.value;
    renderProjects();
  });

  elements.clear.addEventListener("click", () => {
    state.category = "All";
    state.query = "";
    elements.search.value = "";
    renderFilters();
    renderProjects();
  });

  document.addEventListener("keydown", event => {
    const target = event.target;
    const isTyping = target instanceof HTMLElement &&
      (target.isContentEditable || ["INPUT", "TEXTAREA", "SELECT"].includes(target.tagName));

    if (event.key === "/" && !isTyping) {
      event.preventDefault();
      elements.search.focus();
    }
  });

  initialize();
})();
