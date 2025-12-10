# Bootstrap 5 Upgrade & CSS Refactor - Detailed Migration Plan

**Date:** January 2025  
**Status:** Phase 2 - Plan Creation (READ-ONLY)  
**Based On:** Discovery Report (`docs/bootstrap5-discovery-report.md`)

---

## Executive Summary

This plan provides a step-by-step process to upgrade `websitetalkingheads.com` from Bootstrap 4.1.3 to Bootstrap 5.3.8 and refactor the CSS architecture to be Bootstrap-first, organized, and maintainable while maintaining visual parity.

**Critical Finding:** Many CSS files referenced in code are not in the local repository (likely on production server). The plan accounts for this by requiring CSS file retrieval before migration begins.

---

## 🚨 HARD STOP #1 - PLAN APPROVAL REQUIRED

**This plan requires explicit approval before any file modifications begin.**

**No files have been modified during discovery or planning phases.**

**Reply with `APPROVE PLAN` to proceed to CSS architecture creation phase.**

---

## Phase A: Pre-Migration Preparation (READ-ONLY)

### Step A.1: Retrieve Missing CSS Files from Production

**Objective:** Download all CSS files referenced in code but missing from repository.

**Actions:**
1. Download from production server:
   - `css/bootstrap 4/bootstrap.css`
   - `css/wth.css`
   - `css/header.css`
   - `css/animate.css`
   - `css/styles2019.css`
   - `css/fluid.css`
   - `css/font-awesome.css`
   - `css/style.css`
   - `css/videobackground.css`
   - `css/contact.css`
   - `whiteboard/blue/css/video.css`
   - Any other CSS files referenced in includes

2. Add downloaded files to repository in appropriate locations
3. Document file purposes and dependencies

**Deliverable:** Complete CSS file inventory with all files present locally.

**Risk:** High - Cannot proceed without these files.

---

### Step A.2: Create Baseline Documentation

**Objective:** Document current state for comparison and rollback.

**Actions:**
1. Git commit: "Pre-Bootstrap 5 migration baseline"
2. Create screenshots of key pages:
   - Homepage
   - Spokespeople pages
   - Order form
   - Contact page
   - Whiteboard section
   - All breakpoints (mobile, tablet, desktop)
3. Document current Bootstrap version in comments
4. List all pages using each include file

**Deliverable:** Baseline documentation package.

**Risk:** Low - Documentation only.

---

## Phase B: New CSS Architecture Creation (EXECUTION - HARD STOP #2)

**⚠️ HARD STOP #2:** After completing Phase B, stop and wait for `APPROVE CSS ARCHITECTURE` before proceeding to Phase C.

### Step B.1: Create New CSS Directory Structure

**Objective:** Establish organized CSS architecture per `css_organization.mdc` rules.

**Actions:**
1. Create new directory structure:
   ```
   css/
     base.css                    # Resets, root variables, typography, colors
     layout.css                  # Grid overrides, global layout helpers
     components/
       header.css                # Header/navigation component
       footer.css                # Footer component
       buttons.css               # Button variants
       cards.css                 # Card components
       modals.css                # Modal components
       forms.css                 # Form components
       navigation.css            # Navigation-specific styles
     pages/
       # Page-specific styles (minimal, only when necessary)
     utilities.css               # Small utility classes complementing Bootstrap
     whiteboard/
       base.css                  # Whiteboard-specific base styles
       components.css            # Whiteboard-specific components
       video.css                 # Video player styles
   ```

2. Create empty CSS files with header comments describing purpose
3. Document file loading order in comments

**Files to Create:**
- `css/base.css`
- `css/layout.css`
- `css/components/header.css`
- `css/components/footer.css`
- `css/components/buttons.css`
- `css/components/cards.css`
- `css/components/modals.css`
- `css/components/forms.css`
- `css/components/navigation.css`
- `css/utilities.css`
- `css/whiteboard/base.css`
- `css/whiteboard/components.css`
- `css/whiteboard/video.css`

