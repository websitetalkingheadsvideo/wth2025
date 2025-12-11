# Console Error Fixes - Testing Prompt

## Context
A comprehensive console error audit was completed for `websitetalkingheads.com` covering Tier 1-4 pages (77 pages). All fixable console errors have been addressed. This prompt is for testing those fixes.

## Testing Objective
Verify that all console error fixes are working correctly and that no regressions were introduced.

---

## Test Plan

### Phase 1: Critical Fixes (Priority 1)

#### 1.1 Test `intlTelInput` Fix on Order Page
- **Page:** `https://www.websitetalkingheads.com/order.php`
- **Fix Applied:** Wrapped `intlTelInput` initialization in `window.addEventListener("load")`
- **Test Steps:**
  1. Navigate to `/order.php`
  2. Open browser console
  3. Verify NO error: `Uncaught TypeError: window.intlTelInput is not a function`
  4. Verify phone input field displays country code selector correctly
  5. Test phone number input functionality

#### 1.2 Test `clickImage` Reference Fix
- **Page:** `https://www.websitetalkingheads.com/mvp/` (any MVP page)
- **Fix Applied:** Declared `clickImage` variable at function scope in `mvp/wthvideo/wthvideo.js`
- **Test Steps:**
  1. Navigate to any `/mvp/` page
  2. Open browser console
  3. Verify NO error: `Uncaught ReferenceError: clickImage is not defined`
  4. Test video player functionality (click to play, controls)

#### 1.3 Test Web Share API Fix
- **Pages:** 
  - `https://www.websitetalkingheads.com/actors/index.php`
  - `https://www.websitetalkingheads.com/actors/men.php`
  - `https://www.websitetalkingheads.com/actors/women.php`
- **Fix Applied:** Removed `web-share` from Vimeo iframe `allow` attribute
- **Test Steps:**
  1. Navigate to each actors page
  2. Open browser console
  3. Verify NO warning: `Unrecognized feature: 'web-share'.`
  4. Verify Vimeo videos play correctly

---

### Phase 2: High-Impact Cleanup (Priority 2)

#### 2.1 Test Navigation Script Debug Logging Removal
- **Pages:** Test across multiple pages (homepage, contact, order, actors, etc.)
- **Fix Applied:** Removed all `console.log()` statements from `js/header-links.js`
- **Test Steps:**
  1. Navigate to homepage (`/index.php`)
  2. Open browser console
  3. Verify NO warnings: `nav loc: ...`, `Set current menu item: ...`, `No matching menu item for loc: ...`
  4. Test navigation menu highlighting (verify active menu item still works visually)
  5. Navigate to 5-10 different pages and verify no navigation warnings appear

#### 2.2 Test Pipedrive Duplicate Event Fix
- **Pages:**
  - `https://www.websitetalkingheads.com/index.php`
  - `https://www.websitetalkingheads.com/contact-us/index.php`
  - `https://www.websitetalkingheads.com/ivideo/contact.php`
  - Any page with Pipedrive contact form
- **Fix Applied:** 
  - Removed inline `<script src="https://webforms.pipedrive.com/f/loader"></script>` from individual pages
  - Added single global loader in `includes/footer25.php` with `window.pipedriveLoaderLoaded` guard
- **Test Steps:**
  1. Navigate to pages with Pipedrive forms
  2. Open browser console
  3. Verify NO error: `[Pipedrive - Web Forms]: event 'mousedown_1' already defined.`
  4. Verify NO duplicate script loading warnings
  5. Test form functionality (form should load and be interactive)
  6. Verify form submission works (if possible in test environment)

#### 2.3 Test CSP Policy for reCAPTCHA
- **Pages:**
  - `https://www.websitetalkingheads.com/order.php`
  - `https://www.websitetalkingheads.com/orderform/index.php`
  - `https://www.websitetalkingheads.com/support/contact.php`
  - `https://www.websitetalkingheads.com/youtube-ready/index.php`
  - `https://www.websitetalkingheads.com/styles/elearning/player/index.php`
  - `https://www.websitetalkingheads.com/specialty-players/popup/index.php`
