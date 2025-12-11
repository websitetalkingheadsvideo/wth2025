# jQuery Dependency Report - Tiers 1-3
## Website: https://www.websitetalkingheads.com

**Date:** 2025-01-10  
**Scope:** All pages in Tiers 1-3 as defined in `plan/links/site_tier_mapping_report.md`

---

## Executive Summary

This audit scanned all Tier 1-3 pages for jQuery dependencies, identifying direct usage, indirect dependencies via shared includes and external JavaScript files, and deprecated patterns.

### Key Statistics
- **Total Pages Scanned:** 65+ pages (Tier 1: 1, Tier 2: 14, Tier 3: 50+)
- **Pages Requiring jQuery:** 65+ (all via indirect dependency from shared footer)
- **Pages with Direct jQuery Usage:** 1 (`includes/footer.php` with inline code)
- **JavaScript Files Requiring jQuery:** 10+ identified
- **Deprecated Patterns Found:** $(document).ready() usage (deprecated in favor of DOMContentLoaded)

---

## A. Pages That Require jQuery

### Indirect Dependency (via Shared Footer)

The vast majority of Tier 1-3 pages have **indirect jQuery dependency** through shared footer includes that load jQuery from CDN. These pages do not contain jQuery code themselves but depend on jQuery being loaded by the footer.

#### Tier 1 Pages

| Page Path | Dependency Type | jQuery Source | JS Files Causing Dependency | Notes |
|-----------|----------------|---------------|-----------------------------|-------|
| `index.php` | Indirect | `includes/footer25.php` → jQuery 3.2.1 CDN | `footer25.php` loads jQuery | No inline jQuery code in page |

#### Tier 2 Pages

All Tier 2 pages include `includes/footer25.php`, which loads jQuery 3.2.1 from CDN. None contain direct jQuery usage in the page files themselves. **Note:** `footer_b4.php` is an identical duplicate only used in non-tier pages (`create-canvas/` internal tools).

| Page Path | Dependency Type | jQuery Source | JS Files Causing Dependency | Notes |
|-----------|----------------|---------------|-----------------------------|-------|
| `contact.php` | Indirect | `includes/footer25.php` → jQuery 3.2.1 CDN | `footer25.php` | No inline jQuery |
| `sitemap.php` | Indirect | `includes/footer25.php` → jQuery 3.2.1 CDN | `footer25.php` | No inline jQuery |
| `privacy-policy.php` | Indirect | `includes/footer25.php` → jQuery 3.2.1 CDN | `footer25.php` | No inline jQuery |
| `404error.php` | Indirect | `includes/footer25.php` → jQuery 3.2.1 CDN | `footer25.php` | No inline jQuery |
| `orderform/index.php` | Indirect | `includes/footer25.php` → jQuery 3.2.1 CDN | `footer25.php`, `orderform/js/video-type.js` | Page loads `orderform/js/video-type.js` which uses jQuery |
| `videopresentations/index.php` | Indirect | `includes/footer25.php` → jQuery 3.2.1 CDN | `footer25.php` | No inline jQuery |
| `specials/index.php` | Indirect | `includes/footer25.php` → jQuery 3.2.1 CDN | `footer25.php` | No inline jQuery |
| `awards/index.php` | Indirect | `includes/footer25.php` → jQuery 3.2.1 CDN | `footer25.php` | No inline jQuery |
| `website-spokesperson/index.php` | Indirect | `includes/footer25.php` → jQuery 3.2.1 CDN | `footer25.php` | No inline jQuery |

**Other Tier 2 Pages** (spokespeople, whiteboard): All include `footer25.php` → indirect dependency

#### Tier 3 Pages

All scanned Tier 3 pages include `includes/footer25.php` which loads jQuery 3.2.1 from CDN. Some also load additional jQuery-dependent scripts.

