# Specials Page vs Women Spokespeople Page - Diagnostic Report

## Executive Summary

The Specials page (`specials/index.php`) has been updated to use modal-based video playback similar to the Women Spokespeople page (`spokespeople/women.php`), but several critical mismatches remain that prevent consistent visual quality, animation behavior, and modal functionality.

---

## Identified Mismatches

### 1. **Missing CSS Dependencies**
**Issue**: Specials page does not include the same CSS files used by Women Spokespeople page
- Missing: `../actors/css/spokespeople.css`
- Missing: `../actors/css/actors-grid.css?v=20251205m5`
- Current: Only includes `../css/specials-index.css`

**Impact**: Posters may lack proper grid styling, animations, and hover effects that make the Women page visually consistent.

### 2. **Thumbnail Sizing & Aspect Ratio**
**Issue**: Specials page thumbnails may be distorted or incorrectly sized
- Women page: Uses actor-grid CSS with fixed aspect ratios and proper image constraints
- Specials page: Uses `img-fluid` class but may lack proper aspect ratio containers
- Missing: Explicit width/height constraints or aspect-ratio containers

**Impact**: Posters appear enlarged, distorted, or inconsistent in size.

### 3. **Animation Classes Missing**
**Issue**: Specials page may lack animation triggers present on Women page
- Women page: Likely uses animation classes from `actors-grid.css` (CSS transitions, transforms)
- Specials page: Has basic CSS transitions but may miss key animation states
- Missing: Proper hover states, scale transforms, and animation timing that match Women page

**Impact**: Posters appear non-animated or have inconsistent hover behavior.

### 4. **Modal Video Rendering Issues**
**Issue**: Modal may play audio but fail to render video
- Root Cause: Using iframe with `../ivideo/talking-heads-player.php` (relative URL)
- Problem: Per `docs/video-embedding-issues.md`, Bootstrap `embed-responsive` can cause 0px height issues
- Current Implementation: Uses `embed-responsive embed-responsive-16by9` wrapper which may conflict
- Missing: Explicit video dimensions or proper iframe sizing per embedding documentation

**Impact**: Video audio plays but video frame is 0px height (invisible).

### 5. **JavaScript Event Handler Mismatch**
**Issue**: Specials page uses different click handler pattern than Women page
- Women page: Uses `.actor` class with `data-actor` attribute (based on demo-grid.php pattern)
- Specials page: Uses `.poster.spokesperson-specials` with `data-video` attribute
- Potential Conflict: If Women page JS also listens for `.poster` clicks, could cause double-triggering

**Impact**: Modal may not open correctly or may have conflicting event handlers.

### 6. **Video URL Format**
**Issue**: Using relative URL for iframe src instead of absolute
- Current: `../ivideo/talking-heads-player.php?video=...` (relative)
- Better: Full absolute URL to ensure proper loading
- Problem: Relative URLs in iframes can fail depending on page context

**Impact**: Video fails to load, causing audio-only playback or blank modal.

---

## Root Causes Analysis

### Primary Causes

1. **CSS Architecture Mismatch**
   - Women page relies on `actors-grid.css` and `spokespeople.css` for consistent styling
   - Specials page attempts to recreate styles in isolation, missing key rules
   - Result: Visual inconsistencies and missing animations

2. **Video Embedding Pattern Conflict**
   - Bootstrap `embed-responsive` classes conflict with iframe content (documented in `video-embedding-issues.md`)
   - Iframe needs explicit dimensions or simplified structure
   - Current modal structure may prevent proper video height calculation

3. **Missing Animation Framework**
   - Women page CSS likely includes predefined animation classes/transitions
   - Specials page CSS has basic transitions but lacks the complete animation system
   - Missing keyframe animations or transform states

4. **JavaScript Selector Inconsistency**
   - Different class names and data attributes prevent code reuse
   - Women page uses `.actor` + `data-actor`
   - Specials page uses `.poster.spokesperson-specials` + `data-video`
   - This prevents using the same JS handler

### Secondary Causes

5. **URL Resolution Issues**
   - Relative URLs in iframe src attributes are unreliable
   - Should use absolute URLs for video player embeds
   - Current relative path may resolve incorrectly in different contexts

6. **Aspect Ratio Containers**
   - Missing proper aspect-ratio preserving containers for thumbnails
   - Women page likely uses fixed aspect ratio divs or CSS aspect-ratio property
   - Specials page relies on `img-fluid` which may not preserve intended aspect ratios

---