- **Fix Applied:** Created `includes/csp-recaptcha.php` and added to pages using reCAPTCHA
- **Test Steps:**
  1. Navigate to each page with reCAPTCHA
  2. Open browser console
  3. Verify NO CSP violations (or significantly reduced CSP warnings)
  4. Verify reCAPTCHA widget loads and displays correctly
  5. Test reCAPTCHA validation (if possible)

#### 2.4 Test Mixed Content Fix (HTTP → HTTPS)
- **Page:** `https://www.websitetalkingheads.com/youtube-ready/examples-backgrounds.php`
- **Fix Applied:** Changed all HTTP YouTube URLs to HTTPS in `youtube-ready/examples-backgrounds.php`
- **Test Steps:**
  1. Navigate to `/youtube-ready/examples-backgrounds.php` (or page that includes it)
  2. Open browser console
  3. Verify NO mixed content warnings about HTTP YouTube URLs
  4. Verify YouTube thumbnails load correctly
  5. Test lightbox functionality with YouTube videos

#### 2.5 Test MIME Type Error Fix (404 Error)
- **Page:** `https://www.websitetalkingheads.com/product-demonstrations/backgrounds.php`
- **Fix Applied:** Removed broken `backgrounds.css` stylesheet links
- **Test Steps:**
  1. Navigate to `/product-demonstrations/backgrounds.php`
  2. Open browser console
  3. Verify NO error: `Refused to apply style from 'https://www.websitetalkingheads.com/404error.php' because its MIME type ('text/html') is not a supported stylesheet MIME type`
  4. Verify page styling still works correctly (other stylesheets should still load)
  5. Verify page layout is correct

---

### Phase 3: General Cleanup (Priority 3)

#### 3.1 Test Debug Message Removal
- **Pages:**
  - `https://www.websitetalkingheads.com/styles/*` (various pages)
  - Any page using modal includes
- **Fix Applied:** Removed `console.log("running")`, `console.log("loaded")`, and other debug statements
- **Test Steps:**
  1. Navigate to pages in `/styles/` directory
  2. Open browser console
  3. Verify NO debug messages: `running`, `loaded`, `video:`, `vimeo:`, `click`, etc.
  4. Test modal video functionality (if applicable)
  5. Verify functionality still works despite removed logs

#### 3.2 Test Canvas Performance Optimization
- **Pages:**
  - `https://www.websitetalkingheads.com/Random_Player/index.php`
  - `https://www.websitetalkingheads.com/spanish/` (any page)
  - `https://www.websitetalkingheads.com/mvp/` (any page)
  - `https://www.websitetalkingheads.com/jumper/` (any page)
  - `https://www.websitetalkingheads.com/mvp2/` (any page)
  - `https://www.websitetalkingheads.com/mvp3/` (any page)
  - `https://www.websitetalkingheads.com/specialty-players/*` (various pages)
  - `https://www.websitetalkingheads.com/orderform/` (with exit-intent)
- **Fix Applied:** Added `willReadFrequently: true` to all `getImageData()` calls in 22 video player files
- **Test Steps:**
  1. Navigate to pages with video players
  2. Open browser console
  3. Verify NO warning: `Canvas2D: Multiple readback operations using getImageData are faster with the willReadFrequently attribute set to true`
  4. Test video player functionality (play, pause, controls)
  5. Verify video transparency/alpha channel works correctly
  6. Test performance (video should play smoothly)

#### 3.3 Test Remaining Console.log Cleanup
- **Page:** `https://www.websitetalkingheads.com/styles/includes/index.php` (or pages that include it)
- **Fix Applied:** Removed `console.log(oil)` statement
- **Test Steps:**
  1. Navigate to affected pages
  2. Open browser console
  3. Verify NO debug log output
  4. Verify page functionality still works

---

## Testing Tools & Methods