**Deliverable:** New CSS directory structure with empty files.

**Risk:** Low - Creating new files only.

---

### Step B.2: Migrate Base Styles

**Objective:** Extract base styles (resets, variables, typography, colors) to `css/base.css`.

**Source Files:**
- `css/wth.css` (after retrieval)
- `css/mobile.css` (base styles section)
- `css/bootstrap 4/bootstrap.css` (custom overrides only)

**Actions:**
1. Extract CSS custom properties (variables) if any
2. Extract typography rules (font families, sizes, line heights)
3. Extract color definitions
4. Extract reset/normalize rules
5. Extract root-level styles
6. Remove duplicates
7. Prefer Bootstrap 5 CSS variables where possible

**Deliverable:** `css/base.css` with all base styles.

**Risk:** Medium - Must preserve all base styling.

---

### Step B.3: Migrate Layout Styles

**Objective:** Extract layout styles to `css/layout.css`.

**Source Files:**
- `css/wth.css` (layout sections)
- `css/mobile.css` (layout sections)
- `css/fluid.css` (if exists)

**Actions:**
1. Extract grid overrides
2. Extract container styles
3. Extract page wrapper styles
4. Extract section spacing
5. Remove duplicates
6. Use Bootstrap 5 utilities where possible

**Deliverable:** `css/layout.css` with layout styles.

**Risk:** Medium - Layout changes are highly visible.

---

### Step B.4: Migrate Component Styles

**Objective:** Extract component styles to `css/components/*.css`.

**Source Files:**
- `css/header.css` → `css/components/header.css`
- `css/wth.css` (component sections)
- `css/mobile.css` (component sections)

**Component Breakdown:**

**Header Component (`css/components/header.css`):**
- Navigation styles
- Logo styles
- Menu button styles
- Phone header styles

**Footer Component (`css/components/footer.css`):**
- Footer layout
- Social icons
- Breadcrumb styles
- Copyright styles

**Buttons Component (`css/components/buttons.css`):**
- Custom button variants
- Button states
- Button sizes

**Cards Component (`css/components/cards.css`):**
- Card variants
- Card layouts
- Card content styles

**Modals Component (`css/components/modals.css`):**
- Modal customizations
- Modal overlays
- Modal content styles

**Forms Component (`css/components/forms.css`):**
- Form layouts
- Input styles
- Validation styles
- Form-specific components

**Navigation Component (`css/components/navigation.css`):**
- Navbar customizations
- Menu styles
- Dropdown styles

**Actions:**
1. Extract component-specific styles
2. Remove duplicates
3. Use Bootstrap 5 component classes where possible
4. Document component dependencies

**Deliverable:** All component CSS files populated.

**Risk:** Medium - Components are user-facing.

---

### Step B.5: Migrate Page-Specific Styles

**Objective:** Extract page-specific styles to `css/pages/*.css` (minimal approach).

**Source Files:**
- `css/contact.css` → `css/pages/contact.css`
- `css/videobackground.css` → `css/pages/video-background.css`
- Other page-specific CSS files

**Actions:**
1. Only create page-specific CSS if truly necessary
2. Prefer component-based approach
3. Document why page-specific CSS is needed

**Deliverable:** Minimal page-specific CSS files.

**Risk:** Low - Page-specific styles are isolated.

---

### Step B.6: Create Utilities CSS

**Objective:** Extract utility classes to `css/utilities.css`.

**Source Files:**
- `css/wth.css` (utility classes)
- `css/mobile.css` (utility classes)

**Actions:**
1. Extract custom utility classes
2. Identify classes that can be replaced with Bootstrap utilities
3. Keep only utilities that Bootstrap doesn't provide
4. Document utility usage

**Deliverable:** `css/utilities.css` with minimal custom utilities.

**Risk:** Low - Utilities are additive.

---

### Step B.7: Migrate Whiteboard Styles

**Objective:** Create isolated whiteboard CSS system.

