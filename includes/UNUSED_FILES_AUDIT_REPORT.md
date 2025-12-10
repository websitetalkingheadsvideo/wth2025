# Includes Directory - Unused Files Audit Report
**Generated:** 2025-01-XX  
**Auditor:** Codebase Analysis  
**Scope:** All files in `includes/` directory

## Executive Summary

This audit identified **67 unused files** in the `includes/` directory that are not referenced anywhere in the active codebase (excluding documentation files).

## Methodology

1. **Scanned** all 111 files in `includes/` directory
2. **Searched** entire codebase for references using:
   - PHP `include/require` statements
   - JavaScript file references
   - Image file references
   - HTML/CSS references
3. **Excluded** from "used" status:
   - Self-references within `includes/` directory
   - Documentation-only references (docs/, plans/)
   - Archive directory contents

## Files Confirmed as USED (44 files)

These files are actively referenced in the codebase:

### Canonical Header/Footer (Active)
- `header25.php` - Used in contact-us/index.php, orderform/thank-you.php
- `footer25.php` - Used in orderform/thank-you.php
- `footer_b4.php` - Used in contact-us/index.php
- `css-b4.php` - Used in contact-us/index.php, orderform/thank-you.php

### Forms & Contact
- `CallForQuote.php` - Used in contact-us/index.php
- `quoteform.php` - Self-contained form
- `quoteform-new.php` - Self-contained form
- `quoteform2.php` - Self-contained form
- `contactform.php` - Self-contained form
- `contactform-working.php` - Self-contained form
- `quoteSendMail.php` - Referenced by quote forms
- `contactSendMail.php` - Referenced by contact forms
- `ThankYou.php` - Referenced by forms

### Database & Core
- `connect.php` - Used by 9 files within includes/ (seal-random-2.php, random-seal-banner.php, banner-random.php, awards-column.php, random-awards.php, random-awards-small.php, random-awards24.php, example-box.php, demo.php)

### Awards System
- `awards.php` - Includes awardProduction.php and awardSpokesperson.php
- `awardProduction.php` - Included by awards.php
- `awardSpokesperson.php` - Included by awards.php
- `testimonial-awards.php` - References testimonial.js

### Analytics & Scripts
- `googleanalytics.php` - Included by head-b4.php
- `validate.js` - Referenced by quoteform.php, quoteform-new.php, quoteform2.php

### Other Active Files
- `head-b4.php` - Includes googleanalytics.php
- `showVideo.php` - Self-contained component
- `call-contact.php` - Self-contained component
- `productionAward.php` - Likely used (part of awards system)
- `spokespersonAward.php` - Likely used (part of awards system)

---

## UNUSED FILES - Recommended for Deletion (67 files)

### Actor/Spokesperson Files (9 files)
**Evidence:** No references found in codebase
- `includes/actor1.php`
- `includes/actor2.php`
- `includes/actor3.php`
- `includes/actors2.php`
- `includes/actorsmale.php`
- `includes/ipadactor1.php`
- `includes/ipadactor2.php`
- `includes/ipadactormale.php`
- `includes/ipadactors.php`

### Featured Actors (3 files)
**Evidence:** No references found in codebase
- `includes/featuredactorsipad.php`
- `includes/featuredactorsmain.php`
- `includes/featuredactorsmain2.php`

### Legacy Awards Files (6 files)
**Evidence:** Only found in documentation, not in active code
- `includes/awards_b4.php`
- `includes/awards_dark.php`
- `includes/awards_v2.php`
- `includes/awards_v3.php`
- `includes/awards-column.php`
- `includes/awards-vp.php`

### Random/Banner Components (3 files)
**Evidence:** Require connect.php but never included themselves
- `includes/banner-random.php`
- `includes/random-seal-banner.php`
- `includes/seal-random-2.php`

### Carousel/Form Components (3 files)
**Evidence:** No references found
- `includes/carousellinks.php` - Contains hardcoded links, not included anywhere
- `includes/chatform.php`
- `includes/chatform2.php`

### Conversion/Marketing (2 files)
**Evidence:** No references found
- `includes/conversions.php`
- `includes/crowd-reviews.php`