## Recommended Fixes

### Fix 1: Include Missing CSS Files

**File**: `specials/index.php` (head section)

**Add after line 15**:
```php
<link href="../actors/css/spokespeople.css" rel="stylesheet" type="text/css">
<link href="../actors/css/actors-grid.css?v=20251205m5" rel="stylesheet" type="text/css">
```

**Reason**: Ensures Specials page has access to all styling rules, animations, and grid layouts used by Women page.

---

### Fix 2: Use Consistent HTML Structure & Classes

**File**: `specials/index.php` (video thumbnail section)

**Replace lines 39-46 and 66-73** with structure matching Women page pattern:

```php
<div class="col-lg-5">
  <div class="actor-card-wrapper">
    <div class="actor-card actor" data-video="<?=$male?>" data-actor="<?=$male?>" title="<?=$male?>">
      <div class="thumb-wrapper"></div>
      <div class="overlay"></div>
      <img src="https://www.websitetalkingheads.com/carimages/<?=$male?>.png" class="img-responsive" alt="<?=$male?> - Video Spokesperson">
    </div>
  </div>
  <h3 id="male" class="highlight text-center">
    <?=$male?>
  </h3>
</div>
```

**Do the same for female section (lines 65-76).**

**Reason**: Matches the HTML structure and class names used by Women page, enabling CSS and JS compatibility.

---

### Fix 3: Fix Modal Video Embedding

**File**: `specials/index.php` (modal section)

**Replace lines 158-161** with simplified structure per `video-embedding-issues.md`:

```php
<div class="modal-body p-0">
  <div class="modal-video-container" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; background-color: #000;">
    <iframe id="specials-video-iframe" 
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;"
            frameborder="0" 
            scrolling="no" 
            allow="autoplay; fullscreen; picture-in-picture" 
            title="Video Spokesperson">
    </iframe>
  </div>
</div>
```

**Reason**: Removes problematic `embed-responsive` wrapper and uses explicit dimensions per embedding documentation.

---

### Fix 4: Use Absolute URLs for Video Player

**File**: `js/specials-modal.js`

**Replace line 20**:
```javascript
var baseUrl = 'https://www.websitetalkingheads.com/ivideo/talking-heads-player.php';
```

**And update line 44**:
```javascript
videoUrl = baseUrl + '?video=' + encodeURIComponent(videoName) + '&autostart=yes&controls=mouse&actor=true';
```

**Reason**: Absolute URLs ensure iframe loads correctly regardless of page context.

---

### Fix 5: Align JavaScript with Women Page Pattern

**File**: `js/specials-modal.js`

**Update click handler (lines 25-65)** to match Women page pattern:

```javascript
// Handle clicks matching Women page structure
$(document).on('click', '.actor-card.actor, .poster.spokesperson-specials', function(e) {
    e.preventDefault();
    e.stopPropagation();
    
    var $element = $(this);
    // Try data-actor first (Women page), fallback to data-video (Specials page)
    var videoName = $element.attr('data-actor') || $element.attr('data-video');
    var videoType = $element.attr('data-video-type') || 'player';
    
    if (!videoName) {
        console.error('No data-actor or data-video attribute found');
        return;
    }
    
    currentVideoName = videoName;
    
    // Build video URL
    var videoUrl;
    if (videoType === 'player') {
        videoUrl = 'https://www.websitetalkingheads.com/ivideo/talking-heads-player.php?video=' + 
                   encodeURIComponent(videoName) + '&autostart=yes&controls=mouse&actor=true';
    } else {
        videoUrl = 'https://www.websitetalkingheads.com/videos/' + encodeURIComponent(videoName) + '.mp4';
    }
    
    // Update modal title
    $modalTitle.text(videoName);
    
    // Clear iframe src first
    iframe.src = '';
    
    // Set new src and show modal
    setTimeout(function() {
        if (iframe && videoUrl) {
            iframe.src = videoUrl;
            $modal.modal('show');
        } else {
            console.error('Failed to set iframe src');
        }
    }, 10);
});
```

**Reason**: Handles both Women page `.actor` class and Specials page `.poster` class, ensuring compatibility.

---

### Fix 6: Add Aspect Ratio Constraints to Thumbnails

**File**: `css/specials-index.css`