**Source Files:**
- `whiteboard/css/whiteboard.css` (after retrieval)
- `whiteboard/css/video.css` (after retrieval)
- `whiteboard/css/style.css` (after retrieval)
- `whiteboard/blue/css/video.css` (after retrieval)
- Other whiteboard CSS files

**Actions:**
1. Move all whiteboard styles to `css/whiteboard/`
2. Use namespacing (`.wb-*` prefix) or body class scoping
3. Ensure no main-site styles affect whiteboard
4. Ensure no whiteboard styles affect main site
5. Document isolation strategy

**Deliverable:** `css/whiteboard/` structure with all whiteboard styles.

**Risk:** Medium - Whiteboard is separate but must remain functional.

---

### Step B.8: Extract Inline Styles

**Objective:** Move all inline styles to external CSS files.

**Files with Inline Styles:**
- `includes/footer25.php` - Line 61: `style="font-size: .75rem"`

**Actions:**
1. Move inline style to appropriate CSS file (likely `css/components/footer.css`)
2. Remove `style="..."` attribute from markup
3. Verify no other inline styles exist

**Deliverable:** No inline styles remaining.

**Risk:** Low - Single instance found.

---

### Step B.9: Remove Duplicate and Dead CSS

**Objective:** Clean up CSS by removing duplicates and unused rules.

**Actions:**
1. Use CSS analysis tools or manual grep to find duplicate rules
2. Consolidate duplicates into single rule
3. Search codebase for CSS class usage
4. Remove selectors with no matches (dead CSS)
5. Document removed rules

**Deliverable:** Clean, DRY CSS with no duplicates or dead code.

**Risk:** Medium - Must ensure no active styles are removed.

---

### Step B.10: Replace Custom CSS with Bootstrap Utilities

**Objective:** Reduce custom CSS by using Bootstrap 5 utilities.

**Actions:**
1. Identify custom utility classes that match Bootstrap utilities
2. Document replacements needed in markup (for Phase C)
3. Remove custom CSS rules that Bootstrap provides
4. Examples:
   - Custom `.center-block` → Bootstrap `.mx-auto`
   - Custom spacing classes → Bootstrap `m-*`, `p-*`
   - Custom flex classes → Bootstrap `d-flex`, `justify-content-*`

**Deliverable:** Reduced custom CSS, list of markup updates needed.

**Risk:** Low - Utilities are additive, can be tested.

---

**⚠️ HARD STOP #2 - PHASE B COMPLETE**

After completing all Phase B steps:

1. **Summarize:**
   - New CSS files created
   - Legacy CSS still in use (not yet removed)
   - Mapping between old and new structure
   - Files that will need markup updates

2. **Confirm:**
   - PHP/HTML templates have NOT been changed
   - `includes/css-b4.php` has NOT been changed
   - Bootstrap 4 is still loading in production

3. **Request Approval:**
   > "The new CSS architecture has been created and populated according to the plan.  
   > PHP/HTML templates and Bootstrap wiring have not yet been modified.  
   > Reply with **APPROVE CSS ARCHITECTURE** to proceed to template/markup updates, or request adjustments."

**Then stop and wait for approval.**

---

## Phase C: Bootstrap 5 Upgrade & Markup Updates (EXECUTION - GATED)

**⚠️ Each step in Phase C requires explicit `PROCEED STEP X` approval before execution.**

### Step C.1: Update `includes/css-b4.php` to Bootstrap 5

**Objective:** Upgrade Bootstrap CSS from 4.1.3 to 5.3.8 using CDN.

**Current State:**
```php
<link href="https://www.websitetalkingheads.com/css/bootstrap 4/bootstrap.css" rel="stylesheet" type="text/css">
```

**New State:**
```php
<!-- Bootstrap 5.3.8 - Updated from Bootstrap 4.1.3 (CDN) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
```

