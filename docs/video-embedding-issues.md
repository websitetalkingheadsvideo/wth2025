# Video Embedding Issues and Solutions

## Problem: Video Height is 0px

### Symptoms
- Video element appears in HTML but has 0px height
- Video container is visible but video itself doesn't display
- Browser accessibility tools show video element but it's not visible on page

### Root Cause
Bootstrap's `embed-responsive` classes can conflict with video tags, especially when combined with custom CSS that overrides default Bootstrap behavior. The video element needs explicit styling to ensure proper height calculation.

### Solution

**Use a simple video tag with explicit width and height attributes:**

```html
<video width="100%" height="auto" style="max-width: 100%; display: block;" playsinline="playsinline" controls>
  <source src="https://www.websitetalkingheads.com/ivideo/videos/VideoName.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>
```

**Key points:**
- Use `width="100%"` and `height="auto"` attributes on the video tag
- Add `style="max-width: 100%; display: block;"` to ensure proper rendering
- Avoid complex Bootstrap `embed-responsive` wrappers when they cause conflicts
- Keep the structure simple - video tag directly in container div

### What Doesn't Work
- Using `embed-responsive` classes without proper child element styling
- Relying solely on CSS classes without explicit dimensions
- Complex nested div structures with conflicting CSS rules

### Example: Working Implementation

```html
<div class="row mb-5 mt-4">
  <div class="col-lg-10 offset-lg-1">
    <video width="100%" height="auto" style="max-width: 100%; display: block;" playsinline="playsinline" controls>
      <source src="https://www.websitetalkingheads.com/ivideo/videos/Greenbox Studio.mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video>
  </div>
</div>
```

### Related Files
- `articles/how-green-screen-videos-boost-business-engagement.php` - Example implementation
- `css/wth.css` - Contains embed-responsive overrides that may conflict

### Date Solved
January 2025