| Page Path | Dependency Type | jQuery Source | JS Files Causing Dependency | Notes |
|-----------|----------------|---------------|-----------------------------|-------|
| `videopresentations/custom-presentations.php` | Indirect | `includes/footer25.php` → jQuery 3.2.1 CDN | `footer25.php` | No inline jQuery |
| `videopresentations/viral-commercial.php` | Indirect | `includes/footer25.php` → jQuery 3.2.1 CDN | `footer25.php` | No inline jQuery |
| `videopresentations/animation.php` | Indirect | `includes/footer25.php` → jQuery 3.2.1 CDN | `footer25.php` | No inline jQuery |
| `specialty-players/index.php` | Indirect | `includes/footer25.php` → jQuery 3.2.1 CDN | `footer25.php` | No inline jQuery |
| `styles/index.php` | Indirect | `includes/footer25.php` → jQuery 3.2.1 CDN | `footer25.php`, `styles/includes/modal.php` | Includes modal with inline jQuery code |

**Note:** Many Tier 3 pages have a `#loading` element that is hidden via jQuery `.fadeOut()` in `includes/footer.php` (see Direct Dependency section below).

### Direct Dependency

| Page Path | Dependency Type | jQuery Functions/Patterns Used | JS Files Causing Dependency | Deprecated Patterns | Notes |
|-----------|----------------|-------------------------------|-----------------------------|---------------------|-------|
| `includes/footer.php` | Direct | `$(document).ready()`, `.fadeOut()` | Inline `<script>` block | `$(document).ready()` (deprecated) | Inline jQuery code: `$("#loading").fadeOut(1000)` |

**Deprecated Patterns Found:**
- `$(document).ready(function(){})` - Deprecated. Modern alternative: `document.addEventListener('DOMContentLoaded', function() {})` or simply `$(function() {})` which is still supported but the explicit ready() method is deprecated.

---

## B. JavaScript Files That Require jQuery

### Shared Footer-Loaded Files

These files are loaded by footer includes (footer25.php, footer_b4.php) and affect all pages using those footers.

| File Path | Pages Loading It | jQuery Features Used | Deprecated Patterns | Could Be Rewritten? | Notes |
|-----------|------------------|---------------------|---------------------|---------------------|-------|
| `js/wow.js` | All pages using `footer_b4.php` (non-tier/internal only) | Unknown (file not found locally, loaded from CDN) | Unknown | Unknown | Loaded via: `https://www.websitetalkingheads.com/js/wow.js` - **Note:** `footer_b4.php` is identical to `footer25.php` and should be removed |
| `js/izeetak.js` | Pages using `footer_b4.php` (non-tier/internal only), `footer.php` | Unknown (file not found locally, loaded from CDN) | Unknown | Unknown | Loaded via: `https://www.websitetalkingheads.com/js/izeetak.js` |
| `js/site.js` | All pages using `footer_b4.php` (non-tier/internal only) | Unknown (file not found locally, loaded from CDN) | Unknown | Unknown | Loaded via: `https://www.websitetalkingheads.com/js/site.js` |
| `js/tracking.js` | All pages using `footer_b4.php` (non-tier/internal only) | Unknown (file not found locally, loaded from CDN) | Unknown | Unknown | Loaded via: `https://www.websitetalkingheads.com/js/tracking.js` |
| `js/header-links.js` | All pages using `includes/header25.php` | Unknown (file not found locally, loaded from CDN) | Unknown | Unknown | Loaded via: `https://www.websitetalkingheads.com/js/header-links.js` |

### Orderform JavaScript Files

| File Path | Pages Loading It | jQuery Features Used | Deprecated Patterns | Could Be Rewritten? | Notes |
|-----------|------------------|---------------------|---------------------|---------------------|-------|
| `orderform/js/video-type.js` | `orderform/index.php` | `$(document).ready()`, `$()` selector, `.change()`, `.val()`, `.removeClass()`, `.attr()` | `$(document).ready()` (deprecated) | Yes | Form field visibility toggle based on video type selection |