**Add after line 79**:
```css
.specials-video-thumbnail {
    position: relative;
    width: 100%;
    margin-bottom: 1rem;
    /* Preserve aspect ratio similar to actors-grid */
    aspect-ratio: 160 / 180; /* Match actor image dimensions */
    max-width: 300px; /* Prevent over-enlargement */
    margin-left: auto;
    margin-right: auto;
}

.poster.spokesperson-specials img,
.actor-card img {
    width: 100%;
    height: 100%;
    object-fit: contain; /* Prevent distortion */
    display: block;
}
```

**Reason**: Ensures thumbnails maintain proper proportions and don't appear enlarged or distorted.

---

### Fix 7: Include Women Page JavaScript (Optional but Recommended)

**File**: `specials/index.php` (before closing body tag)

**Add after line 170**:
```php
<!-- Include Women page modal handler for compatibility -->
<?php if (file_exists('../spokespeople/includes/modal.php')): ?>
  <?php include('../spokespeople/includes/modal.php'); ?>
<?php endif; ?>
<script src="https://player.vimeo.com/api/player.js"></script>
<?php if (file_exists('../js/spokesperson-grid.js')): ?>
  <script src="../js/spokesperson-grid.js?v=20251205m3"></script>
<?php endif; ?>
```

**Note**: Only include if these files exist and you want to use the exact same modal system as Women page.

**Alternative**: Keep `specials-modal.js` but ensure it doesn't conflict with Women page JS.

---

## Confirmation Checklist

Use this checklist to verify both pages present media consistently:

### Visual Consistency
- [ ] Posters on Specials page have same size/aspect ratio as Women page
- [ ] Hover effects (scale, shadow) work identically on both pages
- [ ] Play button overlay appears and animates the same way
- [ ] Typography and spacing match between pages
- [ ] Border radius and shadows match

### Animation Behavior
- [ ] Hover animations trigger with same timing and easing
- [ ] Play button scales/animates on hover
- [ ] Poster cards lift/transform on hover (if applicable)
- [ ] No janky or missing animations on Specials page

### Modal Functionality
- [ ] Modal opens when clicking poster on both pages
- [ ] Video renders visibly (not just audio) in modal
- [ ] Video iframe has proper dimensions (not 0px height)
- [ ] Modal closes via close button, ESC key, and outside click
- [ ] Video stops playing when modal closes
- [ ] Modal title displays actor name correctly

### Technical Validation
- [ ] No JavaScript console errors on Specials page
- [ ] CSS files load without 404 errors
- [ ] Video URLs resolve correctly (check Network tab)
- [ ] Iframe src uses absolute URLs
- [ ] Modal iframe has explicit height (not 0px)
- [ ] Bootstrap modal classes work correctly

### Cross-Browser Testing
- [ ] Tested in Chrome/Edge
- [ ] Tested in Firefox
- [ ] Tested in Safari (if applicable)
- [ ] Mobile responsiveness works on both pages

---

## Implementation Priority

1. **Critical (Do First)**:
   - Fix 3: Modal video embedding (fixes audio-only issue)
   - Fix 4: Absolute URLs (fixes video loading)
   - Fix 1: Include missing CSS (fixes styling/animations)

2. **High Priority**:
   - Fix 2: Consistent HTML structure
   - Fix 5: Align JavaScript handlers
   - Fix 6: Aspect ratio constraints

3. **Nice to Have**:
   - Fix 7: Include Women page JS (only if files exist)

---

## Testing Steps

1. **Visual Inspection**:
   - Open both pages side-by-side
   - Compare poster sizes, hover effects, and animations
   - Verify they look identical

2. **Functional Testing**:
   - Click posters on both pages
   - Verify modal opens and video plays (with visible video, not just audio)
   - Test modal close behaviors
   - Check browser console for errors

3. **Technical Validation**:
   - Inspect element on posters - verify CSS classes match
   - Check Network tab - verify video URLs load correctly
   - Inspect modal iframe - verify it has height > 0px
   - Validate HTML structure matches between pages

---

## Notes

- The Women page uses `includes/demo-grid.php` which likely generates the actor grid HTML structure. If this file exists, consider using it or examining its output to match the exact structure.
- The `actors-grid.css` and `spokespeople.css` files are referenced but may be filtered (in .cursorignore). These files contain critical styling rules.
- Per `docs/video-embedding-issues.md`, Bootstrap `embed-responsive` can cause 0px height issues with video elements. The modal fix addresses this.
- If video still fails to render after fixes, check if `talking-heads-player.php` requires specific parameters or returns proper HTML for iframe embedding.

---

**Date**: January 2025  
**Status**: Diagnostic Complete - Awaiting Implementation