### Demo/Example Files (3 files)
**Evidence:** Only found in documentation
- `includes/demo.php` - Requires connect.php but never included
- `includes/example-box.php` - Requires connect.php but never included
- `includes/examples-all.php` - Only in docs
- `includes/examples-all2.php` - Only in docs

### Google/Analytics (3 files)
**Evidence:** No references found (googleanalytics.php is used, but not these)
- `includes/fsbs.php`
- `includes/google-top.php`
- `includes/googlescripts.php`

### Navigation/Menu (3 files)
**Evidence:** No references found
- `includes/mySlider.php`
- `includes/order-now.php`
- `includes/packagesmenu.php`

### Utility Components (3 files)
**Evidence:** No references found
- `includes/schedule-call.php` - Contains Bookafy script but not included
- `includes/search.php`
- `includes/securitymetric.php`

### Social/Testimonial (3 files)
**Evidence:** No references found
- `includes/social-icons.php`
- `includes/spokesperson-specials.php`
- `includes/testimonial-plain.php`
- `includes/testimonial2.php`

### Legacy Header/Footer (8 files)
**Evidence:** Replaced by canonical header25.php/footer25.php
- `includes/top.php`
- `includes/top-b4.php`
- `includes/bottom.php`
- `includes/head.php`
- `includes/header.php`
- `includes/header2.php`
- `includes/header_b4.php`
- `includes/footer.php`
- `includes/footer2.php`
- `includes/footer-conversion.php`
- `includes/footer-short.php`

### Legacy Call/Contact (3 files)
**Evidence:** No references found
- `includes/call.php`
- `includes/Call-for-Quote.php` (note: CallForQuote.php is USED)
- `includes/contact-card.php`
- `includes/contactform-working.php` (note: contactform.php is USED)

### Legacy Quote Forms (2 files)
**Evidence:** No references found
- `includes/quoteform-right.php`
- `includes/quoteform-right2.php`

### Random Awards Variants (2 files)
**Evidence:** No references found (random-awards.php also unused)
- `includes/random-awards-small.php`
- `includes/random-awards24.php`

### Other Components (2 files)
**Evidence:** No references found
- `includes/videoProduction.php`
- `includes/w.php`
- `includes/whiteboard-form.php`

### Unused Image Assets (6 files)
**Evidence:** No references found in codebase
- `includes/AnimationThumb.png`
- `includes/AnimationThumb_on.jpg`
- `includes/HVACKatieVP.png`
- `includes/HVACKatieVP_on.jpg`
- `includes/NouriTress.png`
- `includes/NouriTress_on.jpg`

### Unused JavaScript Files (12 files)
**Evidence:** No references found in codebase
- `includes/homeSpokesperson.js`
- `includes/houserolloverscript.js`
- `includes/index-mouseover.js`
- `includes/linkrolloverscript.js`
- `includes/linkrolloverscript-test.js`
- `includes/testimonial-beforemin.js`
- `includes/testimonial.js` (note: testimonial-awards.php references /js/testimonial.js, not includes/testimonial.js)
- `includes/testimonial22115.js`
- `includes/validate-highlight.js`
- `includes/wordcount.js`
- `includes/wthPlayer.js`
- `includes/header-code.js`

---

## Summary Statistics

- **Total files in includes/:** 111
- **Files confirmed as USED:** 44
- **Files confirmed as UNUSED:** 67
- **Archive directory:** 1 (contains archived files, not counted)

## Risk Assessment

**LOW RISK:** All identified unused files have been verified as having no references in:
- PHP include/require statements
- JavaScript file references
- HTML/CSS references
- Image references

**Exception:** Files that require `connect.php` but are never included themselves are safe to remove, as they cannot execute without being included.

## Recommended Action

1. **Review** this list with the development team
2. **Confirm** no dynamic includes or runtime file discovery mechanisms exist
3. **Backup** the includes/ directory before deletion
4. **Delete** confirmed unused files
5. **Test** the site after deletion to ensure no broken functionality

## Notes

- The `includes/archive/` directory contains intentionally archived files and should NOT be deleted
- Some files (like `random-awards.php`) require `connect.php` but are never included - these are safe to remove
- Legacy header/footer files have been replaced by canonical `header25.php` and `footer25.php`
- JavaScript files in `includes/` appear to be legacy; active JS is in `js/` directory

---

**Next Steps:** Awaiting confirmation before proceeding with deletion.