### Video Presentations JavaScript Files

| File Path | Pages Loading It | jQuery Features Used | Deprecated Patterns | Could Be Rewritten? | Notes |
|-----------|------------------|---------------------|---------------------|---------------------|-------|
| `videopresentations/js/lightboxWidth.js` | Pages loading this script | `$(document).ready()`, `$(window).resize()`, `$()` selector, `.lightbox()` plugin initialization | `$(document).ready()` (deprecated) | Yes | Calculates and sets lightbox dimensions responsively |
| `videopresentations/jquery-1.2.6.min.js` | Pages explicitly loading this | jQuery library (very old version 1.2.6) | Entire library is outdated | Yes | Extremely outdated jQuery version - should be removed or replaced |
| `videopresentations/jquery.fancybox-1.0.0.js` | Pages loading this plugin | jQuery plugin using `$()`, `.extend()`, `.fn.fancybox`, `.unbind()`, `.click()`, `.css()`, `.width()`, `.height()`, `.prepend()`, `.click()` | `.unbind()` (deprecated, use `.off()`), potentially `.click()` for events | Partially - plugin would need replacement | jQuery lightbox plugin - consider modern alternatives like GLightbox or Fancybox v5+ |

### Specialty Players JavaScript Files

| File Path | Pages Loading It | jQuery Features Used | Deprecated Patterns | Could Be Rewritten? | Notes |
|-----------|------------------|---------------------|---------------------|---------------------|-------|
| `specialty-players/exit-intent/talkingheads/exit-intent.js` | Specialty player pages | `$(document).ready()`, `jQuery.fn.extend()`, `$()` selector, `.prepend()`, `.append()`, `.css()`, `.mousemove()`, `.fadeIn()`, `.fadeOut()`, `.click()`, `.slideUp()`, `.remove()`, `.attr()`, `.text()` | `$(document).ready()` (deprecated) | Yes (complex but feasible) | Extensive jQuery usage for exit-intent popup functionality |
| `specialty-players/popup/talkingheads/talking-popup_v*.js` | Popup specialty player pages | `$(document).mousemove()`, `$()` selector, `.css()`, `.fadeIn()`, `.fadeOut()`, `.prepend()`, `.click()`, `.slideUp()`, `.append()`, `.attr()`, `.each()`, `.remove()` | None identified | Yes (complex but feasible) | Multiple versions (v2-v6) of popup functionality |

### Product Demonstrations JavaScript Files

| File Path | Pages Loading It | jQuery Features Used | Deprecated Patterns | Could Be Rewritten? | Notes |
|-----------|------------------|---------------------|---------------------|---------------------|-------|
| `product-demonstrations/js/jquery.js` | Product demonstration pages | jQuery library 1.12.0 (local copy) | Entire library is outdated | Yes | Local jQuery 1.12.0 - should use CDN or remove if not needed |
| `product-demonstrations/js/init.js` | Product demonstration pages | `$()` selector, `.css()`, `.one()`, `.hide()`, and extensive jQuery plugin code | None specifically deprecated | Partially - contains bundled jQuery plugins | Complex file with multiple jQuery plugins bundled (Bootstrap, Owl Carousel, Waypoints, etc.) |

### Styles Includes

| File Path | Pages Loading It | jQuery Features Used | Deprecated Patterns | Could Be Rewritten? | Notes |
|-----------|------------------|---------------------|---------------------|---------------------|-------|
| `styles/includes/modal.php` | Pages including this modal (e.g., `styles/index.php`) | `$()` selector, `.on()`, `.click()`, `.attr()`, `.text()`, `.modal('show')` | None specifically deprecated | Yes | Inline jQuery code for modal video player functionality |

---

## C. Pages That Do NOT Require jQuery

**None found.** All Tier 1-3 pages scanned either:
1. Include a footer file that loads jQuery (footer25.php, footer_b4.php, or footer.php)
2. Load JavaScript files that depend on jQuery
3. Contain inline jQuery code

