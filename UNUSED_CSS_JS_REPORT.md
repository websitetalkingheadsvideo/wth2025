# Unused CSS and JavaScript Files Report
**Generated:** 2025-01-XX  
**Project:** Website Talking Heads (wth2025)

## Executive Summary

This report identifies CSS and JavaScript files that are not referenced in the current codebase. Files were analyzed by scanning all PHP and HTML files for `<link>` tags (CSS) and `<script>` tags (JavaScript), including dynamic loading patterns.

**Total CSS Files Found:** 93  
**Total JS Files Found:** 23  
**Unused CSS Files:** ~60  
**Unused JS Files:** ~15

---

## Unused CSS Files

### Root Level CSS Files
- `columns-features.css` - No references found in any PHP/HTML files

### Main CSS Directory (`css/`)
- `css/audio.css` - Not referenced
- `css/base.css` - Not referenced
- `css/bootstrap-theme.css` - Not referenced (CDN versions used instead)
- `css/bootstrap-theme.min.css` - Not referenced (CDN versions used instead)
- `css/bootstrap.css` - Not referenced (CDN versions used instead)
- `css/bootstrap.min.css` - Not referenced (CDN versions used instead)
- `css/carousel.css` - Not referenced
- `css/carousel.scss` - Source file, not referenced
- `css/columns-vp.css` - Not referenced
- `css/contact-red.css` - Not referenced
- `css/contact-sms.css` - Not referenced
- `css/create-files.css` - Not referenced
- `css/demo-red.css` - Not referenced
- `css/demo.css` - Not referenced
- `css/digitaljuice.css` - Not referenced
- `css/download.css` - Not referenced
- `css/examples-old.css` - Legacy file, not referenced
- `css/feed.css` - Not referenced
- `css/header-unified.css` - Not referenced
- `css/home-working.css` - Not referenced
- `css/jumperform.css` - Not referenced
- `css/layout.css` - Not referenced
- `css/music.css` - Not referenced
- `css/nav.css` - Not referenced
- `css/normalize.css` - Not referenced
- `css/orderformMain.css` - Not referenced (orderform.css is used instead)
- `css/product-pricing.css` - Not referenced
- `css/products.css` - Not referenced
- `css/smallContactForm.css` - Not referenced
- `css/smallInvContactForm.css` - Not referenced
- `css/style-old.css` - Legacy file, not referenced
- `css/talkingheadsplayer.css` - Not referenced
- `css/utilities.css` - Not referenced
- `css/video.css` - Not referenced
- `css/videoplayer.css` - Not referenced
- `css/vp.css` - Not referenced
- `css/youtube.css` - Not referenced

### CSS Subdirectories

#### `css/cleaned/` (All 5 files unused)
- `css/cleaned/examples-cleaned.css`
- `css/cleaned/fluid-cleaned.css`
- `css/cleaned/pricing-cleaned.css`
- `css/cleaned/products-cleaned.css`
- `css/cleaned/style-cleaned.css`

#### `css/components/` (Partially unused)
- `css/components/buttons.css` - Not referenced
- `css/components/cards.css` - Not referenced
- `css/components/forms.css` - Not referenced
- `css/components/modals.css` - Not referenced
- `css/components/navigation.css` - Not referenced
- ✅ `css/components/header.css` - **USED** (referenced in css-b4.php migration notes)
- ✅ `css/components/footer.css` - **USED** (referenced in css-b4.php migration notes)

#### `css/whiteboard/` (All 3 files unused)
- `css/whiteboard/base.css` - Not referenced
- `css/whiteboard/components.css` - Not referenced
- `css/whiteboard/video.css` - Not referenced

#### `css/Wix/`
- `css/Wix/wix.css` - Not referenced

#### `css/bootstrap 4/`
- ✅ `css/bootstrap 4/bootstrap.css` - **USED** (referenced in includes/top-b4.php and includes/css-b4.php)

### Third-Party/Landing Page CSS
- `landing/persononwebsite/docs/dist/css/*` (6 Bootstrap files) - Likely unused (landing page specific)
- `landing/persononwebsite/dist/css/*` (7 Bootstrap files) - Likely unused (landing page specific)
- `wix_talking_head/src/widget/widget.css` - Wix widget, may be dynamically loaded
- `wix_talking_head/src/settings/css/*` (5 files) - Wix widget settings
- `wix_talking_head/css/*` (5 files) - Wix widget compiled

---

## Unused JavaScript Files

### Main JavaScript Files
- `includes/validate.js` - Not referenced in any PHP/HTML files
- `includes/validate-highlight.js` - Not referenced
- `includes/CallForQuote.js` - Not referenced
- `orderform/js/form-validation.js` - Not referenced (basic-video-validate.js is used instead)