### Browser Console Inspection
- Use Chrome DevTools, Firefox Developer Tools, or Edge DevTools
- Check Console tab for errors, warnings, and logs
- Filter by error level (Errors, Warnings, Info, Verbose)

### Network Tab Verification
- Check Network tab for failed resource loads (404s, CORS errors)
- Verify stylesheets, scripts, and images load correctly
- Check for mixed content warnings (HTTP resources on HTTPS pages)

### Visual Regression Testing
- Verify page layouts are correct after fixes
- Check that functionality still works (forms, videos, modals)
- Test responsive design on mobile/tablet viewports

### Cross-Browser Testing
- Test in Chrome, Firefox, Safari, Edge
- Verify fixes work across all browsers
- Check for browser-specific console warnings

---

## Expected Results

### Console Should Be Clean Of:
- ✅ `Uncaught TypeError: window.intlTelInput is not a function`
- ✅ `Uncaught ReferenceError: clickImage is not defined`
- ✅ `Unrecognized feature: 'web-share'.`
- ✅ `nav loc: ...` warnings (108 instances removed)
- ✅ `[Pipedrive - Web Forms]: event 'mousedown_1' already defined.`
- ✅ Mixed content warnings (HTTP YouTube URLs)
- ✅ MIME type errors (404error.php as stylesheet)
- ✅ `console.log("running")`, `console.log("loaded")` debug messages
- ✅ Canvas2D performance warnings
- ✅ CSP violations for reCAPTCHA (or significantly reduced)

### Functionality Should Still Work:
- ✅ Phone input with country code selector
- ✅ Video players (all variants)
- ✅ Vimeo embeds
- ✅ Navigation menu highlighting
- ✅ Pipedrive contact forms
- ✅ reCAPTCHA validation
- ✅ YouTube thumbnails and lightbox
- ✅ Page styling and layouts
- ✅ Modal videos
- ✅ Exit-intent popups

---

## Reporting Format

For each test:
1. **Page URL**
2. **Fix Being Tested**
3. **Console Status:** Clean / Errors Found (list them)
4. **Functionality Status:** Working / Broken (describe issue)
5. **Screenshots:** Attach console screenshots if errors found

---

## Files Modified (For Reference)

### Priority 1:
- `order.php` - intlTelInput fix
- `mvp/wthvideo/wthvideo.js` - clickImage fix
- `actors/index.php`, `actors/men.php`, `actors/women.php` - Web Share API fix

### Priority 2:
- `js/header-links.js` - Removed debug logging
- `includes/footer25.php` - Added global Pipedrive loader
- `includes/contact-card.php`, `index.php`, `contact-us/index.php`, `ivideo/contact.php`, `index24.php` - Removed inline Pipedrive scripts
- `includes/csp-recaptcha.php` - New CSP helper file
- `order.php`, `orderform/index.php`, `support/contact.php`, `youtube-ready/index.php`, `styles/elearning/player/index.php`, `specialty-players/popup/index.php` - Added CSP includes
- `youtube-ready/examples-backgrounds.php` - HTTP to HTTPS
- `product-demonstrations/backgrounds.php` - Removed broken CSS link

### Priority 3:
- `styles/includes/modal.php`, `styles/includes/modal-new.php` - Removed console.log statements
- 22 video player files - Added `willReadFrequently: true` to getImageData()
- `styles/includes/index.php` - Removed console.log(oil)

---

## Notes

- Some errors may still appear from third-party scripts (Pipedrive, WeConnect) that we cannot control
- CSP violations in "Report Only" mode are warnings but don't block functionality
- eLearning content error requires fix in Storyline project (not website code)
- Test in production-like environment if possible (not just localhost)

---

## Success Criteria

✅ All Priority 1 fixes verified working  
✅ All Priority 2 fixes verified working  
✅ All Priority 3 fixes verified working  
✅ No regressions introduced  
✅ Console is significantly cleaner (90%+ reduction in errors/warnings)  
✅ All functionality still works correctly