**Note:** Some pages may not functionally require jQuery (no jQuery code runs), but they still load jQuery via shared includes, making it technically a dependency. To truly remove jQuery from these pages, the footer includes would need to be updated.

---

## D. Deprecated Patterns Found

### 1. $(document).ready()

**Status:** Deprecated (though still widely used and functional)

**Found In:**
- `includes/footer.php` (line 12)
- `orderform/js/video-type.js` (line 2)
- `videopresentations/js/lightboxWidth.js` (line 3)
- `specialty-players/exit-intent/talkingheads/exit-intent.js` (line 4)

**Modern Alternative:**
```javascript
// jQuery (deprecated but still works)
$(document).ready(function() { ... });

// Modern jQuery (shorter syntax)
$(function() { ... });

// Vanilla JavaScript (recommended)
document.addEventListener('DOMContentLoaded', function() { ... });
```

### 2. .unbind() / .bind()

**Status:** Deprecated in jQuery 3.0+

**Found In:**
- `videopresentations/jquery.fancybox-1.0.0.js` (line 23: `.unbind('click')`)

**Modern Alternative:**
```javascript
// Deprecated
$(element).bind('click', handler);
$(element).unbind('click');

// Modern jQuery
$(element).on('click', handler);
$(element).off('click');

// Vanilla JavaScript
element.addEventListener('click', handler);
element.removeEventListener('click', handler);
```

### 3. Outdated jQuery Versions

**Found:**
- `videopresentations/jquery-1.2.6.min.js` - jQuery 1.2.6 (released 2008, extremely outdated)
- `product-demonstrations/js/jquery.js` - jQuery 1.12.0 (released 2016, outdated)
- Footer files load jQuery 3.2.1 (released 2017, outdated - latest is 3.7.x)

**Recommendation:** Upgrade all jQuery instances to latest 3.7.x or remove jQuery entirely where possible.

---

## E. Migration Recommendations

### High Priority: Remove jQuery from Footer Includes

**Impact:** Would affect all 65+ Tier 1-3 pages

**Current State:**
- `includes/footer25.php` loads jQuery 3.2.1 from CDN (canonical footer used by all Tier 1-3 pages)
- `includes/footer_b4.php` is identical to `footer25.php` but only used in non-tier pages (`create-canvas/` internal tools) and old/backup files - **should be removed or consolidated**
- `includes/footer.php` contains inline jQuery code: `$("#loading").fadeOut(1000)`

**Note:** `footer_b4.php` and `footer25.php` are identical duplicates. `footer_b4.php` should be removed as legacy code, and any remaining references (in `create-canvas/` or old files) should be updated to use `footer25.php`.

**Recommendation:**
1. Replace `$("#loading").fadeOut(1000)` in `footer.php` with vanilla JS:
   ```javascript
   // Vanilla JS replacement
   document.addEventListener('DOMContentLoaded', function() {
       const loading = document.getElementById('loading');
       if (loading) {
           loading.style.transition = 'opacity 1s';
           loading.style.opacity = '0';
           setTimeout(function() {
               loading.style.display = 'none';
           }, 1000);
       }
   });
   ```

2. Verify that `js/wow.js`, `js/izeetak.js`, `js/site.js`, `js/tracking.js`, and `js/header-links.js` do not require jQuery. If they do, either:
   - Rewrite them in vanilla JS
   - Load jQuery conditionally only on pages that need these scripts
   - Replace with modern alternatives

3. Remove jQuery script tag from footer files once dependencies are resolved.

### Medium Priority: Replace jQuery in Orderform

**File:** `orderform/js/video-type.js`

**Current jQuery Usage:**
- `$(document).ready()`
- `$("#videoType").change()`
- `$()` selectors
- `.removeClass()`, `.attr()`, `.val()`