**Actions:**
1. Replace Bootstrap 4 local file link with Bootstrap 5.3.8 CDN link
2. Use official Bootstrap CDN: `https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css`
3. Include integrity hash for security: `sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz`
4. Update Font Awesome if needed (currently 5.14.0 - check compatibility)
5. Add comment header: "Bootstrap 5.3.8 - Updated from Bootstrap 4.1.3 (CDN)"
6. Update CSS file load order:
   - Bootstrap 5 CSS (CDN)
   - Typekit fonts
   - Font Awesome
   - Base CSS
   - Layout CSS
   - Component CSS
   - Page CSS
   - Utilities CSS
7. Keep existing CSS file references (they'll be updated in later steps)
8. **Note:** Bootstrap 4 local file (`css/bootstrap 4/bootstrap.css`) will remain in repository but will no longer be referenced

**Files to Modify:**
- `includes/css-b4.php`

**Dependencies:** None (can be done first)

**Risk:** High - This changes Bootstrap version globally.

**Approval Required:** `PROCEED STEP C.1`

---

### Step C.2: Update Footer JavaScript to Bootstrap 5

**Objective:** Upgrade Bootstrap JS from 4.1.3 to 5.3.8 (vanilla JS).

**Files to Modify:**
- `includes/footer25.php` (PRIMARY)
- `includes/footer_b4.php`
- `includes/footer.php`

**Current State:**
```php
<script src="https://code.jquery.com/jquery-3.2.1.min.js" ...></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ...></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ...></script>
```

**New State:**
```php
<!-- Bootstrap 5.3.8 JS - No jQuery dependency, Popper included (CDN) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<!-- Keep jQuery if used elsewhere (verify usage) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" ...></script>
```

**Actions:**
1. Remove Popper.js 1.12.9 (Bootstrap 5 includes Popper)
2. Replace Bootstrap 4.1.3 JS with Bootstrap 5.3.8 JS bundle from CDN
3. Use official Bootstrap CDN: `https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js`
4. Include integrity hash for security: `sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+`
5. Keep jQuery if used elsewhere (verify with grep)
6. Add comment: "Bootstrap 5.3.8 - Updated from Bootstrap 4.1.3 (CDN)"

**JavaScript Migration:**
- Update any jQuery Bootstrap calls to vanilla JS Bootstrap 5 APIs
- Example: `$('#myModal').modal()` → `new bootstrap.Modal(document.getElementById('myModal'))`
- Check `includes/bottom.php` for jQuery Bootstrap usage

**Dependencies:** None (can run parallel with C.1)

**Risk:** High - JavaScript changes affect interactivity.

**Approval Required:** `PROCEED STEP C.2`

---

### Step C.3: Update Data Attributes (Bootstrap 4 → 5)

**Objective:** Update all `data-toggle`/`data-target` to `data-bs-toggle`/`data-bs-target`.

**Files to Modify (46 instances across 20 files):**
- `includes/header25.php` - **CRITICAL** (navbar toggler)
- `includes/header_b4.php`
- `includes/awards.php` and variants
- `includes/testimonial-awards.php`
- `includes/spokespersonAward.php`
- `includes/productionAward.php`
- `includes/showVideo.php`
- `includes/demo.php`
- `includes/example-box.php`
- `includes/bottom.php`
- All other files with `data-toggle`/`data-target`

**Pattern:**
- `data-toggle="collapse"` → `data-bs-toggle="collapse"`
- `data-target="#navbarText"` → `data-bs-target="#navbarText"`

**Actions:**
1. Use find/replace for simple attribute changes
2. Manual review for complex patterns
3. Test each change incrementally
4. Update JavaScript initialization if needed

**Dependencies:** C.1, C.2 (Bootstrap 5 must be loaded)

**Risk:** High - Data attributes are critical for Bootstrap JS functionality.

**Approval Required:** `PROCEED STEP C.3`

---

### Step C.4: Update Form Markup Patterns

**Objective:** Update Bootstrap 4 form patterns to Bootstrap 5.

**Patterns to Update:**
- `.form-group` → `.mb-3` (or Bootstrap 5 form structure)
- `.form-row` → `.row` with `.g-*` utilities
- `.input-group-addon` → `.input-group-text`
- `.input-group-btn` → direct button in `.input-group`

**Files to Modify (57 instances across 20 files):**
- All files with form patterns (to be determined by audit)

**Actions:**
1. Audit all form pages
2. Update form markup systematically
3. Test form functionality and styling
4. Update validation styling if needed

**Dependencies:** C.1, C.2

**Risk:** Medium - Forms are critical user interactions.

**Approval Required:** `PROCEED STEP C.4`

---

### Step C.5: Update Other Bootstrap 4 Markup Patterns

**Objective:** Update remaining Bootstrap 4-specific markup.

**Patterns to Update:**
- `.card-block` → `.card-body`
- `.badge-*` color variants → Bootstrap 5 badge classes
- Grid system (if using new `xxl` breakpoint)

**Files to Modify:**
- All files with these patterns (to be determined by audit)

**Actions:**
1. Audit for remaining Bootstrap 4 patterns
2. Update systematically
3. Test visual appearance

**Dependencies:** C.1, C.2

**Risk:** Medium - Visual changes possible.

**Approval Required:** `PROCEED STEP C.5`

---

### Step C.6: Update JavaScript Initialization

**Objective:** Convert jQuery Bootstrap calls to vanilla JS Bootstrap 5.

**Files to Modify:**
- `includes/bottom.php` (jQuery Bootstrap usage found)
- Any other files with jQuery Bootstrap calls

**Pattern:**
```javascript
// Bootstrap 4 (jQuery)
$('#myModal').modal();
$('.dropdown-toggle').dropdown();

// Bootstrap 5 (Vanilla JS)
new bootstrap.Modal(document.getElementById('myModal'));
new bootstrap.Dropdown(document.querySelector('.dropdown-toggle'));
```

**Actions:**
1. Find all jQuery Bootstrap calls
2. Convert to vanilla JS Bootstrap 5 APIs
3. Test all interactive components
4. Keep jQuery if used elsewhere

**Dependencies:** C.1, C.2

**Risk:** Medium - JavaScript changes affect interactivity.

**Approval Required:** `PROCEED STEP C.6`

---

### Step C.7: Update CSS File References in Templates

**Objective:** Update all PHP/HTML files to use new CSS structure.

**Files to Modify:**
- All files that include `css-b4.php` (already loads Bootstrap)
- All files with direct CSS links
- Header/footer includes if they load CSS

**New CSS Load Order (in `css-b4.php`):**
1. Bootstrap 5 CSS
2. Typekit fonts
3. Font Awesome
4. Base CSS (`css/base.css`)
5. Layout CSS (`css/layout.css`)
6. Component CSS (`css/components/*.css`)
7. Page CSS (`css/pages/*.css` - if needed)
8. Utilities CSS (`css/utilities.css`)

**Actions:**
1. Update `includes/css-b4.php` to load new CSS files
2. Remove references to old CSS files
3. Update path references for subdirectories
4. Maintain load order

**Dependencies:** Phase B complete, C.1

**Risk:** Medium - CSS loading affects all pages.

**Approval Required:** `PROCEED STEP C.7`

---

### Step C.8: Update Whiteboard Section

**Objective:** Update whiteboard section to use new CSS structure and Bootstrap 5 CDN.

**Files to Modify:**
- All whiteboard PHP files
- Whiteboard include files

**Actions:**
1. Update whiteboard CSS links to new structure
2. Ensure Bootstrap 5 CDN loads before whiteboard CSS
3. Update whiteboard Bootstrap references to 5.3.8 CDN (if they have direct Bootstrap links)
4. Test whiteboard pages independently
5. Ensure isolation from main site

**Dependencies:** Phase B complete, C.1, C.2

**Risk:** Medium - Whiteboard is separate but must work.

**Approval Required:** `PROCEED STEP C.8`

---

### Step C.9: Update Legacy Include Files

**Objective:** Update or deprecate legacy include files with Bootstrap 3.3.4.

**Files to Review:**
- `includes/top.php` (Bootstrap 3.3.4)
- `includes/head.php` (Bootstrap 4.1.3)
- `includes/head-b4.php` (Bootstrap 4.1.3)
- Other legacy includes

**Actions:**
1. Identify which files are still in use
2. Update to Bootstrap 5 or mark as deprecated
3. Document migration path for any pages still using legacy includes

**Dependencies:** C.1, C.2

**Risk:** Low - Legacy files may not be in active use.

**Approval Required:** `PROCEED STEP C.9`

---

## Phase D: Testing & Validation (EXECUTION - GATED)

### Step D.1: Visual Regression Testing

**Objective:** Compare current site with migrated version.

**Test Checklist:**
- [ ] Homepage
- [ ] Spokespeople pages
- [ ] Order form
- [ ] Contact page
- [ ] Video presentations
- [ ] Whiteboard section (all variants)
- [ ] Mobile responsive (all breakpoints: xs, sm, md, lg, xl, xxl)
- [ ] Interactive components (modals, dropdowns, tooltips)
- [ ] Forms (validation, styling)
- [ ] Navigation (desktop and mobile)

**Actions:**
1. Screenshot migrated site
2. Compare with baseline screenshots
3. Test functionality
4. Document any differences
5. Fix regressions with Bootstrap 5 utilities or minimal CSS

**Dependencies:** Phase C complete

**Risk:** High - Visual changes are user-facing.

**Approval Required:** `PROCEED STEP D.1`

---

### Step D.2: Functional Testing

**Objective:** Test all interactive functionality.

**Test Areas:**
- Navigation (desktop and mobile)
- Forms (submission, validation)
- Modals (open, close, interactions)
- Dropdowns
- Tooltips and popovers
- Carousels/sliders
- Video players
- All JavaScript interactions

**Actions:**
1. Test each component systematically
2. Document any issues
3. Fix issues with Bootstrap 5 patterns or custom JS

**Dependencies:** Phase C complete

**Risk:** High - Functional issues break user experience.

**Approval Required:** `PROCEED STEP D.2`

---

## Phase E: Cleanup & Documentation (EXECUTION - GATED)

### Step E.1: Remove Bootstrap 4 Files

**Objective:** Clean up legacy Bootstrap 4 files.

**Files to Remove (after verification):**
- `css/bootstrap 4/bootstrap.css` (if not needed)
- Any Bootstrap 4 migration shims
- Old CSS files that have been fully migrated

**Actions:**
1. Verify Bootstrap 5 is working correctly
2. Backup old files
3. Remove after confirmation
4. Update any remaining references

**Dependencies:** Phase D complete, all testing passed

**Risk:** Low - Cleanup only, files backed up.

**Approval Required:** `PROCEED STEP E.1`

---

### Step E.2: Final CSS Cleanup

**Objective:** Final pass to remove unused CSS and optimize.

**Actions:**
1. Remove unused CSS (final pass)
2. Merge small, related rules
3. Normalize naming conventions
4. Minify CSS if desired (optional)
5. Optimize file sizes

**Dependencies:** Phase D complete

**Risk:** Low - Optimization only.

**Approval Required:** `PROCEED STEP E.2`

---

### Step E.3: Create Documentation

**Objective:** Document new architecture and migration details.

**Files to Create:**

**`docs/bootstrap5-migration-notes.md`:**
- Bootstrap 4 → 5 changes made
- Deliberate visual differences and rationale
- Known issues or limitations
- Rollback procedure if needed
- JavaScript API changes
- Markup pattern changes

**`docs/css-architecture.md`:**
- CSS file organization structure
- Where Bootstrap 5 is imported (`includes/css-b4.php`)
- How to add new styles (Bootstrap-first approach)
- Whiteboard isolation strategy
- Naming conventions
- File loading order
- Component documentation

**Actions:**
1. Write comprehensive documentation
2. Include code examples
3. Document best practices
4. Include troubleshooting guide

**Dependencies:** Phase E.1, E.2

**Risk:** Low - Documentation only.

**Approval Required:** `PROCEED STEP E.3`

---

## Implementation Order & Dependencies

### Critical Path:
1. **Phase A** (Preparation) - No dependencies
2. **Phase B** (CSS Architecture) - Depends on Phase A.1 (CSS file retrieval)
3. **Phase C.1** (Bootstrap CSS) - Depends on Phase B
4. **Phase C.2** (Bootstrap JS) - Can run parallel with C.1
5. **Phase C.3-C.9** (Markup Updates) - Depends on C.1, C.2
6. **Phase D** (Testing) - Depends on Phase C
7. **Phase E** (Cleanup) - Depends on Phase D

---

## Risk Mitigation & Rollback Plan

### Rollback Procedure:
1. Revert `includes/css-b4.php` to Bootstrap 4.1.3
2. Revert footer includes to Bootstrap 4.1.3 JS
3. Revert data attributes if changed
4. Restore old CSS file references if needed
5. Git revert to pre-migration commit if necessary

### Incremental Testing Strategy:
1. Test each phase independently
2. Commit after each successful phase
3. Test on staging/dev environment first (if available)
4. Rollback plan for each phase

---

## Success Criteria

1. ✅ Site loads Bootstrap 5.3.8 successfully
2. ✅ All pages maintain visual parity with current version
3. ✅ No inline styles remain in HTML/PHP files
4. ✅ CSS is organized in clear, maintainable structure
5. ✅ Whiteboard section is isolated and functional
6. ✅ Total custom CSS is reduced by leveraging Bootstrap utilities
7. ✅ All Bootstrap 4-specific markup is updated to Bootstrap 5
8. ✅ Documentation is complete and accurate
9. ✅ All interactive components work correctly
10. ✅ All forms function and validate correctly

---

## Estimated Timeline

- **Phase A (Preparation):** 2-4 hours
- **Phase B (CSS Architecture):** 6-8 hours
- **Phase C (Bootstrap Upgrade):** 8-10 hours
- **Phase D (Testing):** 4-6 hours
- **Phase E (Cleanup):** 2-3 hours

**Total Estimated Time:** 22-31 hours

---

## Notes & Considerations

### Bootstrap 5 Key Changes:
- No jQuery dependency (vanilla JS)
- Popper.js included in Bootstrap bundle
- `data-toggle` → `data-bs-toggle`
- `data-target` → `data-bs-target`
- `.form-group` → `.mb-3` or Bootstrap 5 form structure
- `.form-row` → `.row` with `.g-*` utilities
- `.input-group-addon` → `.input-group-text`
- `.card-block` → `.card-body`
- Badge color classes updated
- Grid system improvements (new breakpoint: xxl)

### CSS Organization Principles:
- Bootstrap-first: Use Bootstrap utilities before custom CSS
- External files only: No inline styles
- Layered structure: Base → Layout → Components → Pages → Utilities
- DRY: Eliminate duplication
- Minimal custom CSS: Only for site-specific branding

### Whiteboard Isolation:
- Separate CSS files in `css/whiteboard/`
- Namespaced classes (`.wb-*`) or body class scoping
- Independent Bootstrap 5 upgrade
- No visual coupling with main site

---

## 🚨 HARD STOP #1 - PLAN APPROVAL REQUIRED

**This plan requires explicit approval before any file modifications begin.**

**No files have been modified during discovery or planning phases.**

**Please review and confirm:**
1. ✅ Approach to `includes/css-b4.php` (update in place, keep filename)
2. ✅ CSS file structure organization
3. ✅ Whiteboard isolation strategy
4. ✅ Timeline and priority order
5. ✅ Any specific pages/sections that need extra attention
6. ✅ Handling of missing CSS files (retrieval from production)

**Reply with `APPROVE PLAN` to continue to Phase B (CSS Architecture Creation), or request revisions.**

---

**End of Migration Plan**


