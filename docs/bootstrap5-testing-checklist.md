# Bootstrap 5 Migration - Testing Checklist

**Date:** January 2025  
**Status:** Ready for Visual Testing  
**Bootstrap Version:** 5.3.8 (upgraded from 4.1.3)

---

## Pre-Testing Notes

### What Changed
- ✅ Bootstrap 4.1.3 → Bootstrap 5.3.8 (CDN)
- ✅ jQuery-dependent Bootstrap JS → Vanilla JS Bootstrap 5
- ✅ Data attributes: `data-toggle` → `data-bs-toggle`, `data-target` → `data-bs-target`
- ✅ Image classes: `.img-responsive` → `.img-fluid`
- ✅ New CSS architecture loading (base, layout, components)
- ✅ Legacy CSS still loading temporarily (wth.css, mobile.css, animate.css)

### Critical Areas to Test
1. **Navigation** - Mobile menu toggle, dropdowns
2. **Modals** - Video modals, lightboxes
3. **Tooltips** - Award badges, social icons
4. **Forms** - Contact forms, quote forms
5. **Cards** - Spokesperson cards, award displays
6. **Responsive Layout** - Mobile, tablet, desktop breakpoints

---

## Testing Checklist

### 1. Navigation & Header ✅
**Files Modified:** `includes/header25.php`, `includes/header_b4.php`

**Test Points:**
- [ ] Desktop navigation displays correctly
- [ ] Mobile hamburger menu toggles (data-bs-toggle="collapse")
- [ ] Menu items are clickable and navigate correctly
- [ ] Logo displays at correct size
- [ ] Phone header displays correctly
- [ ] Navigation works on all breakpoints (mobile, tablet, desktop)

**Known Changes:**
- `data-toggle="collapse"` → `data-bs-toggle="collapse"`
- `data-target="#navbarText"` → `data-bs-target="#navbarText"`
- `.img-responsive` → `.img-fluid` (7 instances in header25.php)

**Potential Issues:**
- Mobile menu might not toggle if JavaScript not loading
- Check z-index on mobile menu overlay

---

### 2. Modals & Video Players ✅
**Files Modified:** `includes/showVideo.php`

**Test Points:**
- [ ] Video modals open when clicked
- [ ] Modal backdrop displays correctly
- [ ] Modal closes when clicking outside or close button
- [ ] Video plays correctly in modal
- [ ] Modal responsive on mobile devices

**Known Changes:**
- `data-toggle="modal"` → `data-bs-toggle="modal"`
- `data-target=".bd-example-modal-lg"` → `data-bs-target=".bd-example-modal-lg"`

**Potential Issues:**
- Modal might not open if Bootstrap JS not loading
- Check modal sizing and positioning

---

### 3. Tooltips ✅
**Files Modified:** 17 files (awards, testimonials, seals)

**Test Points:**
- [ ] Tooltips appear on hover for award badges
- [ ] Tooltip text displays correctly
- [ ] Tooltips position correctly (not cut off)
- [ ] Tooltips work on mobile (tap to show)
- [ ] All social icons have working tooltips

**Known Changes:**
- `data-toggle="tooltip"` → `data-bs-toggle="tooltip"`
- jQuery tooltip initialization updated in `includes/bottom.php`

**Potential Issues:**
- Tooltips might not initialize if jQuery loads after Bootstrap
- Check tooltip positioning on mobile

---

### 4. Forms ✅
**Files Checked:** `includes/contactform.php`, `includes/quoteform.php`

**Test Points:**
- [ ] Form fields display correctly
- [ ] Form validation works
- [ ] Submit buttons function correctly
- [ ] Form layout responsive on mobile
- [ ] Form styling matches design

**Known Changes:**
- No Bootstrap form classes found (forms use custom classes)
- Forms should work as-is

**Potential Issues:**
- Form styling might need adjustment if custom CSS conflicts

---

### 5. Cards & Layout ✅
**Files Checked:** Multiple award and card display files

**Test Points:**
- [ ] Card layouts display correctly
- [ ] Card spacing and padding correct
- [ ] Responsive grid works (col-md-*, col-lg-*)
- [ ] Award badges display correctly
- [ ] Image sizing within cards correct

**Known Changes:**
- `.img-responsive` → `.img-fluid` (27 instances)
- Cards already using `.card-body` (Bootstrap 5 compatible)

**Potential Issues:**
- Image sizing might change slightly with `.img-fluid`
- Check card spacing on mobile

---

### 6. Footer ✅
**Files Modified:** `includes/footer25.php`, `includes/footer_b4.php`, `includes/footer.php`

**Test Points:**
- [ ] Footer displays correctly
- [ ] Social icons display and link correctly
- [ ] Breadcrumbs display correctly
- [ ] Footer responsive on mobile
- [ ] Copyright notice displays

**Known Changes:**
- Inline style removed (moved to CSS)
- Social icon styles migrated to `css/components/footer.css`

**Potential Issues:**
- Footer layout might shift slightly
- Check social icon alignment

---

### 7. JavaScript Functionality ✅
**Files Modified:** `includes/footer25.php`, `includes/footer_b4.php`, `includes/footer.php`, `includes/bottom.php`

**Test Points:**
- [ ] Bootstrap components work (modals, dropdowns, tooltips)
- [ ] jQuery still works for custom scripts
- [ ] No JavaScript console errors
- [ ] Page animations work (WOW.js, animate.css)
- [ ] Custom site scripts function

**Known Changes:**
- Bootstrap 4.1.3 JS → Bootstrap 5.3.8 JS bundle (includes Popper)
- Popper.js 1.12.9 removed (included in Bootstrap 5 bundle)
- jQuery kept (used by custom scripts)