**Vanilla JS Replacement:**
```javascript
// Vanilla JS replacement
document.addEventListener('DOMContentLoaded', function() {
    const videoType = document.getElementById('videoType');
    if (videoType) {
        videoType.addEventListener('change', function() {
            typeChange();
        });
    }

    function typeChange() {
        const type = document.getElementById('videoType');
        const videoBackground = document.getElementById('video-background');
        const websiteField = document.getElementById('website-field');
        
        if (!type || !videoBackground || !websiteField) return;
        
        switch (type.value) {
            case "Basic Video":
                videoBackground.classList.remove('hidden');
                websiteField.className = 'hidden';
                break;
            case "Green Screen Video":
                videoBackground.className = 'hidden';
                websiteField.className = 'hidden';
                break;
            case "Website Spokesperson":
                videoBackground.className = 'hidden';
                websiteField.classList.remove('hidden');
                websiteField.className = 'form-group row';
                break;
        }
    }
});
```

### Medium Priority: Replace jQuery in Lightbox Width Script

**File:** `videopresentations/js/lightboxWidth.js`

**Current jQuery Usage:**
- `$(document).ready()`
- `$(window).resize()`
- `$('.lightbox').lightbox()` plugin initialization

**Recommendation:**
1. Replace with vanilla JS DOM ready and resize handlers
2. If `.lightbox()` plugin requires jQuery, replace plugin with modern alternative (GLightbox, Lightbox2, or similar)
3. Vanilla JS replacement for ready/resize:
```javascript
document.addEventListener('DOMContentLoaded', function() {
    lightboxWidth();
});

window.addEventListener('resize', function() {
    lightboxWidth();
});

function lightboxWidth() {
    const winWidth = window.innerWidth;
    let w, h;
    
    if (winWidth > 1200) {
        w = 1200;
        h = 720;
    } else {
        w = parseInt(winWidth * 0.8);
        h = parseInt(w * 0.5625);
    }
    
    // Initialize lightbox with dimensions (using modern lightbox library)
    // Example with GLightbox:
    const lightbox = GLightbox({
        selector: '.lightbox',
        width: w,
        height: h
    });
}
```

### Low Priority: Remove Outdated jQuery Files

**Files:**
- `videopresentations/jquery-1.2.6.min.js` - Remove entirely if not used, or upgrade
- `product-demonstrations/js/jquery.js` - Remove if redundant with footer-loaded jQuery, or upgrade

**Action:** Search codebase for pages loading these files and either remove the script tag or replace with footer jQuery loading.

### Low Priority: Replace Fancybox Plugin

**File:** `videopresentations/jquery.fancybox-1.0.0.js`

**Recommendation:**
- Replace with modern lightbox library that doesn't require jQuery:
  - **GLightbox** (recommended, no dependencies)
  - **Lightbox2** (vanilla JS, no jQuery)
  - **Fancybox v5+** (optional jQuery, works without it)

**Migration Complexity:** Medium - requires finding all pages using `.lightbox()` or `.fancybox()` calls and updating initialization code.

### Complex: Exit Intent and Popup Scripts

**Files:**
- `specialty-players/exit-intent/talkingheads/exit-intent.js`
- `specialty-players/popup/talkingheads/talking-popup_v*.js`

**Recommendation:**
These files have extensive jQuery usage. Options:
1. **Full Rewrite:** Convert to vanilla JS (time-intensive but removes jQuery dependency)
2. **Progressive Enhancement:** Keep jQuery dependency but ensure it's loaded only on specialty player pages
3. **Modern Library:** Use a modern exit-intent library that doesn't require jQuery

**Migration Approach (if rewriting):**
- Replace `$(document).ready()` → `DOMContentLoaded` event
- Replace `$()` selectors → `document.querySelector()` / `querySelectorAll()`
- Replace `.fadeIn()`, `.fadeOut()` → CSS transitions with `classList` manipulation
- Replace `.click()`, `.mousemove()` → `addEventListener()`
- Replace `.prepend()`, `.append()` → `insertBefore()`, `appendChild()`