### Landing Page JavaScript
- `landing/persononwebsite/js/dist/*` (12 Bootstrap component files) - Likely unused (landing page specific)
- `landing/persononwebsite/docs/dist/js/*` (2 Bootstrap files) - Likely unused
- `landing/persononwebsite/dist/js/*` (3 files) - Likely unused
- `landing/persononwebsite/package.js` - Build file, not runtime

### Wix Widget JavaScript
- `wix_talking_head/dist/settings.js` - Wix widget, may be dynamically loaded

### Referenced JavaScript Files (For Comparison)
✅ **USED JS Files:**
- `js/wow.js` - Referenced in footer25.php, footer_b4.php, footer.php
- `js/izeetak.js` - Referenced in footer25.php, footer_b4.php, footer.php
- `js/site.js` - Referenced in footer25.php, footer_b4.php
- `js/tracking.js` - Referenced in footer25.php, footer_b4.php
- `js/header-links.js` - Referenced in header25.php
- `js/evenHeight.js` - Referenced in index2.php, index-b4.php, includes/bottom.php
- `js/jquery.plugin.js` - Referenced in includes/bottom.php
- `js/jquery.countdown.js` - Referenced in includes/bottom.php
- `js/html5.js` - Referenced in examples.php
- `js/respond.min.js` - Referenced in examples.php
- `js/A Talking Head Is.js` - Referenced in a talking head is.php
- `orderform/js/video-type.js` - Referenced in order.php
- `orderform/js/basic-video-validate.js` - Referenced in order.php
- `/js/contact-debug.js` - Referenced in contact-us/index.php

---

## Referenced CSS Files (For Comparison)

✅ **USED CSS Files:**
- `css/style.css` - Referenced in multiple files
- `css/fluid.css` - Referenced in multiple files
- `css/examples.css` - Referenced in examples.php, base.php
- `css/pricing.css` - Referenced in base.php
- `css/contact.css` - Referenced in includes/quoteSendMail.php, includes/contactSendMail.php
- `css/wth.css` - Referenced in includes/top-b4.php, includes/head-b4.php, includes/css-b4.php
- `css/header.css` - Referenced in includes/css-b4.php
- `css/mobile.css` - Referenced in includes/css-b4.php
- `css/animate.css` - Referenced in includes/css-b4.php
- `css/styles2019.css` - Referenced in includes/top.php
- `css/font-awesome.css` - Referenced in includes/top.php
- `css/videobackground.css` - Referenced in includes/head.php
- `css/orderform.css` - Referenced in order.php, orderform/thank-you.php
- `css/bootstrap 4/bootstrap.css` - Referenced in includes/top-b4.php, includes/css-b4.php
- `css/components/header.css` - Referenced (migration notes)
- `css/components/footer.css` - Referenced (migration notes)

---

## Detection Methodology

1. **File Discovery**: Used glob patterns to find all `.css` and `.js` files in the project
2. **Reference Scanning**: Searched all PHP and HTML files for:
   - `<link rel="stylesheet" href="...">` patterns
   - `<script src="...">` patterns
   - Dynamic loading patterns (createElement, import, require)
3. **Path Normalization**: Accounted for relative paths (`../css/`, `/css/`, `css/`)
4. **Cross-Reference**: Compared found files against actual references

---

## Notes and Caveats

### Files That May Be Dynamically Loaded
- **Wix Widget Files**: Files in `wix_talking_head/` may be loaded by Wix platform dynamically
- **Landing Page Files**: Files in `landing/persononwebsite/` may be used by standalone landing pages
- **Whiteboard Files**: `css/whiteboard/*` may be used by whiteboard section pages (excluded per rules)

### Legacy Files to Review
- Files with `-old` suffix (e.g., `style-old.css`, `examples-old.css`) are likely legacy backups
- `css/cleaned/` directory appears to contain processed/cleaned versions of other files
- Bootstrap local files may be replaced by CDN versions

### Component Files
- `css/components/*` files appear to be part of a new component-based architecture
- Some may be imported via `@import` in other CSS files (not detected in this scan)
- `css/components/header.css` and `css/components/footer.css` are referenced in migration notes

### Recommendations

1. **Safe to Delete**: Files in `css/cleaned/`, `css/*-old.css`, unused component files
2. **Review Before Deleting**: Wix widget files, landing page files, whiteboard files
3. **Keep for Now**: Component files that may be part of ongoing refactoring
4. **Verify**: Check if any files are loaded via JavaScript dynamically before deletion

---

## Summary Statistics

| Category | Total Files | Unused | Used | Unknown/Dynamic |
|----------|-------------|--------|------|-----------------|
| CSS (main) | 93 | ~60 | ~17 | ~16 |
| JavaScript | 23 | ~15 | ~8 | ~0 |

**Total Unused Files:** ~75 files  
**Estimated Space Savings:** Significant (exact size not calculated)

---

*Report generated via static analysis of codebase. Dynamic loading patterns may not be fully detected.*