**Potential Issues:**
- Bootstrap 5 JS loads before jQuery (correct order)
- Check for any jQuery-dependent Bootstrap code (shouldn't exist)

---

### 8. Responsive Design ✅
**Test Points:**
- [ ] Mobile layout (320px - 767px)
- [ ] Tablet layout (768px - 991px)
- [ ] Desktop layout (992px+)
- [ ] Large desktop (1200px+)
- [ ] Navigation responsive behavior
- [ ] Images scale correctly
- [ ] Text readable on all sizes

**Known Changes:**
- Bootstrap 5 breakpoints are same as Bootstrap 4
- New `xxl` breakpoint available (1400px+) but not used

**Potential Issues:**
- Some custom breakpoints might need adjustment
- Check mobile menu behavior

---

### 9. CSS Loading ✅
**Files Modified:** `includes/css-b4.php`

**Test Points:**
- [ ] All CSS files load correctly
- [ ] No 404 errors for CSS files
- [ ] CSS load order correct (Bootstrap → Base → Components → Utilities)
- [ ] Legacy CSS still loads (temporary)
- [ ] Page styling matches design

**Known Changes:**
- Bootstrap 4 local file → Bootstrap 5.3.8 CDN
- New CSS architecture files added
- Legacy CSS files still loading (wth.css, mobile.css, animate.css)

**Potential Issues:**
- CDN might be blocked in some regions
- Check CSS cascade (new CSS should override legacy where migrated)

---

### 10. Browser Compatibility ✅
**Test Points:**
- [ ] Chrome/Edge (latest)
- [ ] Firefox (latest)
- [ ] Safari (latest)
- [ ] Mobile browsers (iOS Safari, Chrome Mobile)
- [ ] Older browsers (if required)

**Known Changes:**
- Bootstrap 5 drops IE11 support (not an issue for modern sites)
- Uses modern CSS features

**Potential Issues:**
- Very old browsers might have issues
- Check vendor prefixes if needed

---

## Common Bootstrap 5 Migration Issues

### Issue: Modal Not Opening
**Symptom:** Clicking modal trigger does nothing  
**Cause:** Data attributes not updated or Bootstrap JS not loading  
**Fix:** Check `data-bs-toggle="modal"` and `data-bs-target` attributes

### Issue: Tooltips Not Showing
**Symptom:** Hovering over elements doesn't show tooltips  
**Cause:** Tooltip initialization or data attributes  
**Fix:** Check `data-bs-toggle="tooltip"` and jQuery initialization in `bottom.php`

### Issue: Mobile Menu Not Toggling
**Symptom:** Hamburger menu doesn't open/close  
**Cause:** Data attributes or JavaScript  
**Fix:** Check `data-bs-toggle="collapse"` and `data-bs-target="#navbarText"`

### Issue: Images Not Responsive
**Symptom:** Images overflow containers on mobile  
**Cause:** `.img-responsive` not updated to `.img-fluid`  
**Fix:** All instances updated, but check for any missed

### Issue: Layout Shifts
**Symptom:** Elements positioned differently  
**Cause:** Bootstrap 5 spacing/grid changes  
**Fix:** Check custom CSS overrides, verify grid classes

### Issue: Form Styling Broken
**Symptom:** Forms look different  
**Cause:** Bootstrap 5 form changes (but no form classes found)  
**Fix:** Forms use custom classes, should be fine

---

## Testing Procedure

1. **Visual Inspection**
   - Load homepage and check overall appearance
   - Navigate through main sections
   - Check mobile menu functionality
   - Test modals and tooltips

2. **Responsive Testing**
   - Test at multiple breakpoints
   - Check mobile menu behavior
   - Verify image scaling
   - Test form layouts

3. **Functional Testing**
   - Test all interactive elements
   - Verify JavaScript functionality
   - Check form submissions
   - Test navigation links

4. **Browser Testing**
   - Test in multiple browsers
   - Check mobile browsers
   - Verify no console errors

5. **Performance Check**
   - Check page load times
   - Verify CDN loading
   - Check for render-blocking CSS

---

## Files Modified Summary

### Critical Files (Must Test)
- `includes/css-b4.php` - CSS loading
- `includes/footer25.php` - JavaScript loading
- `includes/header25.php` - Navigation
- `includes/showVideo.php` - Modals

### Modified Files (Should Test)
- All award display files (tooltips)
- All header files (navigation)
- All footer files (JavaScript)

### Total Files Modified: 30+ files

---

## Rollback Plan

If critical issues are found:

1. **Quick Rollback:**
   - Revert `includes/css-b4.php` to Bootstrap 4
   - Revert `includes/footer25.php` to Bootstrap 4 JS
   - Keep data attribute changes (they won't break Bootstrap 4)

2. **Partial Rollback:**
   - Keep Bootstrap 5 but fix specific issues
   - Update CSS overrides as needed
   - Fix JavaScript initialization

3. **Full Rollback:**
   - Revert all Phase C changes
   - Restore Bootstrap 4 references
   - Keep new CSS architecture (Phase B) for future use

---

## Next Steps After Testing

1. **Document Issues Found**
   - List all visual regressions
   - Note functional problems
   - Prioritize fixes

2. **Fix Critical Issues**
   - Address breaking changes first
   - Fix visual regressions
   - Update CSS as needed

3. **Complete Phase B Migrations**
   - Finish layout styles migration
   - Complete page-specific styles
   - Migrate whiteboard styles
   - Remove duplicate CSS

4. **Remove Legacy CSS**
   - After all migrations complete
   - Remove wth.css, mobile.css from css-b4.php
   - Keep animate.css (animation library)

---

**End of Testing Checklist**