### Styles Modal Replacement

**File:** `styles/includes/modal.php`

**Current jQuery Usage:**
- `$()` selectors
- `.on()` for Bootstrap modal events
- `.click()` handlers
- `.attr()`, `.text()`
- `.modal('show')` Bootstrap modal method

**Vanilla JS Replacement:**
```javascript
// Vanilla JS replacement
const holder = document.getElementById('talking-heads-video');
const video = holder;
const iframe = video;
const player = new Vimeo.Player(iframe);

const modals = document.querySelectorAll('.modal');
modals.forEach(function(modal) {
    modal.addEventListener('hidden.bs.modal', function() {
        player.pause();
    });
    
    modal.addEventListener('shown.bs.modal', function() {
        player.play();
    });
});

const srcBase = "https://www.websitetalkingheads.com/";
let name, alt, srcVideo;

document.querySelectorAll('.actor').forEach(function(actor) {
    actor.addEventListener('click', function() {
        name = this.getAttribute('data-video');
        srcVideo = srcBase + 'videos/' + name + '.mp4';
        alt = this.getAttribute('alt') ? ' - ' + this.getAttribute('alt') : '';
        showVideo();
    });
});

// Similar for .item and .poster selectors...

function showVideo() {
    document.getElementById('videoModalLabel').textContent = name + alt;
    const mainModal = document.getElementById('mainModal');
    // Use Bootstrap 5 modal API (vanilla JS)
    const modal = new bootstrap.Modal(mainModal);
    modal.show();
    video.src = srcVideo;
}
```

---

## Summary by Dependency Type

### Shared Includes (Affects All Pages)
- **`includes/footer25.php`**: Loads jQuery 3.2.1 from CDN (canonical footer - used by all Tier 1-3 pages)
- **`includes/footer_b4.php`**: Identical duplicate of `footer25.php`, only used in non-tier pages (`create-canvas/` internal tools) and old/backup files - **should be removed**
- **`includes/footer.php`**: Loads jQuery 3.2.1 from CDN + inline jQuery code with deprecated `.ready()`

### Page-Specific Dependencies
- **Orderform pages**: Require jQuery for `orderform/js/video-type.js`
- **Styles pages**: Require jQuery for `styles/includes/modal.php` inline code
- **Specialty player pages**: Require jQuery for exit-intent and popup scripts
- **Video presentation pages**: May require jQuery for lightbox functionality

### Critical Path for jQuery Removal
1. Replace inline jQuery in `includes/footer.php`
2. Verify and potentially rewrite footer-loaded JS files (`wow.js`, `izeetak.js`, `site.js`, `tracking.js`, `header-links.js`)
3. Remove jQuery script tag from footer files
4. Replace jQuery-dependent functionality in page-specific scripts
5. Remove or upgrade outdated jQuery library files

---

## Recommendations Priority

### Immediate (Blocks jQuery Removal)
1. ✅ Verify footer-loaded JS files don't require jQuery
2. ✅ Replace `$("#loading").fadeOut()` in `footer.php` with vanilla JS

### High Priority (Affects Multiple Pages)
1. ✅ Remove jQuery from footer includes once dependencies resolved
2. ✅ Replace `orderform/js/video-type.js` with vanilla JS

### Medium Priority (Specific Features)
1. ✅ Replace `videopresentations/js/lightboxWidth.js` with vanilla JS + modern lightbox library
2. ✅ Replace `styles/includes/modal.php` inline jQuery with vanilla JS
3. ✅ Remove outdated jQuery files (`jquery-1.2.6.min.js`, `product-demonstrations/js/jquery.js`)

### Low Priority (Specialized Features)
1. ✅ Replace Fancybox plugin with modern alternative
2. ✅ Consider rewriting exit-intent and popup scripts (or isolate jQuery to those pages only)

---

**Last Updated:** 2025-01-10

