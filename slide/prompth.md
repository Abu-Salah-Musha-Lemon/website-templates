### ✅ Prompt for the Code You Have

> **Create a responsive image slider with the following features:**
>
> * Layout shows **three images** in a **grid**:
>
>   * One large image on the left (80%)
>   * Two smaller stacked images on the right (20%)
>
> * Each group of 3 images represents a **project**, which has:
>
>   * A **title** shown below the grid (only one title at a time)
>   * A **smooth animated title transition** (slide up & fade)
>
> * On clicking:
>
>   * The **⬇️ Down button**: new project images slide **upward**
>   * The **⬆️ Up button**: previous project images slide **downward**
>
> * The **image frames stay fixed** — only the image content moves smoothly
>
> * The **main image receives focus** after each transition
>
> * Add **touch swipe support** for mobile:
>
>   * Swipe **up** = next project
>   * Swipe **down** = previous project
>
> * All transitions (images & title) must be **smooth** using CSS animations

---

### Optional Additions to Prompt

If you want to be more specific, you can also add:

> * Use **vanilla JavaScript**, no frameworks
> * Ensure accessibility: main image should be focusable
> * Responsive behavior using **CSS Grid**
> * Each project has **3 image URLs** and a `title` in a structured array

---
<br>
### ✅ Prompt to Generate Code for a Touch Image Slider with Title Animation

> Create an interactive **image slider web page** using **HTML, CSS, and JavaScript**. The layout should have:
>
> 1. A **main large image** on the left that spans two rows.
> 2. Two **smaller images stacked vertically** on the right side.
> 3. A **project title** below the images that animates (slides up and fades out/in) when the project changes.
> 4. Two **navigation buttons** labeled "Up" and "Down" to cycle through multiple projects.
> 5. Each project should have a **title and 3 image URLs**.
> 6. Include **smooth transition animations** when images or the title change.
> 7. Add **touch support** so users can swipe up/down to navigate between projects on mobile devices.
> 8. Make the layout **responsive** for tablets and phones using media queries.
> 9. Use **CSS variables** for consistent colors, spacing, and fonts.
> 10. Include accessibility features like focusable images.
>
> Bonus:
>
> * Animate image transitions with vertical sliding and fading.
> * Disable buttons at the first and last project.
> * Respect the user's "prefers-reduced-motion" settings.

---
<br>
---

### ✅ Prompt to Generate the Code:

> **Prompt:**
>
> Create a responsive HTML, CSS, and JavaScript media slider that displays three media items (images or videos) using CSS Grid. The layout should:
>
> * Use semantic `<section>` elements for each media block.
> * On desktop and tablet (above 768px): use `grid-template-areas` for layout:
>
>   ```
>   "main top"
>   "main bottom"
>   ```
>
>   where "main" takes up 80% width, and "top" and "bottom" stack on the right (20%).
> * On mobile (max-width: 768px), display all items in a single column:
>
>   ```
>   "main"
>   "top"
>   "bottom"
>   ```
> * The main slide can contain an image or video (auto-playing and muted if video).
> * Use JavaScript to enable switching between projects with Up and Down buttons, and support swipe gestures on touch devices.
> * Animate media transitions and project titles when changing slides.
> * Include a few example projects using both images and videos.
> * Style the layout with modern design, rounded corners, shadows, and CSS transitions.
> * Ensure accessibility (e.g., keyboard focus on main media).
> * Include mobile responsiveness and `prefers-reduced-motion` support.

---

### 📝 Optional Add-ons You Can Include in the Prompt:

* Add pagination or indicator dots.
* Add play/pause functionality.
* Load media from an external JSON file.
* Make it accessible with ARIA labels and keyboard controls.

---


